$(document).ready(function(){
    buscarMisCursos();

    $('body').on('click', '.user-right img', function(event){
        event.stopPropagation();
        if($('.user-options').is(':visible')){
            $('.user-options').hide();
        }else{
            $('.user-options').show()
        }

        $('html').one('click', function(){
            $('.user-options').hide();
        })
        
    })

    $('body').on('click', '.mi_perfil', function(){
        $('#misDatos').click();
    })

    $('body').on('click', '.logout', function(){
        window.location = "c_home/logout";
    })

    $('body').on('click', '.pass_change', function(){
        $('.overlay-change-pass').show();
        $('.change-pass-container').show();
    })

    $('body').on('click','.temas_dictados, .mensajes_enviados', function(){
        if($(this).data('title') == 'temario'){
            updateListaTemario();
        }else{
            updateListaComunicados();
        }
    })

    $('body').on('click','#listado-asistencia input[type="checkbox"]', function(){
        if($(this).is(':checked')){
            $(this).parent().parent().find('input').eq(1).val('').prop('readonly', true).attr('placeholder','');
            $(this).parent().find('span').addClass('Presente');
            $(this).parent().find('span').removeClass('Ausente');
            $(this).parent().find('span').text('Presente');

        }else{
            $(this).parent().parent().find('input').eq(1).attr('placeholder','Ingrese una justificación').prop('readonly', false);
            $(this).parent().find('span').addClass('Ausente');
            $(this).parent().find('span').removeClass('Presente');
            $(this).parent().find('span').text('Ausente');
        }
    })


    $('body').on('click','#guardar-asistencia', function(){
        var alumnos = $('#listado-asistencia').children();
        var asistencia_alumnos = [];
        for (var i = 0; i < alumnos.length; i++) {
            var presente = 1;
            if (!$('#listado-asistencia').children().eq(i).children().eq(2).children().is(':checked')) {
                presente = 0;
            };
            var alumno = {};
            alumno.legajo = $('#listado-asistencia').children().eq(i).children().eq(0).text();
            alumno.presente = presente;
            alumno.justificacion = $('#listado-asistencia').children().eq(i).children().eq(3).children().val()            

            asistencia_alumnos.push(alumno);
        };

        guardarAsistenciaCurso(asistencia_alumnos);
    })

    $('body').on("click",".box-curso-generic", function(event){
        $('.lista-opciones').children().eq(0).click();  
        var conte_info = $('.contenedor-info');
        var numCurso = $(this).data('idcurso');
        var nombre_curso = $(this).text();
        $('#loading').show();
        if(!conte_info.size() > 0){        
            $.ajax({
                url : "docente/pruebaVista",
                type: "GET",
                dataType: "html",
                success: function(data, textStatus, jqXHR){            
                    $('#curso-info-container').append(data);
                    $('#selector-curso').hide();
                    $('#informacion-num-curso').text(nombre_curso);
                    cargarInfoCurso(numCurso);
                    cargarFiltroCursos(numCurso);
                    cargarAsignaturas(numCurso);
                    buscarAsistenciaCurso(numCurso);
                    $('#loading').hide();
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("fallo");
                }
            });
        }else{        
            $('#selector-curso').hide();
            $('#informacion-num-curso').text(nombre_curso);
            conte_info.show();
            cargarInfoCurso(numCurso);        
            cargarFiltroCursos(numCurso);
            cargarAsignaturas(numCurso);
        }    
    });

    $('body').on('click','#misCursos', function(){
        $('#selector-curso').show();
        $('#selector-asignatura').show();
        $('.contenedor-info').hide();
        $('#informacion-num-curso').empty();
    })

    $('body').on('click', '.lista-opciones li', function(){
        var name=$(this).data('title');
        $('.lista-opciones li').removeClass('active');
        $(this).addClass('active');
        $('.contenedor-principal').each(function(){
            if($(this).hasClass(name)){
                $('.contenedor-principal').hide();
                $(this).show();
            }
        })

    });

    $('body').on('change','#filtro_asignatura, #filtro_etapa', function(){
        mostrarNotasInicial();
    });

    $('body').on('change', '#asignaturaTemario', function(){
        updateListaTemario();
    })


    $('body').on('click', '#guardar-notas-primaria', function(){
        var calificacionesCurso = {};
        calificacionesCurso.idCurso = $('#filtro_curso').find(':selected').data('idcurso');;
        calificacionesCurso.idAsignatura = $('#filtro_asignatura').find(':selected').data('idasignatura');;
        calificacionesCurso.etapa = $('#filtro_etapa').find(':selected').text();

        var filas_notas = $('#listado-primario-notas tr');
        var celdas_por_fila;
        var array_general = [];
        var array_nota_insert = [];
        var array_nota_update = [];
        var array_nota_delete = [];
        var nuevo_registro = {};
        for (var i = 0; i < filas_notas.length; i++) {

            var cant_celdas = $('#listado-primario-notas tr').eq(i).children().length;

            for (var j = 2; j < cant_celdas; j++) {
                var celda = $('#listado-primario-notas tr').eq(i).children().eq(j);

                if(celda.hasClass('editado') == true){

                    if(celda.data('valorinicial') != celda.children().val()){

                        nuevo_registro = {};
                        nuevo_registro.idCurso = calificacionesCurso.idCurso;
                        nuevo_registro.idAsignatura = ''+calificacionesCurso.idAsignatura;
                        nuevo_registro.etapa = calificacionesCurso.etapa;
                        nuevo_registro.legajoAlumno = $('#listado-primario-notas tr').eq(i).children().eq(0).text();
                        nuevo_registro.nroCalificacion = ''+celda.data('nrocalificacion');
                        nuevo_registro.calificacion = celda.children().val();
                        nuevo_registro.motivo = $('#cabecera-notas').children().eq(j).children().val();

                        if(celda.hasClass('previainfo') == true){
                            if(celda.children().val() == ""){
                                array_nota_delete.push(nuevo_registro);
                            }else{
                                array_nota_update.push(nuevo_registro);
                            }                        
                        }else{
                            array_nota_insert.push(nuevo_registro);
                        }
                    }
                }
            };        
        };
        array_general[0] = array_nota_insert;
        array_general[1] = array_nota_update;
        array_general[2] = array_nota_delete;
        $.ajax({
            url : "docente/setNotasAsignaturaPrimario/",
            type: "POST",
            data: { data : array_general },
            dataType: "json",
            success: function(mensaje){
                showNotification('Calificaciones registradas con exito');
                actualizarUltimaModificacion(calificacionesCurso);
            },
            error: function (jqXHR, textStatus, errorThrown){
                showNotification('Failure');
            }
        });
    })

    $('body').on('change', '#cabecera-notas select', function(){
        var nrp_columna = $(this).parent().data('nrocalificacion');
        $('#listado-primario-notas td').each(function(){
            if($(this).data('nrocalificacion') == nrp_columna && $(this).hasClass('previainfo')){
                $(this).addClass('editado');
            }
        })
    })

    $('body').on('click','input.guardar_nota', function(){
        var calificacionEscolar = {};
        calificacionEscolar.idCurso = $('#filtro_curso').find(':selected').data('idcurso');;
        calificacionEscolar.idAsignatura = $('#filtro_asignatura').find(':selected').data('idasignatura');;
        calificacionEscolar.etapa = $('#filtro_etapa').find(':selected').text();
        calificacionEscolar.legajoAlumno = $(this).data('legajoalumno');
        calificacionEscolar.calificacion = $(this).parent().find('textarea').val();
        if($(this).data('modificado') != true){
            guardarNotasInicial(true, calificacionEscolar);
        }else{
            guardarNotasInicial(false, calificacionEscolar);
        }
    })

    $('body').on('click','.box-asignatura-generica',function(){
        if($(this).children('.asignatura-body').is(':visible')){
            $(this).children('.asignatura-body').hide();
            $(this).children('.asignatura-titulo').children().css('text-decoration', 'none');
        }else{
            $('.asignatura-body').hide();
            $(this).children('.asignatura-body').show();
            $('.asignatura-titulo').children().css('text-decoration', 'none');
            $(this).children('.asignatura-titulo').children().css('text-decoration', 'underline');
        }
    });

    $('body').on('click', '.box-alumno-generic', function(){
        $('#loading').show();
        var legajo_alumno = $(this).children().data('legajo');
        $.ajax({
            url : "docente/getDatosAlumnoPorLegajo/"+legajo_alumno,
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                limpiarPerfilAlumno(data);
                $(".overlay-popup").show();
                $(".perfil-alumno-container").show();
                buscarDatosTutor();
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                showNotification('Failure');
            }
        });
    });

    $('body').on('click', '#misDatos', function(){
        $('#loading').show();
        $.ajax({
            url : "docente/getDocente/",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarDatosPersonales(data);
                $('#informacion-num-curso').empty();
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                showNotification('Failure');
            }
        });
    })

    $('body').on('click','.close-popup', function(){
        $('.overlay-popup').hide();
        $(this).parent().parent().hide();
    });

    $('body').on('click', '#enviarTemario', function(){
        $('#loading').show();
        var temario = {};
        temario.curso = $('#id-curso-temario').val();
        temario.asignatura = $('#asignaturaTemario').children('option:selected').data('idasignatura');
        temario.temaDictado = $('#temaDictado').val();
        $.ajax({
            url: 'curso/setTemasDictados/'+ temario.curso+"/"+ temario.asignatura +"/"+  temario.temaDictado,
            type: 'POST',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                updateListaTemario();
                showNotification('Temario registrado con exito');
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                showNotification('Failure');
            }
        })
    })

    $('body').on('click', '.edit-temario', function(){
        var tema_dictado = $(this).parent('.tema-dictado')
        var texto_tema_dictado = tema_dictado.children('.texto_tema_dictado').text();
        var fechaPublicacion = tema_dictado.attr('data-fechapubli');
        $('#temaDictado').val(texto_tema_dictado);
        $('#enviarTemario').hide();
        $('#updateTemario').show();
        $('#asignaturaTemario').prop('disabled', true);
        $('#updateTemario').attr('data-fechapubli', '');    
        $('#updateTemario').attr('data-fechapubli', fechaPublicacion);
    })

    $('body').on('click', '#updateTemario', function(){    
        var idAsignatura = $('#asignaturaTemario').children(':selected').attr('data-idasignatura');
        var idCurso = $('#id-curso-temario').val();
        var fechaPublicacion = $('#updateTemario').data('fechapubli');
        console.log(fechaPublicacion);
        var texto_tema_dictado = $('#temaDictado').val();
        $.ajax({
            url: 'curso/updateTemario/'+ idAsignatura +'/'+idCurso+'/'+fechaPublicacion+'/'+texto_tema_dictado,
            type: 'POST',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){            
                $('#temaDictado').val('');
                $('#asignaturaTemario').prop('disabled', false);
                $('#enviarTemario').show();
                $('#updateTemario').hide();
                showNotification('Actualización de temario con exito');
                updateListaTemario();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })
    $('body').on('click', '#enviarComunicado', function(){
        var comunicado = {};
        comunicado.curso = $('#id-curso-comunicado').val();
        comunicado.textoComunicado = $('#temaComunicado').val();
        $('#loading').show();
        $.ajax({
            url: 'curso/setComunicadoWeb/'+ comunicado.curso +"/"+ comunicado.textoComunicado,
            type: 'POST',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                $('#temaComunicado').val('');
                showNotification('Comunicado enviado con exito');
                updateListaComunicados();
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                showNotification('Failure');
            }
        })
    })

    $('body').on('click', '#updateComunicado', function(){
        var id_comunicado = $(this).attr('data-idcomunicado');
        var texto_comunicado = $('#temaComunicado').val();
        $('#loading').show();
        $.ajax({
            url: 'curso/updateComunicado/'+ id_comunicado +'/'+texto_comunicado,
            type: 'POST',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){            
                $('#temaComunicado').val('');            
                $('#enviarComunicado').show();
                $('#updateComunicado').hide();
                showNotification('Comunicado actualizado con éxito');
                updateListaComunicados();
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click','.edit-comunicado', function(){    
        var id_comunicado = $(this).data('idcomunicado');
        var comunicado_web = $(this).parent('.comunicado-web');
        var texto_comunicado = comunicado_web.children('.texto-temario').text();
        $('#temaComunicado').val('');
        $('#temaComunicado').val(texto_comunicado);
        $('#enviarComunicado').hide();
        $('#updateComunicado').show();
        $('#updateComunicado').attr('data-idcomunicado', '');
        $('#updateComunicado').attr('data-idcomunicado', id_comunicado);
    })

    $('body').on('click', '.change-pass-container img, .btn-danger.cancelar', function(){
        $('.overlay-change-pass').hide();
        $('.change-pass-container').hide();
    })
});

function buscarMisCursos(){
    $.ajax({
        url : "docente/getCursos/",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearSelectorCurso(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function cargarAsignaturas(numCurso){
    $.ajax({
        url : "curso/getAsignaturasCurso/"+numCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){ 
            crearAsignaturas(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    });    
}

function crearAsignaturas(data){
    var asignatura_cont = $('.contenedor-asignaturas ul');
    var new_array = []; 
    var indice = 0;
    asignatura_cont.empty();       
    for (var i = 0; i < data.length; i++) {
        if( i == 0){
            var new_asignatura='<li class="box-asignatura-generica '+data[i].nom_asignatura.replace(/\s/g,'')+' "><div class="asignatura-titulo"><h3>'+data[i].nom_asignatura+'</h3></div></li>';
            asignatura_cont.append(new_asignatura);
            var tabla = "<div class='asignatura-body'><div class='columna-izquierda'><h4>Horarios</h4><table class='horario_general "+data[i].nom_asignatura.replace(/\s/g,'')+"'><thead><tr><td>Dia de la semana</td><td>Hora Inicio</td><td>Hora Fin</td></tr></thead><tbody></tbody></table></div><div class='columna-derecha'><h4>Docentes</h4><table class='docentes_general "+data[i].nom_asignatura.replace(/\s/g,'')+"'><thead><tr><td>Legajo</td><td>Apellido y nombre</td><td>Mail</td></tr></thead><tbody></tbody></table><div></div>";
            var conte = $(".box-asignatura-generica."+data[i].nom_asignatura.replace(/\s/g,'')+"");
            conte.append(tabla);
            var conteFilas = $('.horario_general.'+data[i].nom_asignatura.replace(/\s/g,'')+' tbody');
            var conteDocentes = $('.docentes_general.'+data[i].nom_asignatura.replace(/\s/g,'')+' tbody');
            var nuevaFila = "<tr><td>"+data[0].diaSemana+"</td><td>"+data[0].horaInicio+"</td><td>"+data[0].horaFin+"</td></tr>";
            conteFilas.append(nuevaFila);
            var nuevoDocente = "<tr><td>"+data[0].legajoDocente+"</td><td>"+data[0].apellido+", "+data[0].nombre+"</td><td>"+data[0].correoElectronico+"</td></tr>";
            conteDocentes.append(nuevoDocente);
        }else{
            if(data[i].nom_asignatura.replace(/\s/g,'') == data[i-1].nom_asignatura.replace(/\s/g,'')){
                nuevaFila = "<tr><td>"+data[i].diaSemana+"</td><td>"+data[i].horaInicio+"</td><td>"+data[i].horaFin+"</td></tr>";
                conteFilas.append(nuevaFila);
                if(data[i].legajoDocente != data[i-1].legajoDocente){
                    nuevoDocente = "<tr><td>"+data[0].legajoDocente+"</td><td>"+data[0].apellido+", "+data[0].nombre+"</td><td>"+data[0].correoElectronico+"</td></tr>";
                    conteDocentes.append(nuevoDocente);
                }
            }else{
                var new_asignatura='<li class="box-asignatura-generica '+data[i].nom_asignatura.replace(/\s/g,'')+' "><div class="asignatura-titulo"><h3>'+data[i].nom_asignatura+'</h3></div></li>';
                asignatura_cont.append(new_asignatura);
                var tabla = "<div class='asignatura-body'><div class='columna-izquierda'><h4>Horarios</h4><table class='horario_general "+data[i].nom_asignatura.replace(/\s/g,'')+"'><thead><tr><td>Dia de la semana</td><td>Hora Inicio</td><td>Hora Fin</td></tr></thead><tbody></tbody></table></div><div class='columna-derecha'><h4>Docentes</h4><table class='docentes_general "+data[i].nom_asignatura.replace(/\s/g,'')+"'><thead><tr><td>Legajo</td><td>Apellido y nombre</td><td>Mail</td></tr></thead><tbody></tbody></table></div></div>";
                var conte = $(".box-asignatura-generica."+data[i].nom_asignatura.replace(/\s/g,'')+"");
                conte.append(tabla);
                var conteFilas = $('.horario_general.'+data[i].nom_asignatura.replace(/\s/g,'')+' tbody');
                var conteDocentes = $('.docentes_general.'+data[i].nom_asignatura.replace(/\s/g,'')+' tbody');
                var nuevaFila = "<tr><td>"+data[i].diaSemana+"</td><td>"+data[i].horaInicio+"</td><td>"+data[i].horaFin+"</td></tr>";
                conteFilas.append(nuevaFila);
                var nuevoDocente = "<tr><td>"+data[i].legajoDocente+"</td><td>"+data[i].apellido+", "+data[i].nombre+"</td><td>"+data[i].correoElectronico+"</td></tr>";
                conteDocentes.append(nuevoDocente);
            }
        }     
    }        
}

function cargarFiltroCursos(idCurso){
    var cursos = $('.box-curso-generic');
    var filtro_curso = $('#filtro_curso');
    $('#filtro_curso').empty();
    for (var i = 0; i < cursos.length; i++) {
        if(cursos.eq(i).data("idcurso") == idCurso ){
            $('#id-curso-temario').attr('value', cursos.eq(i).data("idcurso"));
            $('#id-curso-comunicado').attr('value', cursos.eq(i).data("idcurso"));
            var new_option = "<option data-idcurso='"+cursos.eq(i).data("idcurso")+"' data-nivel='"+cursos.eq(i).data("nivel")+"'>"+cursos.eq(i).text()+"</option>";
            filtro_curso.append(new_option);
        }
    };
    get_asignaturas_curso(idCurso);
}

function cargarFiltroAsignaturas(asignaturas){
    var filtro_asignatura = $('#filtro_asignatura');
    var filtro_asignatura_temario = $('#asignaturaTemario');
    filtro_asignatura.empty();
    filtro_asignatura_temario.empty();
    if(asignaturas.length != 0){
        for (var i = 0; i < asignaturas.length; i++) {
            var new_option = "<option data-idAsignatura='"+asignaturas[i].idAsignatura+"'>"+asignaturas[i].Asignatura+"</option>";
            filtro_asignatura.append(new_option);
            filtro_asignatura_temario.append(new_option);
        };
    }else{
        filtro_asignatura.append("<option>Sin Asignaturas</option>");
    }
    mostrarNotasInicial();
}

function mostrarNotasInicial(){
    var idCurso = $('#filtro_curso').find(':selected').data('idcurso');
    var nivel = $('#filtro_curso').find(':selected').data('nivel');    
    cargarAlumnos(idCurso, nivel);
}

function get_asignaturas_curso(idCurso){
    $.ajax({
        url : "docente/getAsignaturas/"+idCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
          cargarFiltroAsignaturas(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function cargarAlumnos(idCurso, nivel){

    $.ajax({
        url : "curso/getAlumnosPorCursoLegajo/"+idCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            if(nivel == 'Inicial'){
                listarAlumnosInicial(data);                
            }else{
                listarAlumnosNoInicial(data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function cargarInfoCurso(numCurso){
    var nivel = $('#informacion-num-curso').text();
    if(nivel.indexOf ('Sala') == -1){
        $('.inicial-notas').hide();
        $('.grilla-notas').show();
    }else{        
        $('.grilla-notas').hide();
        $('.inicial-notas').show();
    }    
    $.ajax({
        url : "curso/getAlumnosPorCurso/"+numCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            $('#filtro_etapa').empty();
            if($('#informacion-num-curso').text().indexOf('Sala') == -1){                
                $('#filtro_etapa').append('<option>Primera</option><option>Segunda</option><option>Tercera</option><option>Final</option>')
            }else{
                $('#filtro_etapa').append('<option>Primera</option><option>Segunda</option>')
            }
            createBoxAlumnos(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function createBoxAlumnos(data){
    var conte_info = $('ul.contenedor-alumnos');
    conte_info.empty();
    for(var i=0;i<data.length;i++){
        var sexo = "man.png";
        if(data[i].sexo =="Femenino"){
            sexo = "women.png"
        }
        var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno' data-legajo='"+data[i].legajoAlumno+"'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='../img/"+sexo+"' style='width: 90px;'></div></a></li>";
        conte_info.append(newBox);
    }
}

function listarAlumnosInicial(data){
    var conte_btn = $('.accordion.nivel-inicial');
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox='<div class="accordion-group '+data[i].legajoAlumno+' "><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'+i+'"><img src="../img/person.png"><span>'+data[i].apellido+' '+data[i].nombre+'</span></a></div><div id="collapse'+i+'" class="accordion-body collapse"><div class="accordion-inner"><h4></h4><div><textarea></textarea></div><span id="modificadoPor"></span><input class="btn guardar_nota" type="button" value="Guardar" data-modificado="" data-legajoalumno="'+data[i].legajoAlumno+'"/></div></div></div>';
        conte_btn.append(newBox);
    }
    buscarInfoNivel();
}

function buscarInfoNivel(){
    var idCurso = $('#filtro_curso').find(':selected').data('idcurso');;
    var idAsignatura = $('#filtro_asignatura').find(':selected').data('idasignatura');;
    var etapa = $('#filtro_etapa').find(':selected').text();
    $.ajax({
        url : "curso/notasPorAsignaturaInicial/"+idCurso+"/"+idAsignatura+"/"+etapa,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
          cargarInfoNivel(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function cargarInfoNivel(data){
    for (var i = 0; i < data.length; i++) {
        $('.accordion-group').each(function(){
            if($(this).hasClass(data[i].legajoAlumno)){
                $(this).find('textarea').text(''+decodeURIComponent(data[i].calificacion)+'');                
                if(data[i].modificacion != ""){
                    $(this).find('.guardar_nota').attr('data-modificado','true');
                    $(this).find('#modificadoPor').text('');
                }else{
                    $(this).find('#modificadoPor').text('Última modificación: '+data[i].modificacion);
                }
            }
        })        
    };
}

function listarAlumnosNoInicial(data){
    var conte = $('#listado-primario-notas');
    conte.empty();
    for (var i=0; i<data.length;i++){
        var newBox='<tr><td>'+data[i].legajoAlumno+'</td><td>'+data[i].apellido+' '+data[i].nombre+'</td><td data-nroCalificacion="1"><input type="text"></td><td data-nroCalificacion="2"><input type="text"></td><td data-nroCalificacion="3"><input type="text"></td><td data-nroCalificacion="4"><input type="text"></td><td data-nroCalificacion="5"><input type="text"></td><td data-nroCalificacion="6"><input type="text"></td></tr>';
        conte.append(newBox);
    }

    buscarInfoNivelPrimaria();

    $('#informe-nivel-primaria input, #informe-nivel-primaria select').bind('change paste', function(){
        $(this).parent().addClass('editado');
    })
}

function buscarInfoNivelPrimaria(){
    $('#loading').show();
    var idCurso = $('#filtro_curso').find(':selected').data('idcurso');;
    var idAsignatura = $('#filtro_asignatura').find(':selected').data('idasignatura');;
    var etapa = $('#filtro_etapa').find(':selected').text();
    $.ajax({
        url : "docente/getNotasAsignaturaPrimario/"+idCurso+"/"+idAsignatura+"/"+etapa,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            cargarCabeceraNotas(data);
            cargarInfoNivelPrimaria(data);
            $('#loading').hide();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function cargarCabeceraNotas(data){    
    var arr = [];
    for (var i = 0; i < data.length; i++) {
        arr[i] = data[i].nroCalificacion;
    };    
    var max = Math.max.apply(null, arr);

    for (var i = 0; i < data.length; i++) {
        if(i==0){
            var select_nota = $('#cabecera-notas').children().eq(data[0].nroCalificacion+1).children();
            select_nota.find('option:contains("'+data[0].motivo+'")').eq(0).prop('selected', true);
        }else{
            if(data[i].nroCalificacion != data[i-1].nroCalificacion){
                var select_nota = $('#cabecera-notas').children().eq(data[i].nroCalificacion+1).children();
                select_nota.find('option:contains("'+data[i].motivo+'")').eq(0).prop('selected', true);       
            }
        }
    };
}

function cargarInfoNivelPrimaria(data){
    var fila = 0;
    $('#modificacion-primaria').text('');
    for (var i = 0; i < data.length; i++) {
        if(i == 0){
            var nroCalificacion = data[0].nroCalificacion;
            $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[0].calificacion);
            $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).addClass('previainfo');
            $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).attr('valorinicial', data[0].calificacion);
            $('#modificacion-primaria').text(data[0].modificacion);
        }else{
            var nroCalificacion = data[i].nroCalificacion;
            if(data[i].legajoAlumno == data[i-1].legajoAlumno){
              $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[i].calificacion);
              $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).addClass('previainfo');
              $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).attr('valorinicial', data[i].calificacion);
            }else{
                fila++;
                $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[i].calificacion);
                $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).addClass('previainfo');
                $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).attr('valorinicial', data[i].calificacion);
            }
        }
    };
}

function actualizarUltimaModificacion(calificacionesCurso){
    $.ajax({
        url : "docente/actualizarUltimaModificacion/"+calificacionesCurso.idCurso+"/"+calificacionesCurso.idAsignatura+"/"+calificacionesCurso.etapa,
        type: "POST",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function guardarNotasInicial(insert,calificacionEscolar){
    var operacion;
    if(insert){
        operacion = "setNotasAsignaturaInicial";
    }else{
        operacion = "updateNotasAsignaturaInicial";
    }
    $.ajax({
        url: 'docente/'+ operacion +'/'+ calificacionEscolar.legajoAlumno +"/"+ calificacionEscolar.idAsignatura +"/"+ calificacionEscolar.calificacion +"/"+ calificacionEscolar.idCurso +"/"+ calificacionEscolar.etapa,
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
          showNotification('calificaciones registradas correctamente');
          buscarInfoNivel();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo Guardando");
        }
    })
}

function crearSelectorCurso(data){
    var conte_btn=$("#selectorBtnCurso");
    var filtro_curso = $('#filtro_curso');
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-curso-generic' data-idcurso='"+data[i].idCurso+"' data-nivel='"+data[i].nivel+"'><span>"+data[i].division+"<br> División "+data[i].seccion+"<br> "+data[i].nombre+"</span></div>";
        conte_btn.append(newBox);        
    }
 }

 function cargarPerfilAlumno(data){
    $('#perfil-nombre-header').text(data[0].apellido+', '+data[0].nombre);
    $('#perfil-legajo').val(data[0].legajoAlumno);
    $('#perfil-dni').val(data[0].nroDocumento);
    $('#perfil-sexo').val(data[0].sexo);
    $('#perfil-fecha-nac').val(data[0].fechaNacimiento);
    $('#perfil-nacionalidad').val(data[0].nacionalidad);
    $('#perfil-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#perfil-tel-fijo').val(data[0].telefonoFijo);
    $('#perfil-tel-movil').val(data[0].telefonoMovil);
    $('#perfil-lugar-nac').val(data[0].lugarNacimiento);
    $('#perfil-estado-civil').val(data[0].idEstado);

    if (data[0].observaciones == ''){
        $('#perfil-observaciones').text('No se poseen observaciones para el alumno'); 
    }else{
        $('#perfil-observaciones').val(data[0].observaciones);    
    }    
}

function limpiarPerfilAlumno(data){
    if($('#perfil-legajo').val() != data[0].legajoAlumno){
        $('#profile input').each(function(){
            $(this).val('');
        });
        cargarPerfilAlumno(data);        
    }else{
        console.log('Mismo Alumno');
    }    
}

function cargarDatosPersonales(data){
    $("#perfil-nombre-completo-docente").val(data[0].apellido+', '+data[0].nombre);
    $("#perfil-dni-docente").val(data[0].nroDocumento);
    $("#perfil-sexo-docente").val(data[0].sexo);
    $("#perfil-fecha-nac-docente").val(data[0].fechaNacimiento);
    $("#perfil-nacionalidad-docente").val(data[0].nacionalidad);
    $("#perfil-domicilio-docente").val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $("#perfil-tel-fijo-docente").val(data[0].telefonoFijo);
    $("#perfil-tel-movil-docente").val(data[0].telefonoMovil);
    $("#perfil-mail-docente").val(data[0].correoElectronico);
    $("#perfil-lugar-nac-docente").val(data[0].lugarNacimiento);
}

function buscarDatosTutor(){
    var legajoAlumno = $('#perfil-legajo').val();;
    $.ajax({
        url: "docente/getTutor/"+legajoAlumno,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            cargarPerfilTutor(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function cargarPerfilTutor(data){
    $('#perfil-nombre-t').val(data[0].apellido+', '+data[0].nombre);
    $('#perfil-dni-t').val(data[0].nroDocumento);
    $('#perfil-sexo-t').val(data[0].sexo);
    $('#perfil-fecha-nac-t').val(data[0].fechaNacimiento);    
    $('#perfil-estado-civil-t').val(data[0].estado);
    $('#perfil-domicilio-t').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#perfil-tel-fijo-t').val(data[0].telefonoFijo);
    $('#perfil-tel-movil-t').val(data[0].telefonoMovil);
    $('#perfil-mail-t').val(data[0].correoElectronico);
}

function cargarComunicadoWeb(data){
    var conte = $("#lista-mensajes");
    if(data.length >= 1){
        $("#cantMensajes").text("(" + data.length+")");
        for (var i = 0 ; i<data.length; i++){
            var nuevaLinea = "<div class='contenedor-comunicados'><p>"+data[i].comunicado+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p><input type='button value='+ ver mas'/></div>";
            conte.append(nuevaLinea);
        }
    }else{
        var sinMensajes = "<div class='contenedor-comunicados sin-comunicados' > Este curso no tiene mensajes nuevos </div>";
        conte.append(sinMensajes);
    }
}



function updateListaTemario(){    
    var curso = $('#id-curso-temario').val();
    var asignatura = $('#asignaturaTemario').children('option:selected').data('idasignatura');
    $.ajax({
        url: 'curso/getTemasDictados/'+ curso+"/"+asignatura,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){            
            listarTemasCurso(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function listarTemasCurso(data){
    var conte = $('#show-list-items');
    conte.empty();
    var newLine = "";
    for (var i = 0; i < data.length; i++) {
        newLine="<div class='tema-dictado' data-fechapubli='"+data[i].fechaPublicacion+"'><div class='texto_tema_dictado'>"+data[i].temasClase.replace(/%20/g, " ")+"</div><span>"+data[i].apellido+", "+data[i].nombre+"</span><span> "+data[i].fechaPublicacion+"</span> <span class='edit-temario'><img src='../img/edit.png'/></span><div class='separate-line'></div></div>";
        conte.append(newLine);
    };
}

function updateListaComunicados(){    
    var curso = $('#id-curso-comunicado').val();
    $.ajax({
        url: 'curso/getComunicadoWeb/'+ curso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){            
            listarComunicadosWeb(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function listarComunicadosWeb(data){
    var conte = $('#show-list-comunicados');
    conte.empty();
    var newLine = "";
    for (var i = 0; i < data.length; i++) {
        var newLine = "<div class='comunicado-web'><p class='texto-temario'>"+data[i].comunicado.replace(/%20/g, " ")+"</p><span class='firma-texto-temario'>"+data[i].apellido+", "+data[i].nombre+" - "+data[i].fecha+"</span><span class='edit-comunicado' data-idcomunicado='"+ data[i].idComunicadoWeb +"' ><img src='../img/edit.png'/></span><div class='separate-line'></div></div>";
        conte.append(newLine);
    };
}

function crearTablaAsistencia(data, bandera){
    var conte = $('#listado-asistencia');
    if (!bandera){
        $('#listado-asistencia').addClass('editado');    
    }
    
    conte.empty();    
    var new_line = "";
    for (var i = 0; i < data.length; i++) {
        var asistencia = "checked";
        var editable = "readonly";
        var presente = "Presente";
        var justificacion = "";
        if (data[i].presente == 0){
            asistencia = "";
            justificacion = data[i].justificacion;
            editable = "";
            var presente = "Ausente";
        };
        var new_line = '<tr><td>'+data[i].legajoAlumno+'</td><td>'+data[i].apellido+', '+data[i].nombre+'</td><td><input type="checkbox" '+asistencia+'><span class="'+presente+'">'+presente+'</span></td><td><input type"text" value="'+justificacion+'" '+editable+'></td></tr>';

        conte.append(new_line);
    };
}

function buscarAlumnosCurso(curso){    
    $.ajax({
        url: 'curso/getAlumnosPorCurso/'+ curso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){ 
            crearTablaAsistencia(data, true);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function buscarAsistenciaCurso(curso){
    $('#loading').show();
    $.ajax({
        url: 'curso/getAsistenciaCursoPorFecha/'+ curso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            if (data.length > 0){
                crearTablaAsistencia(data, false);    
            }else{
                buscarAlumnosCurso(curso);
            }
            $('#loading').hide();            
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function guardarAsistenciaCurso(asistencia_alumnos){
    var consulta = "insertAsistenciaCursoPorFecha";
    if ( $('#listado-asistencia').hasClass('editado')){
        consulta = "updateAsistenciaCursoPorFecha";
    };
    $.ajax({
        url : "curso/"+consulta+"/",
        type: "POST",
        data: { data : asistencia_alumnos },
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            showNotification('Asistencias registradas con exito');
            $('#listado-asistencia').addClass('editado')
        },
        error: function (jqXHR, textStatus, errorThrown){
            showNotification('Failure');
        }
    });
}
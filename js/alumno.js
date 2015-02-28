$(document).ready(function(){
    buscarMiCurso();

    $('body').find('#lista-mensajes h3').on('click',function(){
        event.stopPropagation();
        if($('#page-wrap').hasClass('vertical')){
            $('#page-wrap').removeClass('vertical');
        }else{
            $('#page-wrap').addClass('vertical');
        }
        $('html').one('click', function(){
            if($('#page-wrap').hasClass('vertical') == false){
                $('#page-wrap').addClass('vertical');
            }
        }) 
    })

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

    $('body').on('click','#por_etapas, #grilla_completa', function(){
        if($(this).attr('id') == 'por_etapas'){
            $('#filtro_etapa').show();
            $('#informe-primaria').show();    
            $('#tabla_grilla_completa').hide();
        }else{
            $('#filtro_etapa').hide();
            $('#informe-primaria').hide();
            $('#tabla_grilla_completa').show();
        }
        
    })

    $('body').on('click', '#misAportes', function(){
        var aportes = $('.aportes-alumno tr').size();
        $('#loading').show();
        if(aportes== 0){   
            $.ajax({
                url: "alumno/getAportes/",
                type: "GET",
                dataType: "json",
                success: function(data, textStatus, jqXHR){                    
                    $('#loading').hide();
                    crearListadoAportes(data);
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("fallo");
                }
            })
        }
        $('#loading').hide();
    })

    $('body').on('click', '#misDatos', function(){
        $('#loading').show();    
        $.ajax({
            url : "alumno/getDatosAlumno/",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarDatosAlumno(data);
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    });

    $('body').on('click', '#misDocentes', function(){
        var idCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: 'curso/getMisDocentes/'+ idCurso,
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarMisDocentes(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#misHorarios', function(){
        var idCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: 'curso/getMisHorarios/'+ idCurso,
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarMisHorarios(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#temas-dictados', function(){
        updateListaTemario();
    })

    $('body').on('click','#misAsignaturas, #misNotas',function(){
        var fecha = new Date();
        var año = fecha.getFullYear();
        var origen = $(this).attr('id');
        $('#loading').show();
        $.ajax({
            url : "alumno/getAsignaturas/"+año,
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                if( origen == 'misNotas'){
                    crearTablaNotasAsignaturas(data);                    
                }else{
                    crearSelectorAsignatura(data);
                }
                $('#loading').hide();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    });

    $('body').on('click', '#change-user-pass', function(){
        $('.overlay-change-pass').show();
        $('.change-pass-container').show();
    })

    $('body').on("mouseover",".asignaturas-curso", function(event){    
        $(this).find('.option-asignaturas').show();
    });

    $('body').on("mouseleave",".asignaturas-curso", function(event){    
        $(this).find('.option-asignaturas').hide();
    });

    $('body').on("mouseleave",".show-opciones", function(event){    
        $(this).hide();
    });

    $('body').on("mouseover",".option-asignaturas", function(event){    
        $(this).parent().find('.show-opciones').show();
    });

    $('body').on("mouseleave",".option-asignaturas", function(event){    
        if($(this).parent().find('.show-opciones').is(':hover')){

        }else{
            $(this).parent().find('.show-opciones').hide();
        }    
    });

    $('body').on('click','#programa', function(){
        var numAsignatura = $('.titulo-principal h1').data('idasignatura');
        var numCurso = 9;
        $.ajax({
            url: "curso/getProgramaAsignatura/"+numCurso+"/"+numAsignatura+"",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarPrograma(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log("fallo");
            }
        })
    })

    $('body').on('click','#info_general', function(){
        var numAsignatura = $('.titulo-principal h1').data('idasignatura');
        var numCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: "curso/getDatosAsignaturas/"+numCurso+"/"+numAsignatura+"",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarInfoCursoGeneral(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#misTutores', function(){
        $.ajax({
            url: 'alumno/getTutor/',
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarDatosTutor(data); 
                cargarPersonasAutorizadas();           
                $(".overlay-popup").show();
                $(".perfil-tutor-container").show();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#retirarPersonas', function(){
        // Buscar tutor en las cookies
        cargarPersonasAutorizadas();
    })

    $('body').on('click', '.editarAutorizado', function(){
        // Buscar tutor en las cookies
        var infoAutorizado = $(this).parent().parent();
        var persona = {};
        persona.idTutor = infoAutorizado.data('tutor');
        persona.nombreCompleto = infoAutorizado.children().children().eq(0).val();
        persona.nroDocumento = infoAutorizado.children().children().eq(1).val();
        persona.telefono = infoAutorizado.children().children().eq(2).val();
        persona.relacion = infoAutorizado.children().children().eq(3).val();

        console.log(persona);
    })

    $('body').on('click', '.eliminarAutorizado', function(){
        // Buscar tutor en las cookies
        var idTutor = $(this).parent().parent().data('tutor');
        var nroDoc = $(this).parent().parent().data('autorizado');
        $.ajax({
            url: 'alumno/delete_personasAutorizadas/'+ idTutor+"/"+nroDoc,
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarPersonasAutorizadas();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#agregarPermitidas', function(){
        var persona = {};
        persona.idTutor = $('#idTutor').data('idtutor');
        persona.nombre= $('#permita-nombre').val();
        persona.apellido= $('#permita-apellido').val();
        persona.nroDocumento = $('#permita-dni').val();
        persona.telefono = $('#permita-num').val();
        persona.relacion = $('#permita-relacion').val();

        $.ajax({
            url: 'alumno/set_personasAutorizadas/'+ persona.idTutor+"/"+ persona.nombre+"/"+ persona.apellido+"/"+ persona.nroDocumento+"/"+ persona.telefono+"/"+ persona.relacion,
            type: 'POST',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("Fallo Guardando");
                cargarPersonasAutorizadas();
                $('#permita-idTutor').val('');
                $('#permita-nombre').val('');
                $('#permita-apellido').val('');
                $('#permita-dni').val('');
                $('#permita-num').val('');
                $('#permita-relacion').val('');
            }
        })
    })

    $('body').on('click', '.ver_temario, .ver_info_curso', function(){
        $('#loading').show();
        if($(this).hasClass('ver_temario')){
            var curso = $('#curso-alumno').data('cursoid');
            var idAsignatura = $(this).closest('.asignaturas-curso').data('idasignatura');
            $.ajax({
                url: 'curso/getTemasDictados/'+ curso+"/"+idAsignatura,
                type: 'GET',
                dataType: 'json',
                success: function(data, textStatus, jqXHR){

                    listarTemas(data);
                    $('#loading').hide();
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("fallo");
                }

            })
        }else{
            var curso = $('#curso-alumno').data('cursoid');
            var idAsignatura = $(this).closest('.asignaturas-curso').data('idasignatura');
            $.ajax({
                url: 'alumno/getInfoAsignatura/'+ curso +'/'+idAsignatura,
                type: 'GET',
                dataType: 'json',
                success: function(data, textStatus, jqXHR){            
                    listarinfoAsignatura(data);
                    $('#loading').hide();
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("fallo");
                }
            })
        }
    })

    $('body').on('click', '.logout', function(){
        window.location = "c_home/logout";
    })

    $('body').on('click', '.optiones-materias img', function(){
        $('.overlay-popup').hide();
        $('.optiones-materias').hide();
    })

    $('body').on('click', '.change-pass-container img, .btn-danger.cancelar', function(){
        $('.overlay-change-pass').hide();
        $('.change-pass-container').hide();
    })

    $('body').on('click','.close-popup', function(){
        $('.overlay-popup').hide();
        $(this).parent().parent().hide();
    });

    $('body').on('click', '#misInasistencias', function(){
        $('.overlay-popup').show();
        $('#conte-listado-inasistencias').show();
        $.ajax({
            url: 'alumno/getAsistencia/',
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                mostrarAsistencias(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

});

function mostrarAsistencias(data){
    var conte = $('#listadoInasistencias tbody');
    $('.optiones-materias h2.faltas').html('Mis Inasistencias');
    conte.empty();
    for (var i = 0; i < data.length; i++) {
        var new_line = "<tr><td>"+data[i].fecha+"</td><td>"+data[i].justificacion+"</td></tr>";
        conte.append(new_line);
    };

}

function listarinfoAsignatura(data){
    var conte = $('#opciones-materias-contenedor');
    conte.empty();
    $('.optiones-materias h2').html('Informacion General - '+data[0].asignatura);   
    
    if(data[0].size > 0){
        var tabla = "<h4>Horarios</h4><table id='horario_general'><thead><tr><td>Dia de la semana</td><td>Hora Inicio</td><td>Hora Fin</td></tr></thead><tbody></tbody></table><h4 style='margin-top: 30px;'>Docentes</h4><table id='docentes_general'><thead><tr><td>Legajo</td><td>Apellido y nombre</td><td>Mail</td></tr></thead><tbody></tbody></table>";
        conte.append(tabla);
        var conteFilas = $('#horario_general tbody');
        var conteDocentes = $('#docentes_general tbody');
        var nuevaFila = "<tr><td>"+data[0].diaSemana+"</td><td>"+data[0].horaInicio+"</td><td>"+data[0].horaFin+"</td></tr>";
        conteFilas.append(nuevaFila);
        var nuevoDocente = "<tr><td>"+data[0].legajoDocente+"</td><td>"+data[0].apellido+", "+data[0].nombre+"</td><td>"+data[0].correoElectronico+"</td></tr>";
        conteDocentes.append(nuevoDocente);
        for (var i = 1; i < data.length; i++) {
            nuevaFila = "<tr><td>"+data[i].diaSemana+"</td><td>"+data[i].horaInicio+"</td><td>"+data[i].horaFin+"</td></tr>";
            conteFilas.append(nuevaFila);
            if(data[i].legajoDocente != data[i-1].legajoDocente){
                nuevoDocente = "<tr><td>"+data[0].legajoDocente+"</td><td>"+data[0].apellido+", "+data[0].nombre+"</td><td>"+data[0].correoElectronico+"</td></tr>";
                conteDocentes.append(nuevoDocente);
            }
        };
    }

    $('.optiones-materias').show();
    $('.overlay-popup').show();
}

function cargarEtapa(numCurso){
    var nivel = $('#informacion-num-curso').text();
   /* if(nivel.indexOf ('Sala') == -1){
        $('.inicial-notas').hide();
        $('.grilla-notas').show();
    }else{        
        $('.grilla-notas').hide();
        $('.inicial-notas').show();
    }    */
    $.ajax({
        url : "curso/getAlumnosPorCurso/"+numCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
           createBoxAlumnos(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

function listarTemas(data){
    var conte = $('#opciones-materias-contenedor');
    conte.empty();
    if(data.length > 0){
        $('.optiones-materias h2').html('Temas dictados en '+ data[0].asignatura);        
    }else{
        $('.optiones-materias h2').html('Temas dictados');
    }    
    var newLine = "";
    for (var i = 0; i < data.length; i++) {
        newLine="<div class='tema-dictado' data-fechapubli='"+data[i].fechaPublicacion+"'><div class='texto_tema_dictado'>"+data[i].temasClase.replace(/%20/g, " ")+"</div><span>"+data[i].apellido+", "+data[i].nombre+"</span><span> "+data[i].fechaPublicacion+"</span></div>";
        conte.append(newLine);
    };
    $('.optiones-materias').show();
    $('.overlay-popup').show();
}


function crearListadoAportes(data){
    var conte = $('.aportes-alumno');    
    conte.empty();
    if(data.length >= 1){
        for(var i=0; i < data.length; i++){
            var new_line = '<tr><td>'+data[i].nroComprobante+'</td><td>'+data[i].descripcion+'</td><td>'+parseFloat(data[i].importe).toFixed(2)+'</td><td>'+data[i].fecha+'</td></tr>';
            conte.append(new_line);            
        }        
        $('#con-aranceles').show();
    }else{
        $('#sin-aranceles').empty();
        var sinAportes = " Usted no ha realizado aportes al dia de la fecha ";
        $('#sin-aranceles').append(sinAportes);
        $('#con-aranceles').hide();
        $('#sin-aranceles').show();
    }
}

function crearTablaNotasAsignaturas(asignaturas){
    var nivel = $('#curso-alumno').data('nivel');
    var fecha = new Date();
    var año = fecha.getFullYear();
    $.ajax({
            url : "alumno/getNotasAlumno/"+año,
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                if (nivel != "Inicial"){
                    $('#informe-nivel-primaria').show();
                    $('#informe-nivel-inicial').hide();
                    if($('#listado-primario-notas').children().size() < 1){    
                        var cant_columns = checkMayorCantNotas(data);
                        cargarInfoTablaNotas(asignaturas, data, cant_columns);
                    }    
                }else{                    
                    $('#informe-nivel-inicial').show();
                    $('#informe-nivel-primaria').hide();
                    if($('.accordion-group').size() < 1){
                        cargarNotasInicial(asignaturas, data);    
                    }                    
                }                
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
}

function cargarInfoTablaNotas(asignaturas,notas, cant_columns){
    var conte = $('#listado-primario-notas');
    conte.empty();
    //Creamos la cabecera
    var conteCabecera = $('#cabecera-notas');
    conteCabecera.empty();
    cant_columns = cant_columns + 3;
    var new_cabecera = "";
    for (var i = 0; i < cant_columns; i++) {
        if(i == 0){
            new_cabecera = "<td>Asignatura</td>";
        }else{
            if(i+1 != cant_columns){
                new_cabecera = "<td>Nota</td>";
            }else{
                new_cabecera = "<td>Nota</td>";
            }
        }
        conteCabecera.append(new_cabecera);    
    };

    for (var i = 0; i < asignaturas.length; i++) {
        var new_line = "<tr>";
        var conta = 0;
        var idAsignatura = asignaturas[i].idAsignatura;        
        new_line += "<td>"+asignaturas[i].nombre+"</td>";
        var array_notas = getArrayNotas(notas, idAsignatura);
        for (var j = 0; j < cant_columns-1; j++) {
            if(typeof array_notas[j] != "undefined"){
                new_line += "<td>"+array_notas[j].calificacion+"</td>";
                conta++;
            }else{
                new_line += "<td></td>";                
            }            
        };
        new_line += "</tr>";
        conte.append(new_line);
    };
}

function cargarNotasInicial(asignaturas, notas){
    var conte_btn = $('.accordion.nivel-inicial');
    conte_btn.empty();
    for (var i=0; i<asignaturas.length;i++){
        var idAsignatura = asignaturas[i].idAsignatura;
        var array_notas = getArrayNotas(notas, idAsignatura);
        var primera = " ";
        var segunda = " ";
        if (array_notas.length > 0){
            primera = (typeof array_notas[0] != "undefined") ? array_notas[0].calificacion : " ";
            segunda = (typeof array_notas[1] != "undefined") ? array_notas[1].calificacion : " ";
        };
        var newBox='<div class="accordion-group '+asignaturas[i].idAsignatura+' "><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'+i+'"><img src="../img/person.png"><span>'+asignaturas[i].nombre+'</span></a></div><div id="collapse'+i+'" class="accordion-body collapse"><div class="accordion-inner"><h4></h4><div><textarea disabled>'+primera+'</textarea></div><div><textarea disabled>'+segunda+'</textarea></div><span id="modificadoPor"></div></div></div>';
        conte_btn.append(newBox);
    }

}

function getArrayNotas(notas, idAsignatura){
    var notas_arr = [];
    for (var i = 0; i < notas.length; i++) {
        if(notas[i].idAsignatura == idAsignatura){
            notas_arr.push(notas[i]);
        }
    };
    return notas_arr;
}

function checkMayorCantNotas(data){
    var idAsignatura = "";
    var contador = 0;
    var mayor = {};
    mayor.cont = 0;
    for (var i = 0; i < data.length; i++) {
        if(i == 0){
            var idAsignatura = data[i].idAsignatura;
            contador++;
        }else{
            if(data[i].idAsignatura == idAsignatura){
                contador++;
            }else{
                if(contador > mayor.cont){
                    mayor.id = idAsignatura;
                    mayor.cont = contador;
                }                
                var idAsignatura = data[i].idAsignatura;
                contador = 1;
            }
        }
    };
    return mayor.cont;
}

function crearSelectorAsignatura(data){
    var conte_btn=$("#selectorBtnAsignatura");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<li class='asignaturas-curso' data-idasignatura='"+data[i].idAsignatura+"'><label>"+data[i].nombre+"</label><img src='../img/setting.png' class='option-asignaturas'/><span><div class='show-opciones' style='display:none;'><ul><li class='ver_temario'>Temario Dictado</li><li><a target='_blank' href='"+data[i].programa+"'>Programa</a></li><li class='ver_info_curso'>Info General</li></ul></div></span></li>";
        conte_btn.append(newBox);
    }
}

function cargarPrograma(data){
    var conte = $('.contenedor-programa');
    conte.empty();
    /* var new_line = "<div><iframe src='"+data[0].programa+"' style='width:600px; height:500px;' frameborder='0'></iframe></div>";*/
    var new_line = "<div><iframe src='http://red.ilce.edu.mx/sitios/micrositios/cortazar_aniv/pdf/8_Cielo_Rayuela_libro.pdf' style='width:600px; height:500px;' frameborder='0'></iframe></div>";
    conte.append(new_line);
}

function cargarInfoCursoGeneral(data){
    var conte_horarios = $('.info_horarios');
    var conte_docente = $('.info_docente');
    for (var i=0; i<data.length;i++){
        var new_line="<span>"+data[i].diaSemana+" "+data[i].horaInicio+" "+data[i].horaFin+"</span> </br>";
        conte_horarios.append(new_line);
    }
    var new_card="<img src=''><label>"+data[0].apellido+", "+data[0].nombre+" </br> "+data[0].correoElectronico+"</label><label></label></br><a target='_blank' href='"+data[0].curriculumVitae+"'> ver cv</a>";
    conte_docente.append(new_card);
}

function buscarComunicadoWeb(curso){
    $.ajax({
     url: "curso/getComunicadoWeb/"+curso,
     type:"GET",
     dataType: "json",
     success: function(data, textStatus, jqXHR){
        cargarComunicadoWeb(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        var data = {};
        cargarComunicadoWeb(data);
    }
}) 
}

function cargarComunicadoWeb(data){
    var conte = $("#lista-mensajes");
    var conte_popup = $("#mensajes_popup");
    if(data.length >= 1){
        var cant = data.length;
        if(data.length > 3 ){
            cant = 3;
        }
        $("#cantMensajes").text("(" + data.length+")");
        for (var i = 0 ; i<cant; i++){
            var nuevaLinea = "<div class='contenedor-comunicados'><p>"+data[i].comunicado.replace(/%20/g, " ")+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p></div>";
            conte.append(nuevaLinea);
        }
        for (var i = 0 ; i<data.length; i++){
            var newMensaje = "<div class='contenedor-comunicados'><p>"+data[i].comunicado.replace(/%20/g, " ")+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p></div>";
            conte_popup.append(newMensaje);
        }
    }else{
        var sinMensajes = "<div class='contenedor-comunicados sin-comunicados' > Este curso no tiene mensajes nuevos </div>";
        conte.append(sinMensajes);
    }
}

function buscarMiCurso(){
    var fecha = new Date();
    var año = fecha.getFullYear();
    $.ajax({
         url: "curso/getMiCurso/"+año,
         type:"GET",
         dataType: "json",
         success: function(data, textStatus, jqXHR){
            $('body').prepend('<div id="curso-alumno" data-cursoid="'+data[0].idCurso+'" data-nivel="'+data[0].nivel+'" style="display: none;"></div>');
            $('#selector-asignatura h3').text('Asignaturas del curso:  '+data[0].division+' '+data[0].seccion+' '+data[0].nombre);
            buscarComunicadoWeb(data[0].idCurso);
            $('#filtro_etapa').empty();
            if(data[0].division.indexOf('Sala') == -1){
                if(data[0].division.indexOf('Grado') == -1){
                    $('#filtro_etapa').append('<option>Primera</option><option>Segunda</option><option>Tercera</option>')
                }else{
                    $('#filtro_etapa').append('<option>Primera</option><option>Segunda</option><option>Tercera</option><option>Final</option>');    
                }                
            }else{
                $('#filtro_etapa').append('<option>Primera</option><option>Segunda</option>')
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            var data = {};
            console.log("fallo");
            cargarComunicadoWeb(data);
        }
    }) 
}

function cargarDatosAlumno(data){
    $('#perfil-nombre-completo').val(data[0].apellido+', '+data[0].nombre);   
    $('#perfil-dni').val(data[0].nroDocumento);
    $('#perfil-sexo').val(data[0].sexo);
    $('#perfil-fecha-nac').val(data[0].fechaNacimiento);
    $('#perfil-nacionalidad').val(data[0].nacionalidad);
    $('#perfil-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#perfil-tel-fijo').val(data[0].telefonoFijo);
    $('#perfil-tel-movil').val(data[0].telefonoMovil);
    $('#perfil-mail').val(data[0].correoElectronico);
    $('#perfil-lugar-nac').val(data[0].lugarNacimiento);

    $('#perfil-legajo').val(data[0].legajoAlumno);
    $('#perfil-estado').val(data[0].estado);
    $('#perfil-inasistencias').val(data[0].inasistencias);
    $('#perfil-curso').val(data[0].division +' '+data[0].seccion);    
}

function cargarMisDocentes(data){
    var conte = $('#listadoDocentes');
    for (var i = 0; i < data.length; i++) {
        var newLine = '<div><div><img src="img/alumno.png"></div><div><h4>'+data[i].apellido+''+data[i].nombre+'</h4><span>'+data[i].asignatura+'</span><span>'+data[i].correoElectronico+'</span></div></div></div>';
        conte.append(newLine);
    };
    $('#conte-listado-docentes').show();
    $('.overlay-popup').show();
}

function updateListaTemario(){    
    var curso = $('#curso-alumno').data('cursoid');
    var asignatura = $('.contenedor-info').find('h1').data('idasignatura')
    $.ajax({
        url: 'curso/getTemasDictados/'+ curso+"/"+asignatura,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){            
            listarTemasAsignatura(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function listarTemasAsignatura(data){
    var conte = $('#listadoTemasDictados');
    conte.empty();
    var newLine = "";
    for (var i = 0; i < data.length; i++) {
        newLine="<div class='tema-dictado'><div class='texto_tema_dictado'>"+data[i].temasClase.replace(/%20/g, " ")+"</div><span>"+data[i].apellido+", "+data[i].nombre+"</span><span>"+data[i].fechaPublicacion+"</span><div class='separate-line'></div></div>";
        conte.append(newLine);
    };
}

function cargarMisHorarios(data){
    console.log(data);
    var conte = $('.cuerpo-tabla-horarios');
    var newLine = "";
    for (var i = 0; i < data.Lunes.length; i++) {
        var newLine = "<tr><td>"+data.Lunes[i].nombre+"</br>"+data.Lunes[i].horaInicio+" - "+data.Lunes[i].horaFin+"</td><td>"+data.Martes[i].nombre+"</br>"+data.Martes[i].horaInicio+" - "+data.Martes[i].horaFin+"</td><td>"+data.Miércoles[i].nombre+"</br>"+data.Miércoles[i].horaInicio+" - "+data.Miércoles[i].horaFin+"</td><td>"+data.Jueves[i].nombre+"</br>"+data.Jueves[i].horaInicio+" - "+data.Jueves[i].horaFin+"</td><td>"+data.Viernes[i].nombre+"</br>"+data.Viernes[i].horaInicio+" - "+data.Viernes[i].horaFin+"</td></tr>";      
        conte.append(newLine);
    };
    $('#conte-listado-horarios').show();
    $('.overlay-popup').show();
}

function cargarDatosTutor(data){
    $('#idTutor').attr('data-idtutor', data[0].idTutor);
    $('#perfil-nombre-header').text(data[0].apellido+', '+data[0].nombre);
    $('#tutor-dni').val(data[0].nroDocumento);
    $('#tutor-sexo').val(data[0].sexo);
    $('#tutor-fecha-nac').val(data[0].fechaNacimiento);
    $('#tutor-estado-civil').val(data[0].estado);
    $('#tutor-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#tutor-tel-fijo').val(data[0].telefonoFijo);
    $('#tutor-tel-movil').val(data[0].telefonoMovil);
    $('#tutor-mail').val(data[0].correoElectronico);  
}

function cargarPersonasAutorizadas(){
    var idTutor = $('#idTutor').data('idtutor');
    $.ajax({
        url: 'alumno/get_personasAutorizadas/'+ idTutor,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            var conte = $('#listadoAutorizados');
            conte.empty();
            var newLine = "";
            for (var i = 0; i < data.length; i++) {
                var newLine = "<tr data-tutor='"+data[i].idTutor+"' data-autorizado='"+data[i].nroDocumento+"'><td><img class='eliminarAutorizado button' src='../img/Icons(cross-red.png'/></td><td><input type='text' value='"+data[i].apellido+"'></td><td><input type='text' value='"+data[i].nombre+"'></td><td><input type='text' value='"+data[i].nroDocumento+"'</td><td><input type='text' value='"+data[i].telefono+"'</td><td><input type='text' value='"+data[i].relacion+"'</td><td><span class='editarAutorizado button'>Update</span></td><td><span class='button'>span</Edit></td></tr>";      
                conte.append(newLine);
            };
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}


$(document).ready(function(){
    $.ajax({
        url : "docente/getCursos/10003/2014",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearSelectorCurso(data);
            console.log("exito");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
});

$('body').on("click",".box-curso-generic", function(event){    
    var conte_info = $('.contenedor-info');
    var numCurso = $(this).data('idcurso');
    var nombre_curso = $(this).text();
    if(!conte_info.size() > 0){        
        $.ajax({
            url : "docente/pruebaVista",
            type: "GET",
            dataType: "html",
            success: function(data, textStatus, jqXHR){            
                $('#curso-info-container').append(data);
                $('#selector-curso').hide();
                $('.titulo-principal h1').text(nombre_curso);
                cargarInfoCurso(numCurso);
                cargarFiltroCursos(numCurso);
                cargarAsignaturas(numCurso);

            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    }else{        
        $('#selector-curso').hide();
        $('.titulo-principal h1').text(nombre_curso);
        conte_info.show();
        cargarInfoCurso(numCurso);        
        cargarFiltroCursos(numCurso);
        cargarAsignaturas(numCurso);
    }    
});

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
    for (var i = 0; i < data.length; i++) {
        if( i == 0){
            var new_asignatura='<li class="box-asignatura-generica '+data[i].nom_asignatura.replace(/\s/g,'')+' "><div class="asignatura-titulo"><h3>'+data[i].nom_asignatura+'</h3></div></li>';
            new_array[indice] = '<div class="asignatura-body" style = "display:none;">'+data[i].diaSemana+' - '+data[i].apellido+' '+data[i].nombre+'</div>';
            asignatura_cont.append(new_asignatura);
            indice++;
        }else{
            if(data[i].nom_asignatura.replace(/\s/g,'') == data[i-1].nom_asignatura.replace(/\s/g,'')){
                new_array[indice] ='<div class="asignatura-body" style = "display:none;">'+data[i].diaSemana+' - '+data[i].apellido+' '+data[i].nombre+'</div>';
                indice++;
            }else{
                $('.box-asignatura-generica.'+data[i-1].nom_asignatura.replace(/\s/g,'')+' ').append(new_array);
                new_array = [];
                indice = 0;
                var new_asignatura='<li class="box-asignatura-generica '+data[i].nom_asignatura.replace(/\s/g,'')+' "><div class="asignatura-titulo"><h3>'+data[i].nom_asignatura+'</h3></div></li>';
                new_array[indice] = '<div class="asignatura-body" style = "display:none;">'+data[i].diaSemana+' - '+data[i].apellido+' '+data[i].nombre+'</div>';
                asignatura_cont.append(new_asignatura);
                indice++;
            }
        }
        if(data.length-1 == i){
            $('.box-asignatura-generica.'+data[i].nom_asignatura.replace(/\s/g,'')+' ').append(new_array);
        }
        
    }    
    
}

function cargarFiltroCursos(idCurso){
    var cursos = $('.box-curso-generic');
    var filtro_curso = $('#filtro_curso');
    $('#filtro_curso').empty();
    for (var i = 0; i < cursos.length; i++) {
        if(cursos.eq(i).data("idcurso") == idCurso ){
            var new_option = "<option data-idcurso='"+cursos.eq(i).data("idcurso")+"' data-nivel='"+cursos.eq(i).data("nivel")+"'>"+cursos.eq(i).text()+"</option>";
            filtro_curso.append(new_option);    
        }        
    };   
    get_asignaturas_curso(idCurso);
}

function cargarFiltroAsignaturas(asignaturas){
    var filtro_asignatura = $('#filtro_asignatura');
    filtro_asignatura.empty();
    if(asignaturas.length != 0){
        for (var i = 0; i < asignaturas.length; i++) {
            var new_option = "<option data-idAsignatura='"+asignaturas[i].idAsignatura+"'>"+asignaturas[i].Asignatura+"</option>";
            filtro_asignatura.append(new_option);
        };
    }else{
        filtro_asignatura.append("<option>Sin Asignaturas</option>");
    }
    mostrarNotasInicial();    

}

$('body').on('change','#filtro_asignatura, #filtro_etapa', function(){
    mostrarNotasInicial();
});

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
            console.log(data);
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
        url : "curso/getAlumnosPorCurso/"+idCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            console.log(data);
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
    console.log(nivel);
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
        var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno' data-legajo='"+data[i].legajoAlumno+"'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='../img/person.png'></div></a></li>";
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
            console.log(data);
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
                $(this).find('#modificadoPor').text('Última modificación: '+data[i].modificacion);
                if(data[i].modificacion != ""){
                    $(this).find('.guardar_nota').attr('data-modificado','true');
                }
            }
        })
        
    };
}

function listarAlumnosNoInicial(data){
    var conte = $('#listado-primario-notas');
    conte.empty();
    for (var i=0; i<data.length;i++){
        var newBox='<tr><td>'+data[i].legajoAlumno+'</td><td>'+data[i].apellido+' '+data[i].nombre+'</td><td data-nroCalificacion="1"><input type="text"></td><td data-nroCalificacion="2"><input type="text"></td><td data-nroCalificacion="3"><input type="text"></td><td data-nroCalificacion="4"><input type="text"></td><td data-nroCalificacion="5"><input type="text"></td><td data-nroCalificacion="6"><input type="text"></td><td data-nroCalificacion="7"><input type="text"></td><td data-nroCalificacion="8"><input type="text"></td><td data-nroCalificacion="9"><input type="text"></td><td data-nroCalificacion="10"><input type="text"></td></tr>';
        conte.append(newBox);
    }

    buscarInfoNivelPrimaria();

    $('#informe-nivel-primaria input, #informe-nivel-primaria select').bind('change paste keyup', function(){
        $(this).attr('data-editado', true);
    })
}

function buscarInfoNivelPrimaria(){
    var idCurso = $('#filtro_curso').find(':selected').data('idcurso');;
    var idAsignatura = $('#filtro_asignatura').find(':selected').data('idasignatura');;
    var etapa = $('#filtro_etapa').find(':selected').text();
    $.ajax({
        url : "docente/getNotasAsignaturaPrimario/"+idCurso+"/"+idAsignatura+"/"+etapa,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            console.log(data);
            cargarCabeceraNotas(data);
            cargarInfoNivelPrimaria(data);
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
    for (var i = 0; i < data.length; i++) {
        if(i == 0){
            var nroCalificacion = data[0].nroCalificacion;
            $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[0].calificacion);
        }else{
            var nroCalificacion = data[i].nroCalificacion;
            if(data[i].legajoAlumno == data[i-1].legajoAlumno){
              $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[i].calificacion);  
            }else{
                fila++;
                $('#listado-primario-notas tr').eq(fila).children().eq(nroCalificacion+1).children().val(data[i].calificacion);  
            }
        }
    };
}

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
            console.log("Exito Guardando");
            buscarInfoNivel();

        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo Guardando");
        }
    })
}

$('body').on('click','.box-asignatura-generica',function(){
    if($(this).children('.asignatura-body').is(':visible')){
        $(this).children('.asignatura-body').hide();
    }else{
        $('.asignatura-body').hide();
        $(this).children('.asignatura-body').show();
    }
});

function crearSelectorCurso(data){
    var conte_btn=$("#selectorBtnCurso");
    var filtro_curso = $('#filtro_curso');
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-curso-generic' data-idcurso='"+data[i].idCurso+"' data-nivel='"+data[i].nivel+"'>"+data[i].division+" "+data[i].seccion+" "+data[i].nombre+"</div>";
        conte_btn.append(newBox);        
    }
 }

 function cargarPerfilAlumno(data){
    console.log('Nuevo Alumno');
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

$('body').on('click', '.box-alumno-generic', function(){
    var legajo_alumno = $(this).children().data('legajo');
    $.ajax({
        url : "docente/getDatosAlumnoPorLegajo/"+legajo_alumno,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            limpiarPerfilAlumno(data);
            $(".overlay-popup").show();
            $(".perfil-alumno-container").show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    });
});

$('body').on('click','.close-popup', function(){
    $('.overlay-popup').hide();
    $(this).parent().parent().hide();
});

$('body').on('click','.close-popup-tutor', function(){
    $('.overlay-perfil-tutor').hide();
    $('.popup-perfil-tutor').hide();
});


$('body').on('click', 'img.tutores-alumno', function(){
    $('.popup-perfil-tutor').show();
    $('.overlay-perfil-tutor').show();
})

$('body').on('click','#temas-dictados', function(){
    var numAsignatura = $('.titulo-principal h1').data('idasignatura');    
    var numCurso = $('#curso-alumno').data('cursoid');
    $.ajax({
        url: "curso/getTemasDictados/"+numCurso+"/"+numAsignatura+"",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            cargarTemasDictados(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    })
})

function cargarTemasDictados(data){
    var conte_btn=$("#listadoTemasDictados");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var new_line="<div class='tema_dictado'><div>"+data[i].temasClase+"</div><span>"+data[i].apellido+", "+data[i].nombre+"</span><span>"+data[i].fechaPublicacion+"</span></div>";
        conte_btn.append(new_line);
    }
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
$('body').on('click', '#enviarTemario', function(){
    var temario = {};
    temario.docente = $('#legajoDocente').text();
    temario.curso = $('#cursoTemario').children('option:selected').data('cursoid');
    temario.asignatura = $('#asignaturaTemario').children('option:selected').data('asignaturaid');
    temario.temaDictado = $('#temaDisctado').val();
    temario.fecha = $('#fechaDictado').val();
    $.ajax({
        url: 'curso/setTemasDictados/'+ temario.curso+"/"+ temario.asignatura +"/"+ temario.fecha +"/"+ temario.temaDictado +"/"+ temario.docente,
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito TEMARIO");
            updateListaTemario();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo TEMARIO");
        }
    })
})

$('body').on('click', '#updateTemario', function(){
    updateListaTemario();
})

function updateListaTemario(){    
    var curso = $('#cursoTemario').children('option:selected').data('cursoid');
    var asignatura = $('#asignaturaTemario').children('option:selected').data('asignaturaid');
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
        var newLine = "<div><p class='texto-temario'>"+data[i].temasClase+"</p><span class='firma-texto-temario'></span>"+data[i].apellido+", "+data[i].nombre+" - "+data[i].fechaPublicacion+"<span ><img src='' />EDIT</span><div class='separate-line'></div></div>";      
        conte.append(newLine);
    };
}

/* END TEMARIO CURSADO */

/* START COMUNICADO WEB */
$('body').on('click', '#enviarComunicado', function(){
    var comunicado = {};
    comunicado.docente = $('#legajo').text();
    comunicado.curso = $('#cursoComunicado').children('option:selected').data('cursoid');
    comunicado.textoComunicado = $('#temaComunicado').val();
    comunicado.fecha = $('#fechaComunicado').val();
    $.ajax({
        url: 'curso/setComunicadoWeb/'+ comunicado.curso+"/"+ comunicado.docente +"/"+ comunicado.fecha +"/"+ comunicado.textoComunicado,
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito COMUNICADO");
            updateListaComunicados();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo COMUNICADO");
        }
    })
})

$('body').on('click', '#updateComunicado', function(){
    updateListaComunicados();
})

function updateListaComunicados(){    
    var curso = $('#cursoComunicado').children('option:selected').data('cursoid');
    $.ajax({
        url: 'curso/getTemasDictados/'+ curso+"/"+asignatura,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){            
            console.log(data);
            /*listarComunicadosWeb(data);*/
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
        var newLine = "<div><p class='texto-temario'>"+data[i].temasClase+"</p><span class='firma-texto-temario'></span>"+data[i].apellido+", "+data[i].nombre+" - "+data[i].fechaPublicacion+"<span ><img src='' />EDIT</span><div class='separate-line'></div></div>";      
        conte.append(newLine);
    };
}
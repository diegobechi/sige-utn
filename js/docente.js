$("#misCursos").on("click",function(){
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
    }    
});

$('body').on('click','#cargarAlumnosInicial', function(){
    $.ajax({
        url : "curso/notasPorAsignaturaInicial/$idCurso/$idAsignatura/$legajoAlumno/$etapa)",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            console.log(data);
            listarAlumnosInicial(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
})

function cargarInfoCurso(numCurso){
    var nivel = $('#informacion-num-curso').text();
    console.log(nivel);
    if(nivel.indexOf ('sala') > 0){
        $('.grilla-notas').show();
    }else{
        $('.inicial-notas').show();
    }    
    $.ajax({
        url : "curso/getAlumnosPorCurso/"+numCurso,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            console.log(data);
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
        var newBox='<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'+i+'"><img src="../img/person.png"><span>'+data[i].nombre+'</span></a></div><div id="collapse'+i+'" class="accordion-body collapse"><div class="accordion-inner"><h4>'+data[i].etapa+'</h4><div><textarea>'+data[i].calificacion+'</textarea></div><input type="button" value="Guardar" data-legajoalumno="'+data[i].legajoAlumno+'"></div></div></div>';
        conte_btn.append(newBox);
    }
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
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-curso-generic' data-idcurso='"+data[i].idCurso+"'>"+data[i].division+" "+data[i].seccion+" "+data[i].nombre+"</div>";
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
        url : "alumno/getDatosAlumno/"+legajo_alumno,
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
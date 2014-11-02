/* Author: Diego Bechi */
var app = app || {};
app.sige = {};

$('#contenedor-general').css('width',$(window).width());
$('#contenedor-general').css('height',$(window).height());

$('.home-top-item').live('click',function(){
    $('.home-top-item').removeClass('active');
    $(this).addClass('active');
});

app.home = {};

app.home.openLogin = function(bandera){
    if(!bandera){
        $('.login-menu-container').animate({
            'margin-top': '-130px'
        }, 500);
    }else{
        $('.login-menu-container').animate({
            'margin-top': '5px'
        }, 500);        
    }
}

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > 5) {
        $('#menu-home').animate({
            'margin-top': '-55px'
        }, 1);
    } else {
        $('#menu-home').animate({
            'margin-top': '-5px'
        }, 1);
    }
});

/*Home*/

$(".home-niveles-masinfo").on( "click", function() {
    if ( $(this).hasClass('inicial')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');
        $('.home-niveles-contenedor-masinfo').animate({}, 1); 
        $('.nivel-uno').css('display', 'block');
        $('.nivel-uno').animate({}, 1);
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('primario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');
        $('.home-niveles-contenedor-masinfo').animate({}, 1); 
        $('.nivel-dos').css('display', 'block');
        $('.nivel-dos').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('secundario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');
        $('.home-niveles-contenedor-masinfo').animate({}, 1); 
        $('.nivel-tres').css('display', 'block');
        $('.nivel-tres').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else{
        $('.home-niveles-contenedor-masinfo').css('display', 'block');
        $('.home-niveles-contenedor-masinfo').animate({}, 1); 
        $('.nivel-cuatro').css('display', 'block');
        $('.nivel-cuatro').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }

});

app.home.cerrarInfo = function() {
    $('.home-niveles-contenedor-masinfo').css('display', 'none'); 
    $('.nivel-uno').css('display', 'none'); 
    $('.nivel-dos').css('display', 'none'); 
    $('.nivel-tres').css('display', 'none'); 
    $('.nivel-cuatro').css('display', 'none');

    $('.home-niveles-contenedor').css('display', 'block');

    $('.home-niveles-contenedor').animate({
    }, 1);  
}

$(".home-niveles-masinfo").on( "click", function() {
    if ( $(this).hasClass('inicial')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-uno').css('display', 'block');

        $('.nivel-uno').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('primario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-dos').css('display', 'block');

        $('.nivel-dos').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('secundario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-tres').css('display', 'block');

        $('.nivel-tres').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else{
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-cuatro').css('display', 'block');

        $('.nivel-cuatro').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }

});

/*Docente*/
$("#misCursos").on("click",function(){
    $.ajax({
        url : "index.php/docente/getCursos/10002/2014",
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
            url : "index.php/docente/pruebaVista",
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

$('body').on('click','#back-button', function(){
    $('#selector-curso').show();
    $('.contenedor-info').hide();
})

function cargarInfoCurso(numCurso){    
    $.ajax({
        url : "index.php/curso/getAlumnosPorCurso/"+numCurso,
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

function createBoxAlumnos(data){
    var conte_info = $('.contenedor-de-alumnos ul');
    conte_info.empty();
    for(var i=0;i<data.length;i++){
        var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno' data-legajo='"+data[i].legajoAlumno+"'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='img/student_1.png'></div></a></li>";
        conte_info.append(newBox);
        console.log("new box");
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
        url : "index.php/alumno/getDatosAlumno/"+legajo_alumno,
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

$('body').on('click', '.lista-opciones li', function(){
    var name=$(this).data('title');
    $('.contenedor-principal').each(function(){
        if($(this).hasClass(name)){
            $('.contenedor-principal').hide();
            $(this).show();
        }
    })

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

$('body').on('click', '#misAportes', function(){
    var aportes = $('.aportes-alumno tr').size()
    if(aportes== 0){   
        $.ajax({
            url: "index.php/alumno/getAportes/100012",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){    
                crearListadoAportes(data);
                console.log("exito");
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    }
})

function crearListadoAportes(data){
    var conte = $('.aportes-alumno');
    if(data.length >= 1){
        for(var i=0; i < data.length; i++){
            var new_line = '<tr><td>'+data[i].nroComprobante+'</td><td>'+data[i].descripcion+'</td><td>'+data[i].importe+'</td><td>'+data[i].fecha+'</td></tr>';
            conte.append(new_line);
        }
    }else{
        var sinAportes = "Usted no ha realizado aportes al dia de la fecha.";
        conte.append(sinAportes);
    }
    
    
}

/*Alumno*/

$("#misAsignaturas").on("click",function(){
    $.ajax({
        url : "index.php/alumno/getAsignaturas/100012/2014",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearSelectorAsignatura(data);
            console.log("exito");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
});

function crearSelectorAsignatura(data){
    var conte_btn=$("#selectorBtnAsignatura");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-asignatura-generica' data-idasignatura='"+data[i].idAsignatura+"'>"+data[i].nombre+"</div>";
        conte_btn.append(newBox);
    }
 }

$('body').on("click",".box-asignatura-generica", function(event){    
    
    var conte_info = $('.contenedor-info');
    var numAsignatura= $(this).data('idasignatura');
    var nombre_asignatura = $(this).text();
    if(!conte_info.size() > 0){        
        $.ajax({
            url : "index.php/alumno/cargar_vista_asignatura",
            type: "GET",
            dataType: "html",
            success: function(data, textStatus, jqXHR){            
                $('#asignatura-info-container').append(data);
                $('#selector-asignatura').hide();
                $('.titulo-principal h1').text(nombre_asignatura);
                $('.titulo-principal h1').attr('data-idasignatura', numAsignatura);
                cargarInfoAsignatura(numAsignatura);
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


function cargarInfoAsignatura(numAsignatura){    
    $.ajax({
        url : "index.php/alumno/getNotasAsignatura/100001/"+numAsignatura+"/2014",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            createBoxAlumnos(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
}

$('#temas-dictados').on('click', function(){
    var numAsignatura = $('.titulo-principal h1').data('idasignatura');
    var numCurso = 4;
    $.ajax({
        url: "index.php/curso/getTemasDictados/"+numCurso+"/"+numAsignatura+"",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    })
})
 
$('body').on('click','#programa', function(){
    var numAsignatura = $('.titulo-principal h1').data('idasignatura');
    var numCurso = 4;
    $.ajax({
        url: "index.php/curso/getProgramaAsignatura/"+numCurso+"/"+numAsignatura+"",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    })
})
$(document).ready(function(){
    buscarComunicadoWeb();
})

function buscarComunicadoWeb(){
    $.ajax({
     url: "index.php/curso/getComunicadoWeb/2",
     type:"GET",
     dataType: "json",
     success: function(data, textStatus, jqXHR){
        console.log(data);
        cargarComunicadoWeb(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        console.log("fallo");
    }
})

}

function cargarComunicadoWeb(data){
    var conte = $("#lista-mensajes");
    if(data.length >= 1){
        $("#cantMensajes").text("(" + data.length+")");
        for (var i = 0 ; i<data.length; i++){
            var nuevaLinea = "<div><p>"+data[i].comunicado+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p></div>";
            conte.append(nuevaLinea);
        }
    }else{
        var sinMensajes = " Este curso no tiene mensajes nuevos ";
        conte.append(sinMensajes);
    }
}

$(document).ready(function(){
    $('#opciones_1, #opciones_2').click(function() {
        if($('#opciones_2').is(':checked')){ 
            $('.selectpicker').css('visibility', 'visible');
        }else{
            $('.selectpicker').css('visibility', 'hidden');
        }
    });
})

$('#lista-mensajes h3').on('click',function(){
    if($('#page-wrap').hasClass('vertical')){
        $('#page-wrap').removeClass('vertical');
    }else{
        $('#page-wrap').addClass('vertical');
    }
})

$('body').on('click', '#misDatos', function(){
    //levantar el legajo de la cookie
    var legajo_alumno = '100012';
    $.ajax({
        url : "index.php/alumno/getDatosAlumno/"+legajo_alumno,
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            cargarDatosAlumno(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    });
});

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

$('body').on('click', '#misDocentes', function(){
    // Buscar curso en las cookies
    var idCurso = '4';
    $.ajax({
        url: 'index.php/curso/getMisDocentes/'+ idCurso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarMisDocentes(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarMisDocentes(data){
    var conte = $('#listadoDocentes');
    for (var i = 0; i < data.length; i++) {
        var newLine = '<div><div><img src="img/alumno.png"></div><div><h4>'+data[i].apellido+''+data[i].nombre+'</h4><span>'+data[i].asignatura+'</span><span>'+data[i].correoElectronico+'</span></div></div></div>';
        conte.append(newLine);
    };
    $('#conte-listado-docentes').show();
    $('.overlay-popup').show();
}

$('body').on('click', '#misHorarios', function(){
    // Buscar curso en las cookies
    var idCurso = '1';
    $.ajax({
        url: 'index.php/curso/getMisHorarios/'+ idCurso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarMisHorarios(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarMisHorarios(data){
    var conte = $('.cuerpo-tabla-horarios');
    var newLine = "";
    for (var i = 0; i < data.Lunes.length; i++) {
        var newLine = "<tr><td>"+data.Lunes[i].nombre+"</br>"+data.Lunes[i].horaInicio+" - "+data.Lunes[i].horaFin+"</td><td>"+data.Martes[i].nombre+"</br>"+data.Martes[i].horaInicio+" - "+data.Martes[i].horaFin+"</td><td>"+data.Miércoles[i].nombre+"</br>"+data.Miércoles[i].horaInicio+" - "+data.Miércoles[i].horaFin+"</td><td>"+data.Jueves[i].nombre+"</br>"+data.Jueves[i].horaInicio+" - "+data.Jueves[i].horaFin+"</td><td>"+data.Viernes[i].nombre+"</br>"+data.Viernes[i].horaInicio+" - "+data.Viernes[i].horaFin+"</td></tr>";      
        conte.append(newLine);
    };
    $('#conte-listado-horarios').show();
    $('.overlay-popup').show();
}

$('body').on('click', '#misTutores', function(){
    // Buscar curso en las cookies
    var legajoAlumno = '100012';
    $.ajax({
        url: 'index.php/alumno/getTutor/'+ legajoAlumno,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarDatosTutor(data);            
            $(".overlay-popup").show();
            $(".perfil-tutor-container").show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarDatosTutor(data){
    $('#perfil-nombre-header').text(data[0].apellido+', '+data[0].nombre);
    $('#tutor-dni').val(data[0].nroDocumento);
    $('#tutor-sexo').val(data[0].sexo);
    $('#tutor-fecha-nac').val(data[0].fechaNacimiento);
    $('#tutor-estado').val(data[0].estado);
    $('#tutor-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#tutor-tel-fijo').val(data[0].telefonoFijo);
    $('#tutor-tel-movil').val(data[0].telefonoMovil);
    $('#tutor-mail').val(data[0].correoElectronico);  
}

$('body').on('click', '#retirarPersonas', function(){
    // Buscar tutor en las cookies
    cargarPersonasAutorizadas();
})

function cargarPersonasAutorizadas(){
    var idTutor = '2';
    $.ajax({
        url: 'index.php/alumno/get_personasAutorizadas/'+ idTutor,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            var conte = $('#listadoAutorizados');
            conte.empty();
            var newLine = "";
            for (var i = 0; i < data.length; i++) {
                var newLine = "<tr data-tutor='"+data[i].idTutor+"' data-autorizado='"+data[i].nroDocumento+"'><td><span class='eliminarAutorizado button'> X </span></td><td><input type='text' value='"+data[i].apellido_nombre+"'></td><td><input type='text' value='"+data[i].nroDocumento+"'</td><td><input type='text' value='"+data[i].telefono+"'</td><td><input type='text' value='"+data[i].relacion+"'</td><td><span class='editarAutorizado button'>EDIT</span></td></tr>";      
                conte.append(newLine);
            };
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

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
        url: 'index.php/alumno/delete_personasAutorizadas/'+ idTutor+"/"+nroDoc,
        type: 'SET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarPersonasAutorizadas();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

$('body').on('click', '#agregarPermitidas', function(){
    // Buscar tutor en las cookies
    var persona = {};
    persona.idTutor = $('#permita-idTutor').val();
    persona.nombreCompleto = $('#permita-nombre').val();
    persona.nroDocumento = $('#permita-dni').val();
    persona.telefono = $('#permita-num').val();
    persona.relacion = $('#permita-relacion').val();

    $.ajax({
        url: 'index.php/alumno/set_personasAutorizadas/'+ persona.idTutor+"/"+ persona.nombreCompleto+"/"+ persona.nroDocumento+"/"+ persona.telefono+"/"+ persona.relacion,
        type: 'SET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito Guardando");
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo Guardando");
            cargarPersonasAutorizadas();
            $('#permita-idTutor').val('');
            $('#permita-nombre').val('');
            $('#permita-dni').val('');
            $('#permita-num').val('');
            $('#permita-relacion').val('');
        }
    })
})
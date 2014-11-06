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
            'margin-top': '-315px'
        }, 500);
    }else{
        $('.login-menu-container').animate({
            'margin-top': '5px'
        }, 500);        
    }
}

$(window).bind('scroll', function
  () {
    if ($(window).scrollTop() > 5) {
        $('#menu-home').animate({
            'margin-top': '-150px'
        }, 1);
        $('#datos-personales-contenedor').animate({
            'margin-top': '15px'
        }, 1);
    } else {
        $('#menu-home').animate({
            'margin-top': '-5px'
        }, 1);
        $('#datos-personales-contenedor').animate({
            'margin-top': '50px'
        }, 1);
    }
});

/*Home*/

$(".home-niveles-masinfo").on( "click", function() {
    if ( $(this).hasClass('inicial')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '500px'
        }, 1); 

        $('.nivel-uno').css('display', 'block');

        $('.nivel-uno').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('primario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '585px'
        }, 1); 

        $('.nivel-dos').css('display', 'block');

        $('.nivel-dos').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('secundario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '585px'
        }, 1); 

        $('.nivel-tres').css('display', 'block');

        $('.nivel-tres').animate({
        }, 1); 

        $('.home-niveles-contenedor').css('display', 'none');
    }
    else{
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '500px'
        }, 1); 

        $('.nivel-cuatro').css('display', 'block');

        $('.nivel-cuatro').animate({
        }, 1); 

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

app.home.mostrarInfoHistoria = function() {
    $('.home-institucion-contenedor-desplegable-historia').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-historia').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-historia').css('display', 'none');

    $('.home-institucion-contenedor-historia').animate({
        'height': '1105px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-historia').animate({
        'height': '93%'
    }, 1);
}

app.home.ocultarInfoHistoria = function() {
    $('.home-institucion-contenedor-desplegable-historia').css('display', 'none');

    $('.home-institucion-contenedor-vermas-historia').css('display', 'block');

    $('.home-institucion-contenedor-vermas-historia').animate({
    }, 1);

    $('.home-institucion-contenedor-historia').animate({
        'height': '525px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-historia').animate({
        'height': '86%'
    }, 1);
}

app.home.mostrarInfoFormacion = function() {
    $('.home-institucion-contenedor-desplegable-formacion').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-formacion').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-formacion').css('display', 'none');

    $('.home-institucion-contenedor-formacion').animate({
        'height': '1000px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-formacion').animate({
        'height': '93%'
    }, 1);
}

app.home.ocultarInfoFormacion = function() {
    $('.home-institucion-contenedor-desplegable-formacion').css('display', 'none');

    $('.home-institucion-contenedor-vermas-formacion').css('display', 'block');

    $('.home-institucion-contenedor-vermas-formacion').animate({
    }, 1);

    $('.home-institucion-contenedor-formacion').animate({
        'height': '620px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-formacion').animate({
        'height': '88%'
    }, 1);
}

app.home.mostrarInfoSimbolos = function() {
    $('.home-institucion-contenedor-desplegable-simbolos').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-simbolos').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-simbolos').css('display', 'none');

    $('.home-institucion-contenedor-simbolos').animate({
        'height': '1400px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-simbolos').animate({
        'height': '95%'
    }, 1);
}

app.home.ocultarInfoSimbolos = function() {
    $('.home-institucion-contenedor-desplegable-simbolos').css('display', 'none');

    $('.home-institucion-contenedor-vermas-simbolos').css('display', 'block');

    $('.home-institucion-contenedor-vermas-simbolos').animate({
    }, 1);

    $('.home-institucion-contenedor-simbolos').animate({
        'height': '570px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-simbolos').animate({
        'height': '87%'
    }, 1);
}

app.home.mostrarInfoPatronos = function() {
    $('.home-institucion-contenedor-desplegable-patronos').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-patronos').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-patronos').css('display', 'none');

    $('.home-institucion-contenedor-patronos').animate({
        'height': '895px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-patronos').animate({
        'height': '91%'
    }, 1);
}

app.home.ocultarInfoPatronos = function() {
    $('.home-institucion-contenedor-desplegable-patronos').css('display', 'none');

    $('.home-institucion-contenedor-vermas-patronos').css('display', 'block');

    $('.home-institucion-contenedor-vermas-patronos').animate({
    }, 1);

    $('.home-institucion-contenedor-patronos').animate({
        'height': '565px'
    }, 1); 

    $('.home-institucion-contenedor-contenido-patronos').animate({
        'height': '87%'
    }, 1);
}

/*Docente*/
$("#misCursos").on("click",function(){
    $.ajax({
        url : "index.php/docente/getCursos/10002/2014",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearSelector(data);
            console.log("exito");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
});

$('body').on("click",".box-curso-generic", function(event){    
    var numCurso = $(this).data('idcurso');
    $.ajax({
        url : "index.php/docente/pruebaVista",
        type: "GET",
        dataType: "html",
        success: function(data, textStatus, jqXHR){            
            $('#curso-info-container').append(data);
            $('#selector-curso').hide();
            cargarInfoCurso(numCurso);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    });
});

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

function cargarDatosAlumno(data){
    console.log('cargo los datos');
    console.log(data);
}

function crearSelector(data){
    var conte_btn=$("#selectorBtnCurso");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-curso-generic' data-idcurso='"+data[i].idCurso+"'>"+data[i].division+" "+data[i].seccion+" "+data[i].nombre+"</div>";
        conte_btn.append(newBox);
    }
 }

function createBoxAlumnos(data){
    var conte_info = $('.contenedor-de-alumnos ul');
    for(var i=0;i<data.length;i++){
        var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno' data-legajo='"+data[i].legajoAlumno+"'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='img/student_1.png'></div></a></li>";
        conte_info.append(newBox);
        console.log("new box");
    }
}

$('body').on('click', '.box-alumno-generic', function(){
    $(".overlay-popup").show();
    $(".perfil-alumno-container").show();
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
    $('.overlay-popup').fadeOut("slow");
    $(this).parent().parent().fadeOut("slow");
});

$('body').on('click', 'img.tutores-alumno', function(){
    $('.popup-perfil-tutor').show();
    $('.overlay-perfil-tutor').show();

});

/*
window.onload=hora;
fecha = new Date();

function hora(){
    var hora=fecha.getHours();
    var minutos=fecha.getMinutes();
    var segundos=fecha.getSeconds();
    if(hora<10){ hora='0'+hora;}
    if(minutos<10){minutos='0'+minutos; }
    if(segundos<10){ segundos='0'+segundos; }
    fech=hora+":"+minutos+":"+segundos;
    document.getElementById('hora').innerHTML=fech;
    fecha.setSeconds(fecha.getSeconds()+1);
    setTimeout("hora()",1000);
}
*/

$(document).ready(function(){
    $('#opciones_1, #opciones_2').click(function() {
        if($('#opciones_2').is(':checked')){ 
            $('.selectpicker').css('visibility', 'visible');
        }else{
            $('.selectpicker').css('visibility', 'hidden');
        }
    });
})




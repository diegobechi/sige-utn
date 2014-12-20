/* Author: Diego Bechi */
var app = app || {};
app.sige = {};

$('#contenedor-general').css('width',$(window).width());
$('#contenedor-general').css('height',$(window).height());
/*
$('.home-top-item').live('click',function(){
    $('.home-top-item').removeClass('active');
    $(this).addClass('active');
});*/

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

/*Home*/

function cargarNovedades(){
    $.ajax({
        url : "index.php/home/getNovedades/",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearContenedorNovedad(data);
            console.log("exito novedades");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo noveadd");
        }
    });
}

function crearContenedorNovedad(data){
    var conte_novedad = $('.home-novedades-contenedor');
    conte_novedad.empty();
    for(var i=0;i<data.length;i++){
        if (i>0 && i%2==1) {
            var newBox ="<div class='home-novedades-contenedor-novedad' style='float: right;'><div class='home-novedades-contenedor-novedad-titulo'>"+data[i].titulo+"</div><div class='home-novedades-contenedor-novedad-contenido'>"+data[i].descripcion+"</div></div>";
        }else{
            var newBox ="<div class='home-novedades-contenedor-novedad'><div class='home-novedades-contenedor-novedad-titulo'>"+data[i].titulo+"</div><div class='home-novedades-contenedor-novedad-contenido'>"+data[i].descripcion+"</div></div>";
        }
        // var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno' data-legajo='"+data[i].legajoAlumno+"'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='img/student_1.png'></div></a></li>";
        conte_novedad.append(newBox);
    }
}

$(window).bind('scroll', function() {
    if ($(window).scrollTop() > 10) {
        $('#menu-home').animate({
            'margin-top': '-220px'
        }, 1);
        $('.row').animate({
            'padding-top': '30px'
        }, 1);  
        $('#imagen-menu-escudo').css('display', 'block');
    } else {    
        $('#menu-home').animate({
            'margin-top': '20px'
        }, 1);
        $('.row').animate({
            'padding-top': '100px'
        }, 1);
        $('#imagen-menu-escudo').css('display', 'none');
    }
});

$(".home-niveles-masinfo").on( "click", function() {
    if ( $(this).hasClass('inicial')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '500px'
        }, 1); 

        $('.nivel-uno').css('display', 'block');
        $('.nivel-uno').animate({}, 1);
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('primario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '585px'
        }, 1); 

        $('.nivel-dos').css('display', 'block');
        $('.nivel-dos').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('secundario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '585px'
        }, 1); 

        $('.nivel-tres').css('display', 'block');
        $('.nivel-tres').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else{
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
            'height': '500px'
        }, 1); 

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

app.home.mostrarInfoHistoria = function() {
    $('.home-institucion-contenedor-desplegable-historia').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-historia').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-historia').css('display', 'none');

    $('.home-institucion-contenedor-historia').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-historia').animate({
    }, 1);
}

app.home.ocultarInfoHistoria = function() {
    $('.home-institucion-contenedor-desplegable-historia').css('display', 'none');

    $('.home-institucion-contenedor-vermas-historia').css('display', 'block');

    $('.home-institucion-contenedor-vermas-historia').animate({
    }, 1);

    $('.home-institucion-contenedor-historia').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-historia').animate({
    }, 1);
}

app.home.mostrarInfoFormacion = function() {
    $('.home-institucion-contenedor-desplegable-formacion').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-formacion').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-formacion').css('display', 'none');

    $('.home-institucion-contenedor-formacion').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-formacion').animate({
    }, 1);
}

app.home.ocultarInfoFormacion = function() {
    $('.home-institucion-contenedor-desplegable-formacion').css('display', 'none');

    $('.home-institucion-contenedor-vermas-formacion').css('display', 'block');

    $('.home-institucion-contenedor-vermas-formacion').animate({
    }, 1);

    $('.home-institucion-contenedor-formacion').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-formacion').animate({
    }, 1);
}

app.home.mostrarInfoSimbolos = function() {
    $('.home-institucion-contenedor-desplegable-simbolos').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-simbolos').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-simbolos').css('display', 'none');

    $('.home-institucion-contenedor-simbolos').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-simbolos').animate({
    }, 1);
}

app.home.ocultarInfoSimbolos = function() {
    $('.home-institucion-contenedor-desplegable-simbolos').css('display', 'none');

    $('.home-institucion-contenedor-vermas-simbolos').css('display', 'block');

    $('.home-institucion-contenedor-vermas-simbolos').animate({
    }, 1);

    $('.home-institucion-contenedor-simbolos').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-simbolos').animate({
    }, 1);
}

app.home.mostrarInfoPatronos = function() {
    $('.home-institucion-contenedor-desplegable-patronos').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-patronos').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-patronos').css('display', 'none');

    $('.home-institucion-contenedor-patronos').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-patronos').animate({
    }, 1);
}

app.home.ocultarInfoPatronos = function() {
    $('.home-institucion-contenedor-desplegable-patronos').css('display', 'none');

    $('.home-institucion-contenedor-vermas-patronos').css('display', 'block');

    $('.home-institucion-contenedor-vermas-patronos').animate({
    }, 1);

    $('.home-institucion-contenedor-patronos').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-patronos').animate({
    }, 1);
}

/*Docente*/


$('body').on('click','#back-button', function(){
    $('#selector-curso').show();
    $('#selector-asignatura').show();
    $('.contenedor-info').hide();
})

$('body').on('click', '.lista-opciones li', function(){
    var name=$(this).data('title');
    $('.contenedor-principal').each(function(){
        if($(this).hasClass(name)){
            $('.contenedor-principal').hide();
            $(this).show();
        }
    })

});

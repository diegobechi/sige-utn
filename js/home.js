
var app = app || {};
app.sige = {};

$('#contenedor-general').css('width',$(window).width());
$('#contenedor-general').css('height',$(window).height());

app.home = {};

/*Home*/

$(document).ready(function(){
    cargarNovedades();
});

function cargarNovedades(){
    $.ajax({
        url : "home/getNovedades/",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearContenedorNovedad(data);
            console.log("exito novedades");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo noved ad");
        }
    });
}

function crearContenedorNovedad(data){
    var conte_titulo = $('.news-headlines');
    var conte_noticia = $('.news-preview');
    conte_titulo.empty();
    conte_noticia.empty();
    
    for(var i=0;i<data.length;i++){
        // if (i<=3) {
            /*var ruta_imagen= ".."+data[i].rutaArchivo.substring(20);*/
            var ruta_imagen = "";
            if (i==0) {                
                var newBoxTitulo ="<li class='selected'><span>"+data[i].titulo+"</span></li>"; 
                var newBoxNoticia= "<div class='news-content top-content'><img src='"+ruta_imagen+"'><p class='fecha'>"+data[i].fecha+"<p class='titulo'>"+data[i].titulo+"</p><p class='descripcion'>"+data[i].descripcion+"</p></div>";
            }
            else{
                var newBoxTitulo ="<li><span>"+data[i].titulo+"</span></li>";
                var newBoxNoticia= "<div class='news-content'><img src='"+ruta_imagen+"'><p class='fecha'>"+data[i].fecha+"<p class='titulo'>"+data[i].titulo+"</p><p class='descripcion'>"+data[i].descripcion+"</p></div>";
            }            
        // } 
        // else{
        //     var newBoxTitulo ="<li class='home-novedades-contenedor-titulo-vermas'>"+data[i].titulo+"</li>";
        //     var newBoxNoticia= "<div class='news-content home-novedades-contenedor-noticia-vermas'><p><a href='#'>"+data[i].titulo+"</a></p><p>"+data[i].descripcion+"</p></div>";
        // }

        conte_titulo.append(newBoxTitulo);
        conte_noticia.append(newBoxNoticia);
    }
    $('head').append('<script src="../js/vertical.news.slider.min.js"></script>');
}

$('.home-top-item').on('click',function(){
    $('.home-top-item').removeClass('active');
    
    if($(this).hasClass('historia')){
        $('#menu-institucion').addClass('active');
    }
    else if($(this).hasClass('naturaleza')){
        $('#menu-institucion').addClass('active');
    }
    else if($(this).hasClass('formacion')){
        $('#menu-institucion').addClass('active');
    }
    else if($(this).hasClass('simbolos')){
        $('#menu-institucion').addClass('active');
    }
    else if($(this).hasClass('patronos')){
        $('#menu-institucion').addClass('active');
    }
    else if($(this).hasClass('ubicacion')){
        $('#menu-institucion').addClass('active');
    }
    else{
        $(this).addClass('active');
    }
});

$(window).bind('scroll', function() {
    if ($(window).scrollTop() > 10) {
        $('#menu-home').animate({
            'margin-top': '-197px'
        }, 1);         
        $('#imagen-menu-escudo').css('display', 'block');
        $('.contenedor-general').animate({
            'padding-top': '30px'
        }, 1);  
        $('.buttons-menu-container').animate({
            'margin-top': '-50px',
            'margin-left': '251px',
            'margin-right': '2px'
        }, 1); 
    } else {    
        $('#menu-home').animate({
            'margin-top': '0px'
        }, 1);
        $('#imagen-menu-escudo').css('display', 'none');
        $('.contenedor-general').animate({
            'padding-top': '85px'
        }, 1);
        $('.buttons-menu-container').animate({
            'margin-top': '-34px',
            'margin-left': '319px',
            'margin-right': '2px'
        }, 1);
    }
});

$(".home-niveles-masinfo").on( "click", function() {
    if ( $(this).hasClass('inicial')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-uno').css('display', 'block');
        $('.nivel-uno').animate({}, 1);
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('primario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-dos').css('display', 'block');
        $('.nivel-dos').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else if ( $(this).hasClass('secundario')){
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
        }, 1); 

        $('.nivel-tres').css('display', 'block');
        $('.nivel-tres').animate({}, 1); 
        $('.home-niveles-contenedor').css('display', 'none');
    }
    else{
        $('.home-niveles-contenedor-masinfo').css('display', 'block');

        $('.home-niveles-contenedor-masinfo').animate({
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

app.home.mostrarInfoNaturaleza = function() {
    $('.home-institucion-contenedor-desplegable-naturaleza').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-naturaleza').animate({
    }, 1); 

    $('.home-institucion-contenedor-vermas-naturaleza').css('display', 'none');

    $('.home-institucion-contenedor-naturaleza').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-naturaleza').animate({
    }, 1);
}

app.home.ocultarInfoNaturaleza = function() {
    $('.home-institucion-contenedor-desplegable-naturaleza').css('display', 'none');

    $('.home-institucion-contenedor-vermas-naturaleza').css('display', 'block');

    $('.home-institucion-contenedor-vermas-naturaleza').animate({
    }, 1);

    $('.home-institucion-contenedor-naturaleza').animate({
    }, 1); 

    $('.home-institucion-contenedor-contenido-naturaleza').animate({
    }, 1);
}

app.home.mostrarInfoFormacion = function() {
    $('.home-institucion-contenedor-desplegable-formacion').css('display', 'block');

    $('.home-institucion-contenedor-desplegable-formacion').animate({
        'margin-top': '-20px'
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

    $('.escudo').animate({
        'width': '82%'
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

    $('.escudo').animate({
        'width': '100%'
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

    $('#agustin').css('display', 'block');

    $('#agustin').animate({
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

    $('#agustin').css('display', 'none');
}



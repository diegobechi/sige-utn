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

$(".btn.btn-cursos").on("click", function(){
    $("#selector-curso").hide();
    $(".overlay-popup").hide();
    $(".contenedor-info").show();
})

$(".btn.btn-cursos.primero").on("click", function(){
    /*var numCurso = $(this).attr('name');*/
    $.ajax({
        url : "index.php/curso/getAlumnosPorCurso/4",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            console.log(data);
            $("#selector-curso").hide();
            $(".overlay-popup").hide();
            $(".contenedor-info").show();
            createBoxAlumnos(data);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
})

function createBoxAlumnos(data){
    var conte_info = $('.contenedor-de-alumnos ul');
    for(var i=0;i<data.length;i++){
        var newBox = "<li class='box-alumno-generic'><a id='legajo-"+data[i].legajoAlumno+"' href='#' class='box-alumno'><div><h2>"+data[i].apellido+"</h2><h3>"+data[i].nombre+"</h3><img src='img/student_1.png'></div></a></li>";
        conte_info.append(newBox);
        console.log("new box");
    }
}

$('.close-popup').click(function(){
    $('.overlay-popup').fadeOut("slow");
    $(this).parent().parent().fadeOut("slow");
})

$(".box-alumno").on("click",function(){
    var lega = $(this).attr("id");
    $(".overlay-popup").show();
    xxxxxxx
    $(".perfil-alumno-container").show();
})

function getAlumno(lega){
    ajax
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


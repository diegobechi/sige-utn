/* Author: Diego Bechi */
var app = app || {};
app.sige = {};
app.sige.pages = $('.pt-page');
app.sige.pages_2 = $('.pt-page-2');
app.sige.pages_3 = $('.pt-page-3');
app.sige.pages_4 = $('.pt-page-4');
app.sige.pages_5 = $('.pt-page-5');

$('#contenedor-general').css('width',$(window).width());
$('#contenedor-general').css('height',$(window).height());

$pages = $( 'div.pt-page' );
$pages.each( function(i,e) {
    var $page = $(e);
    $page.data( 'originalClassList', $page.attr( 'class' ) );
    if(i==0)
        $page.addClass('pt-page-current').addClass('pt-page-ontop');
});

$('.home-top-item').live('click',function(){
    $('.home-top-item').removeClass('active');
    $(this).addClass('active');
});
app.sige.transition_page = {};
app.sige.transition_page.endanimation = function($outpage, $inpage ){
    endCurrPage = false;
    endNextPage = false;
    $outpage.attr( 'class', $outpage.data( 'originalClassList') + ' pt-page-oh pt-page-non' );
    $inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' + ' pt-page-ontop' );  
}

app.sige.transition_page.animation = function( pageto, animation){    
    $currPage = $('.pt-page-current').addClass('pt-nes');
    $nextPage = app.sige.pages.eq(pageto).addClass('pt-nes');
    endCurrPage = false;
    endNextPage = false;
    animEndEventNames = {
        'WebkitAnimation' : 'webkitAnimationEnd',
        'OAnimation' : 'oAnimationEnd',
        'msAnimation' : 'MSAnimationEnd',
        'animation' : 'animationend'
    }
    animEndEventName = animEndEventNames[ app.helper.styleSupport( 'animation' ) ]
    back=false;
    outClass = 'pt-page-scaleDown';
    inClass = 'pt-page-moveFromRight pt-page-current pt-page-ontop';
    switch( animation ) {
        case 1:
            outClass = 'pt-page-scaleDown';
            inClass = 'pt-page-moveFromRight pt-page-current pt-page-ontop';
            break;
        case 2:
            outClass = 'pt-page-scaleDown';
            inClass = 'pt-page-moveFromLeft pt-page-current pt-page-ontop';
            back = true;
            break;
        case 3:
            outClass = 'pt-page-flipOutLeft';
            inClass = 'pt-page-flipInRight pt-page-delay500';
            break;
        case 4:
            outClass = 'pt-page-rotateCarouselRightOut pt-page-ontop';
            inClass = 'pt-page-rotateCarouselRightIn';
            break;
        case 5:
            outClass = 'pt-page-rotateCarouselLeftOut pt-page-ontop';
            inClass = 'pt-page-rotateCarouselLeftIn';
            break;
        case 6:
            outClass = 'pt-page-rotateCubeLeftOut pt-page-ontop';
            inClass = 'pt-page-rotateCubeLeftIn';
            break;

    }
    var trans = function(){
        if(app.helper.support.transition()){            
            $currPage.addClass( outClass ).on( animEndEventName, function() {
                $currPage.off( animEndEventName );
                endCurrPage = true;
                if( endNextPage ) {
                    app.sige.transition_page.endanimation( $currPage, $nextPage );
                }                
            } );
            $nextPage.addClass( inClass ).removeClass('pt-page-non').on( animEndEventName, function() {
                $nextPage.off( animEndEventName );
                endNextPage = true;
                if( endCurrPage ) {
                    app.sige.transition_page.endanimation( $currPage, $nextPage );
                }
            } );        
        }else{
            $currPage.addClass( outClass ).fadeOut( function() {               
                endCurrPage = true;
                if( endNextPage ) {
                    app.sige.transition_page.endanimation( $currPage, $nextPage );
                }
                $nextPage.addClass( inClass ).fadeIn( function() {
                    endNextPage = true;
                    if( endCurrPage ) {
                        app.sige.transition_page.endanimation( $currPage, $nextPage );
                    }
                });
            } );
    
        }
    };
    if($("html, body").scrollTop() > 250){
        $("html, body").animate({
            scrollTop: 0
        },500,trans);
        
    }else{
        trans();
    }
    
}

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


app.home.prueba=function(){
    if(!$('.home-niveles-contenedor-nivel').hasClass('open')){
        $('.home-niveles-contenedor-nivel').addClass('open');
        $('.home-niveles-contenedor-nivel').animate({
            'background-color':'red'
        },500);
    }else{
        $('.home-niveles-contenedor-nivel').removeClass('open');
        $('.home-niveles-contenedor-nivel').animate({
            'background-color':'blue'
        },500);
    }
}

app.sige.openTabs = function(numPestaña){

    if(!$("#pestaña"+numPestaña).hasClass('active')){
        $('#grupoPestañas').find('.active').removeClass('active');
        $("#pestaña"+numPestaña).addClass('active');
        $('#contenedor-pestañas').addClass('active');
        $('.contenedor-pestañas').animate({
            'margin-top': '-438px'
        }, 500);
    }else{                
        $('#contenedor-pestañas').removeClass('active');
        $('.contenedor-pestañas').animate({
            'margin-top': '-40px'
        }, 500);  
        $('#grupoPestañas').find('.active').removeClass('active');
        $("#pestaña"+numPestaña).removeClass('active');
        return;
    }
}


app.sige.openTabs.bandera = true;

app.helper = {};
app.helper.support = {};
app.helper.support.transition = function(){
    var thisBody = document.body || document.documentElement,
    thisStyle = thisBody.style,
    support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
    return support;
};
app.helper.styleSupport = function ( prop ) {
    var vendorProp, supportedProp,
    capProp = prop.charAt(0).toUpperCase() + prop.slice(1),
    prefixes = [ "Moz", "Webkit", "O", "ms" ],
    div = document.createElement( "div" );
    if ( prop in div.style ) {
        supportedProp = prop;
    }
    else {
        for ( var i = 0; i < prefixes.length; i++ ) {
            vendorProp = prefixes[i] + capProp;
            if ( vendorProp in div.style ) {
                supportedProp = vendorProp;
                break;
            }
        }
    }
    div = null;
    $.support[ prop ] = supportedProp;
    return supportedProp;
}



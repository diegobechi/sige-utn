<!doctype html>
<html class="no-js" lang="es">
    <head>
        <div id="notification" class="bottom-notification separate-layer">
            <span class="message-notification"></span>
            <a class="close-notification">
            </a>            
        </div>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Instituto Santa Teresita - SIGE</title>
        <meta name="viewport" content="width=device-width">
        <!-- <link rel="stylesheet" type="text/css" href="../css/animations.css"> -->
        <link rel="icon" type="image/png" href="../img/icons/SIGE.ico">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../js/libs/bootstrap.min.js"></script>     
        <!-- <script src="../js/libs/jquery-ui-1.8.22.custom.min.js"></script> -->


        <script type="text/javascript">
            function showNotification(message){ 
                if(message=="Failure") {
                    $('#notification').css('background', '#FE2E2E');
                    $('#notification span').html('Ups... Ocurrio un error.Por favor intentelo nuevamente.');
                } else {
                    $('#notification').css('background', '#43ac6a');
                    $('#notification span').html(message);
                }                
                $('#notification').animate({height: '86px'}, 100);
                setTimeout(function(){ $('#notification').animate({height: '-86px'}, 100); }, 3000);
                }
                $('.close-notification').on('click', function(){
                $('#notification').css('height', '-86px');
            })
        </script>
        <style>
            #notification {
            font-weight: normal;
            position: fixed;
            text-align: center;
            font-size: 24px;
            bottom: 0px;
            left: 0px;
            right: 0;
            padding: 0 10px;
            line-height: 86px;
            height: -86px;
            background: #43ac6a;
            color: white;
            z-index:10000;
            }
            #notification .close-notification {
            position: absolute;
            right: 0;
            cursor: pointer;
            color: #3c9a5f;
            height: 86px;
            width: 48px;
            }
            #small-logo-recharge { transition: all 0.3s ease-in-out 0s; }
            #small-logo-recharge:hover{
                cursor: default;
                transform: rotate(360deg);
                transition: all 1.5s ease-in-out 0s;
            }
        </style>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900|Paytone+One|Shadows+Into+Light|Fredoka+One|Righteous|Nunito:400,700,300|Chewy|Luckiest+Guy|Montserrat|Exo+2|Raleway:400,900|Coming+Soon|Open+Sans:800,400|Roboto:400,900|Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>  
          

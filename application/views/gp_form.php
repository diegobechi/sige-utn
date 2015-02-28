<img class="header-background-image"/>
<div class="confirm_pass">
	<h3>Cambiar contraseña</h3>
	<?php  echo validation_errors();      
      echo "Contraseña :".form_password('password', '');
      echo "Confirmacion de contraseña :".form_password('passconf', '');
      echo form_submit('submit', 'Confirmar');
     
	?>
</div>

<style type="text/css">

.confirm_pass h3{
   margin-top: 0;
   color: white;
   font-family: 'Lobster';
   font-size: 35px;
   margin-bottom: 25px;
}

.confirm_pass{
	color: #FFFFFF;
   width: 230px;
   margin: auto;
   top: 0;
   bottom: 0;
   position: absolute;
   left: 0;
   right: 0;
   height: 290px;
   text-align: center;
   padding: 30px;
   background-color: rgba(215, 215, 215, 0.29);
}

.confirm_pass input{
   text-align: center;
}

.confirm_pass label{
   text-align: left;
   color: #FFF;
}

.confirm_pass input { 
   width: 100%; 
   margin-bottom: 10px; 
   background: rgba(0,0,0,0.3);
   border: none;
   outline: none;
   padding: 10px 0;
   font-size: 13px;
   color: #fff;
   text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
   border: 1px solid rgba(0,0,0,0.3);
   border-radius: 4px;
   box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
   -webkit-transition: box-shadow .5s ease;
   -moz-transition: box-shadow .5s ease;
   -o-transition: box-shadow .5s ease;
   -ms-transition: box-shadow .5s ease;
   transition: box-shadow .5s ease;
}
.confirm_pass input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

input[type="submit"]{
   background-color: rgb(99, 163, 112);
   margin-top: 10px;
}

.header-background-image {
   width: 100%;
   height: 100%;
   margin: 0 auto;
   position: absolute;
   -webkit-background-size: cover!important;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover!important;
   background-attachment: fixed!important;
   background: url(../img/login_bk.jpg) top center no-repeat;
}

</style>

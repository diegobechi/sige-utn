<img class="header-background-image"/>
<div class="forgot_pass">
	<?php echo validation_errors(); ?>
	<?php echo form_open('gfp/index'); ?>
	<h3> Recuperacion de contraseña </h3>

	<label>Ingrese su legajo:</label>
	<input type="text" size="30" id="legajo_usuario" name="legajo_usuario"/>
	<br/>
	<input type="submit"name="submit"  value="Enviar contraseña"/>
	</form>
</div>
<style type="text/css">

body{
   margin: 0px;
}

.forgot_pass h3{
   margin-top: 0;
   color: white;
   font-family: 'Lobster';
   font-size: 35px;
   margin-bottom: 25px;
}

.forgot_pass{
	color: #FFFFFF;
   width: 230px;
   margin: auto;
   top: 0;
   bottom: 0;
   position: absolute;
   left: 0;
   right: 0;
   height: 230px;
   text-align: center;
   padding: 30px;
   background-color: rgba(215, 215, 215, 0.29);
}

.forgot_pass input{
   text-align: center;
}

.forgot_pass label{
   text-align: left;
   color: #FFF;
}

.forgot_pass input { 
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
.forgot_pass input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

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
   background: url(../../img/login_bk.jpg) top center no-repeat;
}

</style>

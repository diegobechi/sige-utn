
<img class="header-background-image"/>
<div class="login">
   <h3>Bienvenido</h3>
   <?php echo validation_errors(); ?>
   <?php echo form_open('c_verifylogin'); 
   echo form_label("Legajo: ");
   echo form_input("username");
   echo br();
   echo form_label("Contraseña: ");
   echo form_password("password");
   echo br();
   echo form_submit("","Ingresar");
   echo form_close();
   ?>
   <a href="http://localhost:8080/sige-utn/index.php/gfp/index" style="color:#FFFFFF">¿Olvido su contraseña?</a>
</div>

<style type="text/css">

body{
   margin: 0px;
}

.login h3{
   margin-top: 0;
   color: white;
   font-family: 'Lobster';
   font-size: 35px;
   margin-bottom: 25px;
}

.login{
   width: 230px;
   margin: auto;
   top: 0;
   bottom: 0;
   position: absolute;
   left: 0;
   right: 0;
   height: 315px;
   text-align: center;
   padding: 30px;
   background-color: rgba(215, 215, 215, 0.29);
}

.login input{
   text-align: center;
}

.login label{
   text-align: left;
   color: #FFF;
}
.login form{
   margin-bottom: 5px;   
}

.login input { 
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
.login input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

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
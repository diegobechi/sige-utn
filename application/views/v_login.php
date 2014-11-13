<div class="login">
   <h3>LOGIN SIGE</h3>
   <?php echo validation_errors(); ?>
   <?php echo form_open('c_verifylogin'); 
   echo form_label("Username: ");
   echo form_input("username");
   echo br();
   echo form_label("Password: ");
   echo form_password("password");
   echo br();
   echo form_submit("","Login");
   echo form_close();
   ?>
</div>

<style type="text/css">
.login{
   width: 230px;
   margin: auto;
   top: 0;
   bottom: 0;
   position: absolute;
   left: 0;
   right: 0;
   height: 300px;
   text-align: center;
}

.login input{
   text-align: center;
}
</style>
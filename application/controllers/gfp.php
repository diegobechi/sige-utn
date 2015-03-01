<?php

class Gfp extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
      }

      public function index(){

            $this->form_validation->set_rules('legajo_usuario', 'legajoUser', 'trim|required|callback_email_check');

            if ($this->form_validation->run() == FALSE){
                  $this->load->helper(array('form','html'));
                  $this->load->view('header');
                  $this->load->view('email_check');
            }
            else{
            //please see Codeigniter : Get your forgotten Password . Part-2
            }
      }

      public function email_check($str){
            $query = $this->db->get_where('usuario', array('idUsuario' => $str), 1);            

            if ($query->num_rows()== 1){
                  $this->send_mail();
            }
            else{    
                 $this->form_validation->set_message('email_check', 'No existe un usuario registrado con esa direccion de correo electronico.');
                 return false;
            }
      }

      public function send_mail(){

            $legajoAlumno = $this->input->post('legajo_usuario');
            $this->load->model('M_Login');
            $query = $this->M_Login->checkMail($legajoAlumno);
            $array =  json_decode(json_encode($query), true);
            if($array[0]['correoElectronico']){
                  $email = $array[0]['correoElectronico'];
            }else{
                  $query = $this->M_Login->checkMailTutor($legajoAlumno);
                  $array =  json_decode(json_encode($query), true);
                  $email = $array[0]['correoElectronico'];
            }
            

            $this->load->helper('string');
            $rs = random_string('alnum', 12);

            $data = array(
                           'contraseña' => $rs
                        );
            $this->db->where('correoElectronico', $email);
            $this->db->update('usuario', $data);
            //now we will send an email

            $mail = new PHPMailer();
            $mail->IsSMTP(); // establecemos que utilizaremos SMTP
            $mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
            $mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
            $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
            $mail->Port       = 465;                   // establecemos el puerto SMTP en el servidor de GMail
            $mail->Username   = "infosantateresita@gmail.com";  // la cuenta de correo GMail
            $mail->Password   = "santatere";            // password de la cuenta GMail
            $mail->SetFrom('infosantateresita@gmail.com', 'Instituto Santa Teresita');  //Quien envía el correo
            $mail->AddReplyTo("infosantateresita@gmail.com","Instituto Santa Teresita");  //A quien debe ir dirigida la respuesta
            $mail->Subject    = "Recuperacion de contraseña";  //Asunto del mensaje
            $mail->Body = '<table cellpadding="8" cellspacing="0" style="padding:0;width:100%!important;background:#ffffff;margin:0;background-color:#ffffff" border="0"><tbody><tr><td valign="top">
                        <table cellpadding="0" cellspacing="0" style="border-radius:4px;border:1px #dceaf5 solid" border="0" align="center"><tbody><tr><td colspan="3" height="6"></td></tr><tr style="line-height:0px"><td width="100%" style="font-size:0px" align="center" height="1"><img width="40px" style="width:140px" alt="" src="http://santateresita.cba.infd.edu.ar/sitio/upload/img/escanear0001.jpg" class="CToWUd"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="line-height:25px" border="0" align="center"><tbody><tr><td colspan="3" height="30"></td></tr><tr><td width="36"></td>
                        <td width="454" align="left" style="color:#444444;border-collapse:collapse;font-size:11pt;font-family:proxima_nova,"Open Sans","Lucida Grande","Segoe UI",Arial,Verdana,"Lucida Sans Unicode",Tahoma,"Sans Serif";max-width:454px" valign="top">Hola:<br><br>Recientemente, alguien solicitó cambiar la <span class="il">contraseña</span> de tu cuenta de Instituto Santa Teresita. Si fuiste tú, <a href="http://localhost:8080/sige-utn/index.php/get_password/index/'.$rs.'" target="_blank">haz clic aquí</a> para definir una nueva <span class="il">contraseña</span>:<br><br><center><a style="border-radius:3px;color:white;font-size:15px;padding:14px 7px 14px 7px;max-width:210px;font-family:proxima_nova,"Open Sans","lucida grande","Segoe UI",arial,verdana,"lucida sans unicode",tahoma,sans-serif;border:1px #1373b5 solid;text-align:center;text-decoration:none;width:210px;margin:6px auto;display:block;background-color:#007ee6" href="http://localhost:8080/sige-utn/index.php/get_password/index/'.$rs.'" target="_blank">Restaurar <span class="il">contraseña</span></a></center>
                        <br>Si no deseas modificar tu <span class="il">contraseña</span> o no solicitaste hacerlo, ignora y elimina este mensaje.<br><br>Para preservar la seguridad de tu cuenta, no reenvíes este mensaje a nadie. .<br><br>Gracias.<br>Instituto Santa Teresita</td>
                        <td width="36"></td>
                        </tr><tr><td colspan="3" height="36"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" align="center" border="0"><tbody><tr><td height="10"></td></tr><tr><td style="padding:0;border-collapse:collapse"><table cellpadding="0" cellspacing="0" align="center" border="0"><tbody><tr style="color:#a8b9c6;font-size:11px;font-family:proxima_nova,"Open Sans","Lucida Grande","Segoe UI",Arial,Verdana,"Lucida Sans Unicode",Tahoma,"Sans Serif""><td width="400" align="left"></td>
                        <td width="128" align="right">© 2015 SIGE</td>
                        </tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
            //$mail->Body      = 'Please go to this link to get your password.<br> http://localhost:8080/sige-utn/index.php/get_password/index/'.$rs ;
            $mail->AltBody    = "Cuerpo en texto plano";
            $destino = $email;
            $mail->AddAddress($destino, "Diego Bechi");

            $mail->AddAttachment("images/phpmailer.gif");      // añadimos archivos adjuntos si es necesario
            $mail->AddAttachment("images/phpmailer_mini.gif"); // tantos como queramos

            if(!$mail->Send()) {
            $data["message"] = "Error en el envío: " . $mail->ErrorInfo;
            } else {
            $data["message"] = "¡Mensaje enviado correctamente!";
            }

            redirect('http://localhost:8080/sige-utn/index.php/c_login', false);
      }    
}
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

            $this->form_validation->set_rules('correoElectronico', 'Email', 'trim|required|valid_email|callback_email_check');

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
            $query = $this->db->get_where('alumno', array('correoElectronico' => $str), 1);            

            if ($query->num_rows()== 1){
                  var_dump($query->num_rows());
                  $this->send_mail();
            }
            else{    
                 $this->form_validation->set_message('email_check', 'This Email does not exist.');
                 return false;
            }
      }

      public function send_mail(){

            $email= $this->input->post('correoElectronico');

            $this->load->helper('string');
            $rs = random_string('alnum', 12);

            $data = array(
                           'observaciones' => $rs
                        );
            $this->db->where('correoElectronico', $email);
            $this->db->update('alumno', $data);
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
            $mail->Body      = 'Please go to this link to get your password.<br> http://localhost:8080/sige-utn/index.php/get_password/index/'.$rs ;
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
            //$this->load->view('c_login',$data);
            
            echo "Please check your email address.";
      }    
}
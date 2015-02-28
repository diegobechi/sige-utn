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

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'infosantateresita@gmail.com';
            $config['smtp_pass'] = 'santatere';

            $this->load->library('email', $config);

            $this->email->from('infosantateresita@gmail.com', 'Santa Teresita Info');
            $this->email->to($email);

            $this->email->subject('Get your forgotten Password');
            $this->email->message('Please go to this link to get your password.
                   http://localhost:8080/sige-utn/index.php/get_password/index/'.$rs );

            $this->email->send();
            echo "Please check your email address.";
      }    
}
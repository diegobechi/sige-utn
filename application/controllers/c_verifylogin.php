<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_verifyLogin extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('m_login','login',TRUE);
        $this->load->helper(array('form', 'url','html'));
        $this->load->library(array('form_validation','session'));
    }

    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('v_login');   
        } else {
            //Go to private area
            $tipoPerfil = $this->check_tipo_usuario();
            redirect(base_url($tipoPerfil), 'refresh');
        }       
    }

    function check_database($password) {
         //Field validation succeeded.  Validate against database
       $username = $this->input->post('username');
         //query the database
       $password = 'SqddibwSxG+2VHwmgFIaIA==';
       $result = $this->login->login($username, $password);
       if($result) {
           $sess_array = array();
           foreach($result as $row) {
                 //create the session                
            $sess_array = array('id_usuario' => $row->idUsuario, 'nombre_usuario' => $row->nombre, 'tipo_usuario' => $row->idPerfilUsuario);
                 //set session with value from database
                $this->session->set_userdata('logged_in', $sess_array);                
            }
            return TRUE;
        } else {
              //if form validate false
          $this->form_validation->set_message('check_database', 'Invalid username or password');
          return FALSE;
        }
    }

    function check_tipo_usuario(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['tipo_usuario'] = $session_data['tipo_usuario'];            
            if($data['tipo_usuario'] == 2){
                $perfil = 'alumno';
            }elseif ($data['tipo_usuario'] == 3) {
                $perfil = 'docente';
            }
        }        
        return $perfil;
    }
}
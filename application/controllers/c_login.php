<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller {
    function index() {
        $this->load->helper(array('form','html'));
        $this->load->view('header');
		$this->load->view('v_login');
    }

    function checkUrlOrigen(){
    	echo "<script>alert('Para completar el proceso, por favor verifique su casilla de correo y siga las instrucciones recibidas.');window.location.href='http://localhost:8080/sige-utn/index.php/c_login';</script>";
    }

    function passExito(){
    	echo "<script>alert('Sus datos de acceso fueron actualizados de manera exitosa.');window.location.href='http://localhost:8080/sige-utn/index.php/c_login';</script>";
    }
}
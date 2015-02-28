<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller {
    function index() {
        $this->load->helper(array('form','html'));
        $this->load->view('header');
		$this->load->view('v_login');       
		//$this->load->view('email_check');       
		//$this->load->view('gp_form');       
    }
}
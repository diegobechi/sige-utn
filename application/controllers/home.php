<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{	
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view("home/main");
		$this->load->view('footer');
	}

	public function getNovedades(){
		$this->load->model('Home_Model');
		$query = $this->Home_Model->get_novedad();
		echo json_encode($query);		
	}

}
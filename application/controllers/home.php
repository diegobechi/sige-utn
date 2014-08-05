<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view("home/main");
		$this->load->view('footer');
		
		
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view("home/main");
		$this->load->view('footer');
		$this->load->model('Database_Model');
		$query = $this->Database_Model->get_last_ten_entries();

		print_r($query);
	}
}
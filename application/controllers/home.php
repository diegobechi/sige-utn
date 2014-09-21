<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	public function index()
	{

	
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view("home/main");
		$this->load->view('footer');

		$this->load->model('Student_Model');
		//$query = $this->Student_Model->get_all_students(); //Noe

		/*echo "<pre>";
		print_r($query);
		die();

		for($i = 0; $i< count($query); $i++){
			$array_query[$i] = (array) $query[$i];
		}
		$data ['alumno_uno']= $array_query[0];

		$this->load->view("home/main", $data);*/
  		
  		
	}



}
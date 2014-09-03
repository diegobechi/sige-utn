<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menuUp');
		
		$this->load->model('Student_Model');

		$legajo = 100001;
		if(empty($año)){
            $año = getdate();
            $año = $año['year'];
        }
		/*$query = $this->Student_Model->get_assistence($legajo, $año);*/
		/*$query = $this->Student_Model->get_student($legajo);*/
		$query = $this->Student_Model->get_notas_por_materia($legajo, $año);

		echo "<pre>";
		print_r($query);
		die();

		$this->load->view("alumno/main");
		$this->load->view('footer');
	}
}

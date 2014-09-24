<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view("docente/enviarMensaje");
		$this->load->view('footer');
	}

	public function getCursos(){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_my_cursos(10002);
		
		for($i = 0; $i< count($query); $i++){
			$array_query[$i] = (array) $query[$i];
		}
		$data ['cursos']= $array_query;
		echo json_encode($data['cursos']);		
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curso extends CI_Controller {

	public function index()
	{
		
	}

	public function getAlumnosPorCurso($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_all_students($idCurso);
		echo json_encode($query);		
	}

	public function getAsignaturasCurso($idCurso, $año){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_all_asignaturas($idCurso, $año);
		echo json_encode($query);	
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menuUp');
		$this->load->view('docente/main');	
		/*$this->load->view('docente/selectorCurso');*/
		/*$this->load->view("docente/info_curso");*/
		/*$this->load->view("docente/listados");
		$this->load->view("docente/info_asignaturas");
		$this->load->view("docente/perfilAlumno");*/
		$this->load->view('footer');

		/*$this->load->model(array('Teacher_Model','Curso_Model'));

		/*$query = $this->Teacher_Model->get_asignaturas();*/
		/*$query = $this->Curso_Model->get_all_students();*/
		/*echo "<pre>";
		print_r($query);
		die();*/

	}

	public function getCursos($legajoDocente, $año){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_my_cursos($legajoDocente, $año);
		echo json_encode($query);		
	}

	public function getAsignaturas($legajoDocente, $idCurso){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_asignaturas($legajoDocente, $idCurso);
		echo json_encode($query);		
	}
	public function pruebaVista(){
		$this->load->view("docente/info_curso");
	}

}

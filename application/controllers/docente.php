
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		if (!$this->session->userdata('logged_in')) {
            redirect('c_login', 'refresh');
        }
		$this->load->view('header');
		/*$this->load->view('docente/cargar_notas');*/
		$this->load->view('docente/main');
		$this->load->view('footer');
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

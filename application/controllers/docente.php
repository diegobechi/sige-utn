
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {

	private $legajoDocente;

    public function __construct() {
        parent::__construct();
        $info_session = $this->session->userdata('logged_in');
		$this->legajoDocente = $info_session['id_usuario'];
    }

	public function index(){
		$this->load->helper('url');
		if (!$this->session->userdata('logged_in')) {
            redirect('c_login', 'refresh');
        }else{
        	$session_data = $this->session->userdata('logged_in');
        	if($session_data['tipo_usuario'] == 2){
        		$this->load->view('header');
				/*$this->load->view('docente/cargar_notas');*/
				$this->load->view('docente/main');
				$this->load->view('footer');
        	}else{
        		redirect('alumno', 'refresh');
        	}
        }
	}

	public function getDocente(){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_docente($this->legajoDocente);
		echo json_encode($query);		
	}

	public function getCursos($año){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_my_cursos($this->legajoDocente, $año);
		echo json_encode($query);		
	}

	public function getAsignaturas($idCurso){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_asignaturas($this->legajoDocente, $idCurso);
		echo json_encode($query);		
	}
	public function pruebaVista(){
		$this->load->view("docente/info_curso");
	}

}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {

	private $legajoDocente;

    public function __construct() {
        parent::__construct();
        $info_session = $this->session->userdata('logged_in');
		$this->legajoDocente = $info_session['id_usuario'];
		$this->nombreDocente = $info_session['nombre_usuario'];		
	    //Establecemos zona horaria por defecto
	    date_default_timezone_set('America/Argentina/Buenos_Aires');
	    //preguntamos la zona horaria
	    $zonahoraria = date_default_timezone_get();
    }

	public function index(){
		$this->load->helper('url');
		if (!$this->session->userdata('logged_in')) {
            redirect('c_login', 'refresh');
        }else{
        	$session_data = $this->session->userdata('logged_in');
        	
        	if($session_data['tipo_usuario'] == 3){
        		$this->load->view('header');
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

	public function setNotasAsignaturaInicial($legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa){
		$this->load->model('Teacher_Model');
		$date = date("F j, Y, g:i a");
		$legajoDocente = $this->legajoDocente;
		$modificacion = " ".$this->nombreDocente." (".$legajoDocente .") - ".$date;
		$query = $this->Teacher_Model->set_calificacion_inicial($legajoDocente,$legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa, $modificacion);
		echo json_encode($query);		
	}

	public function updateNotasAsignaturaInicial($legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa){
		$this->load->model('Teacher_Model');
		$date = date("F j, Y, g:i a");
		

		$legajoDocente = $this->legajoDocente;
		$modificacion = ''.$this->nombreDocente.' ('.$legajoDocente .') - '.$date;
		$query = $this->Teacher_Model->update_calificacion_inicial($legajoDocente, $legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa, $modificacion);
		echo json_encode($query);		
	}

	public function getNotasAsignaturaPrimario($idCurso, $idAsignatura, $etapa){
		$this->load->model('Teacher_Model');
		$query = $this->Teacher_Model->get_calificacion_primaria($idCurso, $idAsignatura, $etapa);
		echo json_encode($query);
	}

	public function pruebaVista(){
		$this->load->view("docente/info_curso");
	}

	public function getDatosAlumnoPorLegajo($legajo){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_student($legajo);
		echo json_encode($query);
	}

}

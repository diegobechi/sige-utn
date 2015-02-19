
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
        	$data['nombre_usuario'] = $this->nombreDocente;
        	
        	if($session_data['tipo_usuario'] == 3){
        		$this->load->view('header');
				$this->load->view('docente/main', $data);
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

	public function getCursos(){
		$año = date("Y");
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

	public function setNotasAsignaturaPrimario(){
		$this->load->model('Teacher_Model');
		
		$data = $this->input->post('data');
		// Check for insert array
		if(!empty($data[0])){
			$array_insert = $data[0];	
			$string_insert = "";
			for ($i=0; $i < sizeof($array_insert); $i++) { 
				$string_insert .= "(";
				$string_insert .= "".$array_insert[$i]['idCurso'].",".$array_insert[$i]['idAsignatura'].",".$array_insert[$i]['legajoAlumno'].",'".$array_insert[$i]['etapa']."',".$array_insert[$i]['nroCalificacion'].",'".$array_insert[$i]['motivo']."','".$array_insert[$i]['calificacion']."'";
				$string_insert .= ")";
				if($i != sizeof($array_insert)-1){
					$string_insert .= ",";
				}
			}
			$query_insert = $this->Teacher_Model->insert_calificacion_primaria($string_insert);
		}
		// Check for update array
		if(!empty($data[1])){
			$array_update = $data[1];	
		
			for ($i=0; $i < sizeof($array_update); $i++) { 
				$query_update = $this->Teacher_Model->update_calificacion_primaria($array_update[$i]['idCurso'], $array_update[$i]['idAsignatura'], $array_update[$i]['legajoAlumno'], $array_update[$i]['etapa'], $array_update[$i]['nroCalificacion'], $array_update[$i]['motivo'], $array_update[$i]['calificacion']);
				echo json_encode($query_update);
			}
		}
		// Check for delete array
		if(!empty($data[2])){
			$array_delete = $data[2];	
		
			for ($i=0; $i < sizeof($array_delete); $i++) { 
				$query_delete = $this->Teacher_Model->delete_calificacion_primaria($array_delete[$i]['idCurso'], $array_delete[$i]['idAsignatura'], $array_delete[$i]['legajoAlumno'], $array_delete[$i]['etapa'], $array_delete[$i]['nroCalificacion'], $array_delete[$i]['motivo'], $array_delete[$i]['calificacion']);
				echo json_encode($query_update);
			}
		}
	}

	public function pruebaVista(){
		$this->load->view("docente/info_curso");
	}

	public function getDatosAlumnoPorLegajo($legajo){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_student($legajo);
		echo json_encode($query);
	}

	public function getTutor($legajoAlumno){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_tutor($legajoAlumno);
		echo json_encode($query);		
	}

	public function actualizarUltimaModificacion($idCurso,$idAsignatura,$etapa){
		$this->load->model('Teacher_Model');
		$date = date("F j, Y, g:i a");
		$legajoDocente = $this->legajoDocente;
		$modificacion = ''.$this->nombreDocente.' ('.$legajoDocente .') - '.$date;

		$query = $this->Teacher_Model->actualizarUltimaModificacion($idCurso, $idAsignatura, $etapa, $modificacion);		
	}

}

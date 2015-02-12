<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller {
	
	private $legajoAlumno;

    public function __construct() {
        parent::__construct();
        $info_session = $this->session->userdata('logged_in');
		$this->legajoAlumno = $info_session['id_usuario'];
		$this->nombreAlumno = $info_session['nombre_usuario'];	
    }

	public function index()
	{
		$this->load->helper('url');
		if (!$this->session->userdata('logged_in')) {
            redirect('c_login', 'refresh');
        }else{
        	$session_data = $this->session->userdata('logged_in');
        	$data['nombre_usuario'] = $this->nombreAlumno;
        	if($session_data['tipo_usuario'] == 2){
        		$this->load->view('header');
				$this->load->model('Student_Model');
				if(empty($año)){
		            $año = getdate();
		            $año = $año['year'];
		        }
				$this->load->view("alumno/main", $data);
        	}else{
        		redirect('docente', 'refresh');
        	}        	
        }		
	}

	public function getDatosAlumno(){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_student($this->legajoAlumno);
		echo json_encode($query);
	}

	public function getAsistencia(){
		$this->load->model('Student_Model');
		$año = date("Y");
		$query = $this->Student_Model->get_asistencia($this->legajoAlumno, $año);
		echo json_encode($query);
	}

	public function getAsignaturas($año){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_asignaturas($this->legajoAlumno, $año);
		echo json_encode($query);		
	}

	public function getInfoAsignatura($idCurso, $idAsignatura){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_info_asignatura($idCurso, $idAsignatura);
		$semana = array(   
	        0=>"Lunes",  
	        1=>"Martes",  
	        2=>"Miércoles",  
	        3=>"Jueves",
	        4=>"Viernes"
		);
		$horarios = array();
		$cont = 0;
		for ($j=0; $j < sizeof($semana) ; $j++) {
			$nombreDia = $semana[$j];			
			for ($i = 0; $i < sizeof($query); $i++){
				$diaSemana = $query[$i]['diaSemana'];
			    if($diaSemana == $nombreDia){
			    	$horarios[$j]['horaInicio'] = $query[$i]['horaInicio'];
			    	$horarios[$j]['horaFin'] = $query[$i]['horaFin'];
			    	$horarios[$j]['diaSemana'] = $query[$i]['diaSemana'];
			    	$horarios[$j]['nombre'] = $query[$i]['nombre'];
			    	$horarios[$j]['apellido'] = $query[$i]['apellido'];
			    	$horarios[$j]['correoElectronico'] = $query[$i]['correoElectronico'];
			    	$cont++;
			    }				
			}
			$cont = 0;
		}
		echo json_encode($horarios);
	}

	public function getNotasAlumno($año){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_notas_alumno($this->legajoAlumno, $año);
		echo json_encode($query);			
	}

	public function getNotasAsignatura($idAsignatura, $año){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_notas_por_materia($this->legajoAlumno, $idAsignatura, $año);
		echo json_encode($query);		
	}
	public function cargar_vista_asignatura(){
		$this->load->view("alumno/info_asignatura");
	}

	public function getTutor(){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_tutor($this->legajoAlumno);
		echo json_encode($query);		
	}

	public function getAportes(){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_aportes($this->legajoAlumno);
		echo json_encode($query);		
	}

	public function get_personasAutorizadas($idTutor){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_autorizados($idTutor);
		echo json_encode($query);	
	}

	public function set_personasAutorizadas($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->set_autorizados($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion);
		echo json_encode($query);	
	}

	public function update_personasAutorizadas($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->update_autorizados($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion);
		echo json_encode($query);	
	}

	public function delete_personasAutorizadas($idTutor,$nroDocumento){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->delete_autorizados($idTutor,$nroDocumento);
		echo json_encode($query);	
	}

}

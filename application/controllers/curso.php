<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curso extends CI_Controller {

	private $legajo;	

    public function __construct() {
        parent::__construct();
        $info_session = $this->session->userdata('logged_in');
		$this->legajo = $info_session['id_usuario'];
		//Establecemos zona horaria por defecto
	    date_default_timezone_set('America/Argentina/Buenos_Aires');
	    //preguntamos la zona horaria
	    $zonahoraria = date_default_timezone_get();
    }

	public function index()
	{
		
	}
	
	/* Funciones usadas por todos */

	public function getTemasDictados($idCurso, $idAsignatura){
	 	$this->load->model('Curso_Model');
	 	$año = date("Y");
		$query = $this->Curso_Model->get_temario_dictado($idCurso, $idAsignatura, $año);
		echo json_encode($query);
	}

	public function getProgramaAsignatura($idCurso, $idAsignatura){
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_programa($idCurso, $idAsignatura);
		echo json_encode($query);
	}
	
	public function getDatosAsignaturas($idCurso,$idAsignatura){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->getDatosGeneralesAsignaturas($idCurso,$idAsignatura);
		echo json_encode($query);
	}

	/* Funciones usadas por el docente */
	
	public function setTemasDictados($idCurso, $idAsignatura, $temasClase, $date){
		$temasClase = urldecode($temasClase);
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->set_temario_dictado($idCurso, $idAsignatura, $date, $temasClase, $this->legajo);
		echo json_encode($query);
	}

	public function updateTemario($idAsignatura, $idCurso, $fecha, $texto_tema_dictado){
		$texto_tema_dictado = urldecode($texto_tema_dictado);
		$this->load->model('Curso_Model');	
		$query = $this->Curso_Model->update_temario_dictado($idAsignatura, $idCurso, $fecha, $texto_tema_dictado, $this->legajo);
		echo json_encode($query);
	}

	public function getAlumnosPorCurso($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_all_students($idCurso);
		echo json_encode($query);		
	}

	public function getAlumnosPorCursoLegajo($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_all_students_legajo($idCurso);
		echo json_encode($query);		
	}
	
	public function getAsistenciaCurso($idCurso){
		$año = date("Y");		
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_asistencia_curso($idCurso, $año);
		echo json_encode($query);
	}

	public function insertAsistenciaCursoPorFecha($fecha){
		$this->load->model('Curso_Model');
		$data = $this->input->post('data');
		$string_insert = "";
		for ($i=0; $i < sizeof($data); $i++) { 
			$string_insert .= "(";
			$string_insert .= "".$data[$i]['legajo'].", '".$fecha."',".$data[$i]['presente'].",'".$data[$i]['justificacion']."'";
			$string_insert .= ")";
			if($i != sizeof($data)-1){
				$string_insert .= ",";
			}
		}
		$query = $this->Curso_Model->insert_asistencia_por_fecha($string_insert);
		echo json_encode($query);	
	}

	public function updateAsistenciaCursoPorFecha($fecha){
		$this->load->model('Curso_Model');
		$data = $this->input->post('data');
		for ($i=0; $i < sizeof($data); $i++) {
			$justificacion = $data[$i]['justificacion'];
			if ($data[$i]['justificacion'] == "") {
				$justificacion = " ";
			}
			$query = $this->Curso_Model->update_asistencia_por_fecha($data[$i]['legajo'], $fecha, $data[$i]['presente'], $justificacion);
		}		
		echo json_encode($query);	
	}

	public function getAsistenciaCursoPorFecha($idCurso, $fecha){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_asistencia_por_fecha($idCurso, $fecha);
		echo json_encode($query);	
	}

	public function setComunicadoWeb($idCurso, $comunicado){	 	
	 	$this->load->model('Curso_Model');
	 	$date = date('j M Y');
	 	$comunicado_web = urldecode($comunicado);
		$query = $this->Curso_Model->set_comunicado($idCurso, $this->legajo, $date, $comunicado_web);
		echo json_encode($query);
	}

	public function getComunicadoWeb($idCurso){
	   $fecha_hasta = date( "j M Y",mktime(0, 0, 0, date("m"),date("d"), date("Y")));
	   $fecha_desde = date( "j M Y",mktime(0, 0, 0, date("m"),date("d")-7, date("Y")));
	   $this->load->model('Curso_Model');
	   $query = $this->Curso_Model->get_comunicado($idCurso, $fecha_desde, $fecha_hasta);
	   echo json_encode($query);
	}

	public function updateComunicado($idComunicado, $textoComunicado){
		$this->load->model('Curso_Model');
	 	$date = date('j M Y');
	 	$textoComunicado = urldecode($textoComunicado);
		$query = $this->Curso_Model->update_comunicado($idComunicado, $textoComunicado, $date, $this->legajo);
		echo json_encode($query);	
	}

	public function notasPorAsignaturaInicial($idCurso, $idAsignatura, $etapa){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->getNotasPorAsignaturaInicial($idCurso, $idAsignatura, $etapa);
		echo json_encode($query);	
	}

	/* Funciones usadas por el alumno */

	public function getMiCurso($año){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_curso($this->legajo, $año);
		echo json_encode($query);
	}

	public function getAsignaturasCurso($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_all_asignaturas($idCurso,"2015");
		$semana = array(   
	        0=>"Lunes",  
	        1=>"Martes",  
	        2=>"Miércoles",  
	        3=>"Jueves",
	        4=>"Viernes"
		);
		$horarios = array();
		$asignaturas = array();
		$aux = 0;
		for($ix=0; $ix < sizeof($query); $ix++) { 
			if($ix==0){
				$asignaturas[$aux] = $query[$ix]['nom_asignatura'];
				$aux++;
			}else{
				if($query[$ix]['nom_asignatura'] != $query[$ix-1]['nom_asignatura']){
					$asignaturas[$aux] = $query[$ix]['nom_asignatura'];
					$aux++;
				}
			}
		}
		$cont=0;
		for ($z = 0; $z < sizeof($asignaturas); $z++){
			$nombreAsignatura = $asignaturas[$z];
			for ($j=0; $j < sizeof($semana) ; $j++) {
				$nombreDia = $semana[$j];			
				for ($i = 0; $i < sizeof($query); $i++){
					$diaSemana = $query[$i]['diaSemana'];
					$asignatura = $query[$i]['nom_asignatura'];
				    if($diaSemana == $nombreDia && $asignatura == $nombreAsignatura){
				    	$horarios[$cont]['horaInicio'] = $query[$i]['horaInicio'];
				    	$horarios[$cont]['horaFin'] = $query[$i]['horaFin'];
				    	$horarios[$cont]['diaSemana'] = $query[$i]['diaSemana'];
				    	$horarios[$cont]['nombre'] = $query[$i]['nombre'];
				    	$horarios[$cont]['apellido'] = $query[$i]['apellido'];
				    	$horarios[$cont]['correoElectronico'] = $query[$i]['correoElectronico'];
				    	$horarios[$cont]['legajoDocente'] = $query[$i]['legajoDocente'];
				    	$horarios[$cont]['nom_asignatura'] = $query[$i]['nom_asignatura'];
				    	$cont++;
				    }				
				}				
			}
		}
		echo json_encode($horarios);	
	}

	public function getMisDocentes($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->getDocentes($idCurso);
		echo json_encode($query);
	}

	public function getMisHorarios($idCurso){
		$this->load->model('Curso_Model');
		$query = $this->Curso_Model->getHorarios($idCurso);
		$semana = array(   
	        0=>"Lunes",  
	        1=>"Martes",  
	        2=>"Miércoles",  
	        3=>"Jueves",
	        4=>"Viernes"
		);
		$horarios = array();
		for ($j=0; $j < sizeof($semana) ; $j++) {
			$nombreDia = $semana[$j];
			$cont = 0;
			for ($i = 0; $i < sizeof($query); $i++){
				$diaSemana = $query[$i]['diaSemana'];
			    if($diaSemana == $nombreDia){
			    	$horarios[$nombreDia][$cont]['horaInicio'] = $query[$i]['horaInicio'];
			    	$horarios[$nombreDia][$cont]['horaFin'] = $query[$i]['horaFin'];
			    	$horarios[$nombreDia][$cont]['nombre'] = $query[$i]['nombre'];
			    	$cont++;
			    }				
			}
			$cont = 0;
		}
		echo json_encode($horarios);		
	}	
}
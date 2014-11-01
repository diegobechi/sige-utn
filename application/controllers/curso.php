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

	 public function getAsistenciaCurso($idCurso, $año){
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_asistencia_curso($idCurso, $año);
		echo json_encode($query);
	 }

	 public function getTemasDictados($idCurso, $idAsignatura){
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_temario_dictado($idCurso, $idAsignatura);
		echo json_encode($query);
	 }

	public function getProgramaAsignatura($idCurso, $idAsignatura){
	 	$this->load->model('Curso_Model');
		$query = $this->Curso_Model->get_programa($idCurso, $idAsignatura);
		echo json_encode($query);
	}	 
	public function getComunicadoWeb($idCurso){
	  $fecha_hasta = date( "d-m-Y",mktime(0, 0, 0, date("m"),date("d"), date("Y")));;
	  $fecha_desde = date( "d-m-Y",mktime(0, 0, 0, date("m"),date("d")-7, date("Y")));
	  $this->load->model('Curso_Model');
	  $query = $this->Curso_Model->get_comunicado($idCurso, $fecha_desde, $fecha_hasta);
	  echo json_encode($query);
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
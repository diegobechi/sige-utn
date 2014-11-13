<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		if (!$this->session->userdata('logged_in')) {
            redirect('c_login', 'refresh');
        }
		$this->load->view('header');
		$this->load->model('Student_Model');

		$legajo = 100012;
		if(empty($año)){
            $año = getdate();
            $año = $año['year'];
        }

		$this->load->view("alumno/main");
		$this->load->view('footer');
	}
	public function getDatosAlumno($legajoAlumno){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_student($legajoAlumno);
		echo json_encode($query);
	}

	public function getAsignaturas($legajoAlumno, $año){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_asignaturas($legajoAlumno, $año);
		echo json_encode($query);		
	}

	public function getNotasAsignatura($legajoAlumno, $idAsignatura, $año){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_notas_por_materia($legajoAlumno, $idAsignatura, $año);
		echo json_encode($query);		
	}
	public function cargar_vista_asignatura(){
		$this->load->view("alumno/info_asignatura");
	}

	public function getTutor($legajoAlumno){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_tutor($legajoAlumno);
		echo json_encode($query);		
	}

	public function getAportes($legajoAlumno){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_aportes($legajoAlumno);
		echo json_encode($query);		
	}

	public function get_personasAutorizadas($idTutor){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->get_autorizados($idTutor);
		echo json_encode($query);	
	}

	public function set_personasAutorizadas($idTutor,$nombreCompleto,$nroDocumento,$telefono,$relacion){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->set_autorizados($idTutor,$nombreCompleto,$nroDocumento,$telefono,$relacion);
		echo json_encode($query);	
	}

	public function update_personasAutorizadas($idTutor,$nombreCompleto,$nroDocumento,$telefono,$relacion){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->update_autorizados($idTutor,$nombreCompleto,$nroDocumento,$telefono,$relacion);
		echo json_encode($query);	
	}

	public function delete_personasAutorizadas($idTutor,$nroDocumento){
		$this->load->model('Student_Model');
		$query = $this->Student_Model->delete_autorizados($idTutor,$nroDocumento);
		echo json_encode($query);	
	}

}

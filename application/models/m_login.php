<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class M_login extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function login($username, $password) {
        $query = $this->db->query("SELECT * FROM Usuario u WHERE u.idUsuario = $username and u.contraseña = '$password'");
        if($query->num_rows() == 1) { 
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function checkMail($legajoUser){
        $query = $this->db->query("SELECT correoElectronico FROM Usuario WHERE idUsuario = '$legajoUser'");
        return $query->result();
    }

    function checkMailTutor($legajoAlumno){
        $query = $this->db->query("SELECT DISTINCT t.correoElectronico
                                    FROM Tutor t, GrupoFamiliar gf, Alumno a
                                    WHERE t.idTutor = gf.idTutor and
                                          a.legajoAlumno = gf.legajoAlumno and
                                          gf.legajoAlumno = $legajoAlumno");
        return $query->result();
    }

}
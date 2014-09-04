<?php

class Teacher_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_teacher($legajoDocente){
        $string_query = $this->db->query("SELECT * FROM Docente WHERE legajoDocente = $legajoDocente");
        return $string_query->result();
    }

    function get_all_students($legajoDocente){
        $string_query = $this->db->query("SELECT * FROM Alumno WHERE legajoAlumno = $legajo");
        return $string_query->result();
    }

    function get_asignaturas($legajoDocente){
        $string_query = $this->db->query("SELECT DISTINCT a.nombre as Asignatura, ne.division, c.seccion, t.nombre
                                            FROM Docente d, AsignaturaPorDocente ad, Asignatura a, NivelEducativo ne, Curso c, Turno t
                                            WHERE d.legajoDocente = ad.legajoDocente and 
                                              a.idAsignatura = ad.idAsignatura and
                                              ne.idNivelEducativo = a.idNivelEducativo and
                                              ne.idNivelEducativo = c.idNivelEducativo and
                                              c.idTurno = t.idTurno and
                                              d.legajoDocente = $legajoDocente");
        return $string_query->result();        
    }

}
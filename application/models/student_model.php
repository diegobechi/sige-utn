<?php

class Student_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }
    
    function get_student($legajo){
        $string_query = $this->db->query("SELECT * FROM Alumno WHERE legajoAlumno = $legajo");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_tutores($legajo){
        $string_query = $this->db->query("SELECT t.* FROM Tutor t, GrupoFamiliar gf WHERE t.idTutor = gf.idTutor and gf.legajoAlumno = $legajo");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_assistence($legajo, $año){       
        $string_query = $this->db->query("SELECT a.* FROM AsistenciaAlumno a, Alumno alu WHERE a.legajoAlumno = $legajo and YEAR(a.fecha) = $año");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_notas_por_materia($legajo, $año){
        $string_query = $this->db->query("SELECT a.nombre,ce.motivo, ce.calificacion,CONVERT(VARCHAR(11), ce.fecha, 106) as fecha FROM Curso c, NivelEducativo ne, Alumno alu, Inscripcion i, Asignatura a, CalificacionEscolar ce WHERE alu.legajoAlumno= i.legajoAlumno and i.idCurso = c.idCurso and    c.idNivelEducativo = ne.idNivelEducativo and a.idNivelEducativo = ne.idNivelEducativo and ce.idAsignatura = a.idAsignatura and ce.legajoAlumno = alu.legajoAlumno and alu.legajoAlumno = $legajo and YEAR(ce.fecha)= $año GROUP BY a.nombre,ce.fecha, ce.calificacion,ce.motivo");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    

}
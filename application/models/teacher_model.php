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

    function get_asignaturas($legajoDocente, $idCurso){
        $string_query = $this->db->query("SELECT DISTINCT a.nombre as Asignatura, ne.division, c.seccion, t.nombre
                                            FROM Docente d, AsignaturaPorDocente ad, Asignatura a, NivelEducativo ne, Curso c, Turno t
                                            WHERE d.legajoDocente = ad.legajoDocente and 
                                              a.idAsignatura = ad.idAsignatura and
                                              ne.idNivelEducativo = a.idNivelEducativo and
                                              ne.idNivelEducativo = c.idNivelEducativo and
                                              c.idTurno = t.idTurno and
                                              c.idCurso = $idCurso and
                                              d.legajoDocente = $legajoDocente");
        return $string_query->result();        
    }

    function get_my_cursos($legajoDocente){
        $string_query = $this->db->query("SELECT DISTINCT  c.idCurso, ne.division, c.seccion, t.nombre 
                                          FROM Docente d, AsignaturaPorDocente ad, Asignatura a, NivelEducativo ne, Curso c, Turno t
                                          WHERE d.legajoDocente = ad.legajoDocente and 
                                                a.idAsignatura = ad.idAsignatura and
                                                ne.idNivelEducativo = a.idNivelEducativo and
                                                ne.idNivelEducativo = c.idNivelEducativo and
                                                c.idTurno = t.idTurno and
                                                d.legajoDocente = $legajoDocente");
        return $string_query->result();
    }

    function get_asistencia($legajoDocente){
        $string_query = $this->db->query("SELECT ad.fecha,a.nombre,c.idCurso
                                            FROM AsistenciaDocente ad , Docente d, Asignatura a, Curso c
                                            WHERE d.legajoDocente =ad.legajoDocente and
                                                  a.idAsignatura = ad.idAsignatura  and
                                                  c.idCurso = ad.idCurso and
                                                  ad.presente = 0 and
                                                  d.legajoDocente = $legajoDocente");
    }

    function set_calificacion_escolar($legajoAlumno, $idAsignatura, $fecha, $motivo, $evaluado, $calificacion){
        $string_query = $this->db->query("INSERT INTO CalificacionEscolar (legajoAlumno, idAsignatura, fecha, motivo, evaluado, calificacion) 
                                          VALUES (@legajoAlumno, @idAsignatura, @fecha, @motivo, @evaluado, @calificacion)");
    }
   
    function delete_calificacion_escolar($legajoAlumno,$idAsignatura,$fecha,$motivo){
        $string_query = $this->db->query("DELETE FROM CalificacionEscolar WHERE legajoAlumno = $legajoAlumno AND idAsignatura = @idAsignatura AND fecha = @fecha AND motivo = @motivo");
    }

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }
}
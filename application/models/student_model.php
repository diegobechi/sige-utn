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
    
    function get_student($legajoAlumno){
        $string_query = $this->db->query("SELECT * FROM Alumno WHERE legajoAlumno = $legajoAlumno");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_tutor($legajoAlumno){
        $string_query = $this->db->query("SELECT DISTINCT t.nroDocumento, t.sexo,CONVERT (char(10),t.fechaNacimiento, 103) as Fecha , e.nombre as 'Estado Civil', d.calle, d.numero, d.piso,t.telefonoFijo, t.telefonoMovil, t.correoElectronico
                                          FROM Alumno a, Tutor t, GrupoFamiliar gf, Domicilio d, Estado e
                                          WHERE a.legajoAlumno = gf.legajoAlumno and
                                                  t.idTutor = gf.idTutor and
                                                  t.idDomicilio = d.idDomicilio and
                                                  t.idEstadoCivil = e.idEstado and
                                                  a.legajoAlumno= $legajoAlumno");
      
    }

    function get_tutores($legajoAlumno){
        $string_query = $this->db->query("SELECT t.* FROM Tutor t, GrupoFamiliar gf WHERE t.idTutor = gf.idTutor and 
                                            gf.legajoAlumno = $legajoAlumno");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_mis_alumnos_a_cargo($idTutor){
        $tring_query = $this ->db->query("SELECT DISTINCT a.legajoAlumno,a.apellido, a.nombre
                                          FROM Alumno a, Tutor t, GrupoFamiliar gf
                                          WHERE a.legajoAlumno = gf.legajoAlumno and
                                          t.idTutor = gf.idTutor and
                                          t.idTutor = $idTutor;");

    }

    function get_assistence($legajoAlumno, $año){       
        $string_query = $this->db->query("SELECT a.* FROM AsistenciaAlumno a, Alumno alu WHERE a.legajoAlumno = $legajoAlumno and 
                                            YEAR(a.fecha) = $año");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_notas_por_materia($legajoAlumno, $año){
        $string_query = $this->db->query("SELECT a.nombre,ce.motivo, ce.calificacion,CONVERT(VARCHAR(11), ce.fecha, 106) as fecha 
                                            FROM Curso c, NivelEducativo ne, Alumno alu, Inscripcion i, Asignatura a, CalificacionEscolar ce 
                                            WHERE alu.legajoAlumno= i.legajoAlumno and i.idCurso = c.idCurso and    
                                            c.idNivelEducativo = ne.idNivelEducativo and a.idNivelEducativo = ne.idNivelEducativo and 
                                            ce.idAsignatura = a.idAsignatura and ce.legajoAlumno = alu.legajoAlumno and 
                                            alu.legajoAlumno = $legajoAlumno and YEAR(ce.fecha)= $año 
                                            GROUP BY a.nombre,ce.fecha, ce.calificacion,ce.motivo");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_aportes($legajoAlumno){
        $string_query = $this->db->query("");
        $query = $string_query->result();
        return $this->clear_result($query);
    }

    function get_sanciones($legajoAlumno){
        $string_query = $this->db->query("SELECT * FROM SancionDisciplinaria WHERE legajoAlumno = $legajoAlumno");
        $query = $string_query->result();
        return $this->clear_result($query);    
    }

    function get_meritos($legajoAlumno){
        $string_query = $this->db->query("");
        $query = $string_query->result();
        return $this->clear_result($query);
    }
}
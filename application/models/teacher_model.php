<?php

class Teacher_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_docente($legajoDocente){
        $string_query = $this->db->query("SELECT d.apellido, d.nombre, d.nroDocumento, d.lugarNacimiento, d.sexo ,CONVERT(VARCHAR(11),d.fechaNacimiento, 106) as 'fechaNacimiento', d.nacionalidad,d.legajoDocente,dom.calle, dom.numero, dom.departamento, dom.piso, dom.numero, d.telefonoFijo, d.telefonoMovil, d.correoElectronico
                                          FROM Docente d, Domicilio dom
                                          WHERE d.idDomicilio = dom.idDomicilio and
                                                d.legajoDocente = $legajoDocente");
        return $string_query->result();
    }

    function get_all_students($legajoDocente){
        $string_query = $this->db->query("SELECT * FROM Alumno WHERE legajoAlumno = $legajo");
        return $string_query->result();
    }

    function get_asignaturas($legajoDocente, $idCurso){
        $string_query = $this->db->query("SELECT DISTINCT a.idAsignatura, a.nombre as Asignatura  
                                          FROM AsignaturaPorDocente ad, Asignatura a, HorarioCurso hc
                                          WHERE ad.legajoDocente = $legajoDocente and
                                                ad.idAsignatura = a.idAsignatura and
                                                hc.legajoDocente = ad.legajoDocente and
                                                hc.idCurso = $idCurso and
                                                hc.idAsignatura = ad.idAsignatura");
        return $string_query->result();        
    }

    function get_my_cursos($legajoDocente){
        $string_query = $this->db->query("SELECT DISTINCT  c.idCurso, ne.division, c.seccion, t.nombre, ne.nombre as nivel 
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

    
    function set_calificacion_inicial($legajoDocente, $legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa, $modificacion) {
        $string_query = $this->db->query("INSERT INTO CalificacionEscolar (idCurso, idAsignatura, legajoAlumno, etapa, nroCalificacion, calificacion, modificacion)
                                          VALUES ($idCurso, $idAsignatura, $legajoAlumno, '$etapa', 1, '$calificacion', '$modificacion')");
    }
    
    function update_calificacion_inicial($legajoDocente, $legajoAlumno, $idAsignatura, $calificacion, $idCurso, $etapa, $modificacion){
        $string_query = $this->db->query("UPDATE CalificacionEscolar 
                                          SET  idCurso =$idCurso, idAsignatura = $idAsignatura, legajoAlumno=$legajoAlumno, etapa='$etapa', nroCalificacion=1,calificacion='$calificacion', modificacion = '$modificacion' 
                                          WHERE idCurso = $idCurso and idAsignatura = $idAsignatura and legajoAlumno=$legajoAlumno and etapa = '$etapa' and nroCalificacion =1");
    }

    function get_calificacion_primaria($idCurso, $idAsignatura, $etapa){
        $string_query = $this->db->query("SELECT  DISTINCT alu.legajoAlumno, ce.nroCalificacion , ce.etapa,  ce.motivo, ce.calificacion, ce.modificacion
                                          FROM Alumno alu , CalificacionEscolar ce, Asignatura a, Curso c, HorarioCurso hc, Inscripcion i
                                          WHERE c.idCurso = hc.idCurso and
                                                a.idAsignatura = hc.idAsignatura and
                                                alu.legajoAlumno = ce.legajoAlumno and
                                                a.idAsignatura = ce.idAsignatura and
                                                alu.legajoAlumno=i.legajoAlumno and
                                                c.idCurso = i.idCurso and
                                                c.idCurso = $idCurso and
                                                ce.etapa= '$etapa' and
                                                a.idAsignatura = $idAsignatura");
        return $string_query->result();
    }

    function insert_calificacion_primaria($string_insert){
        $string_query = $this->db->query("INSERT INTO CalificacionEscolar (idCurso, idAsignatura, legajoAlumno, etapa, nroCalificacion, motivo, calificacion)
                                          VALUES $string_insert");
    }

    function update_calificacion_primaria($idCurso, $idAsignatura, $legajoAlumno, $etapa, $nroCalificacion, $motivo, $calificacion){
        $string_query = $this->db->query("UPDATE CalificacionEscolar 
                                          SET  idCurso =$idCurso, idAsignatura = $idAsignatura, legajoAlumno=$legajoAlumno, etapa='$etapa', nroCalificacion=$nroCalificacion, motivo='$motivo', calificacion='$calificacion' 
                                          WHERE idCurso = $idCurso and idAsignatura = $idAsignatura and legajoAlumno=$legajoAlumno and etapa = '$etapa' and nroCalificacion =$nroCalificacion");        
    }

    function delete_calificacion_primaria($idCurso, $idAsignatura, $legajoAlumno, $etapa, $nroCalificacion, $motivo, $calificacion){
        $string_query = $this->db->query("DELETE FROM CalificacionEscolar
                                          WHERE idCurso = $idCurso and
                                                idAsignatura= $idAsignatura and
                                                legajoAlumno = $legajoAlumno and
                                                etapa = '$etapa' and
                                                nroCalificacion = $nroCalificacion");
    }

    function actualizarUltimaModificacion($idCurso,$idAsignatura,$etapa,$modificacion){
        $string_query = $this->db->query("UPDATE CalificacionEscolar
                                          SET modificacion = '$modificacion'
                                          WHERE idCurso = $idCurso and idAsignatura = $idAsignatura and etapa = '$etapa'");
    }

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }
}
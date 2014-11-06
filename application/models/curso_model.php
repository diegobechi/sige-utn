<?php

class Curso_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_students($idCurso){
      $string_query = $this->db->query("SELECT  alu.legajoAlumno, alu.apellido, alu.nombre
                                        FROM Alumno alu, Curso c, Inscripcion i
                                        WHERE i.idCurso = c.idCurso and
                                        i.legajoAlumno = alu.legajoAlumno  and
                                        c.idCurso = $idCurso                                                  
                                        GROUP BY alu.legajoAlumno, alu.apellido, alu.nombre
                                        ORDER BY alu.apellido ASC");
      return $string_query->result();
    }

    function get_all_asignaturas($idCurso, $año){
      $string_query = $this->db->query("SELECT DISTINCT a.nombre as Asignaturas
                                        FROM Docente d, AsignaturaPorDocente ad, Asignatura a, NivelEducativo ne, Curso c, Turno t
                                        WHERE d.legajoDocente = ad.legajoDocente and 
                                          a.idAsignatura = ad.idAsignatura and
                                          ne.idNivelEducativo = a.idNivelEducativo and
                                          ne.idNivelEducativo = c.idNivelEducativo and
                                          c.idTurno = t.idTurno and
                                          c.idCurso = $idCurso and
                                          c.cicloLectivo= $año
                                          order by a.nombre;");
      return $string_query->result();  
    }

    function get_asistencia_curso($idCurso, $año){
      $string_query = $this->db->query("SELECT alu.legajoAlumno, alu.apellido, alu.nombre, sum(aa.presente) as 'Cantidad de Inasistencias'
                                        FROM Alumno alu, AsistenciaAlumno aa, Inscripcion i, Curso c
                                        WHERE alu.legajoAlumno = aa.legajoAlumno and 
                                           alu.legajoAlumno = i.legajoAlumno and
                                           c.idCurso = i.idCurso and
                                           c.idCurso = $idCurso and
                                           c.cicloLectivo = $año
                                        GROUP BY alu.legajoAlumno, alu.apellido, alu.nombre");
      return $string_query->result();
    }

    /* START COMUNICADOS WEB*/
    function set_comunicado($idCurso, $legajoDocente, $fecha, $comunicado){
      $string_query = $this->db->query("INSERT INTO ComunicadoWeb(idCurso, legajoDocente, fecha, comunicado) VALUES ($idCurso, $legajoDocente, $fecha, ' $comunicado ')");
    }
 
    function get_comunicado($idCurso, $startDate, $endDate){
      $consulta = "SELECT CONVERT (char(10),cw.fecha, 103) as fecha,cw.comunicado, d.apellido, d.nombre
                                        FROM ComunicadoWeb cw, Docente d, Curso c
                                        WHERE cw.legajoDocente = d.legajoDocente and
                                            cw.idCurso = c.idCurso and
                                            cw.fecha between ' $startDate ' and  ' $endDate ' and
                                            c.idCurso = $idCurso";
      $string_query = $this->db->query($consulta);
      return $string_query->result();
    }

    function update_comunicado($idComunicado){
      $string_query = $this->db->query("UPDATE ComunicadoWeb SET comunicado = $comunicado WHERE idComunicado = $idComunicado");
    }
    /* END COMUNICADOS WEB*/

    /* START TEMARIO DICTADO*/
    function set_temario_dictado($idCurso, $idAsignatura, $fecha, $temasClase, $legajoDocente){      
      $string_query = $this->db->query("INSERT INTO TemarioDictado(idCurso, idAsignatura, fecha, temasClase, legajoDocente) 
                                        VALUES ($idCurso, $idAsignatura, $fecha, ' $temasClase ', $legajoDocente)");
      return $string_query;

    }
    function get_temario_dictado($idCurso, $idAsignatura){
      $string_query = $this->db->query("SELECT CONVERT(VARCHAR(11),tm.fecha, 106) as 'fechaPublicacion'  , tm.temasClase , d.apellido , d.nombre
                                        FROM TemarioDictado tm, Docente d , Asignatura a
                                        WHERE tm.legajoDocente = d.legajoDocente and
                                              tm.idAsignatura = a.idAsignatura and
                                              tm.idCurso = $idCurso and
                                              a.idAsignatura = $idAsignatura;");
      return $string_query->result();
    }
    function update_temario_dictado($idCurso, $idAsignatura, $temasDictado){
      $string_query = $this->db->query("UPDATE TemarioDictado SET temasDictado = $temasDictado WHERE idCurso = $idCurso and 
                                        idAsignatura = $idAsignatura");
    }
    /* END TEMARIO DICTADO*/

    function get_programa($idCurso, $idAsignatura){
      $string_query = $this->db->query("SELECT a.programa 
                                        FROM Curso c , NivelEducativo ne, Asignatura a
                                        WHERE c.idNivelEducativo = ne.idNivelEducativo and
                                              ne.idNivelEducativo = a.idNivelEducativo and
                                              c.cicloLectivo = 2014 and
                                              c.idCurso= $idCurso  and
                                              a.idAsignatura= $idAsignatura");
      return $string_query->result();
    }

    function getDocentes($idCurso){
      $string_query = $this->db->query("SELECT DISTINCT d.apellido, d.nombre, a.nombre as 'asignatura' 
                                        FROM HorarioCurso hc, Docente d, Curso c, Asignatura a, Turno t
                                        WHERE hc.legajoDocente = d.legajoDocente and
                                           hc.idCurso = c.idCurso and
                                           hc.idAsignatura = a.idAsignatura and
                                           c.idTurno = t.idTurno and 
                                           c.idCurso = $idCurso");
      return $string_query->result();
    }

    function getHorarios($idCurso){
      $string_query = $this->db->query("SELECT hc.diaSemana, hc.horaInicio, hc.horaFin , a.nombre FROM HorarioCurso hc,Asignatura a  WHERE hc.idCurso = $idCurso and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Lunes'
                                        UNION
                                        SELECT hc.diaSemana,hc.horaInicio, hc.horaFin ,  a.nombre FROM HorarioCurso hc,Asignatura a  WHERE hc.idCurso = $idCurso and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Martes'
                                        UNION
                                        SELECT hc.diaSemana,hc.horaInicio, hc.horaFin ,  a.nombre FROM HorarioCurso hc,Asignatura a  WHERE hc.idCurso = $idCurso and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Miércoles'
                                        UNION
                                        SELECT hc.diaSemana,hc.horaInicio, hc.horaFin ,   a.nombre FROM HorarioCurso hc,Asignatura a  WHERE hc.idCurso = $idCurso and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Jueves'
                                        UNION
                                        SELECT hc.diaSemana,hc.horaInicio, hc.horaFin ,   a.nombre FROM HorarioCurso hc,Asignatura a  WHERE hc.idCurso = $idCurso and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Viernes'

                                        ORDER BY diaSemana, horaInicio");
      $query = $string_query->result();
      $query = $this->clear_result($query);
      return $query;
     
    }
    
    function getDatosGeneralesAsignaturas($idCurso,$idAsignatura){
      $string_query = $this->db->query("SELECT hc.diaSemana,  SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8) as 'horaInicio' ,  SUBSTRING(CONVERT(CHAR(38),hc.horaFin,121), 12,8) as 'horaFin', d.apellido, d.nombre,d.correoElectronico, d.curriculumVitae
                                        FROM HorarioCurso hc, Docente d,Curso c, Asignatura a 
                                        WHERE hc.legajoDocente = d.legajoDocente and 
                                           hc.idCurso = c.idCurso and
                                           hc.idAsignatura = a.idAsignatura and
                                           c.idCurso = $idCurso and
                                           a.idAsignatura = $idAsignatura");
      return $string_query->result();
    }

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }

}
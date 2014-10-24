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
                                        GROUP BY alu.legajoAlumno, alu.apellido, alu.nombre");
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
    function set_comunicado($idCurso, $legajoDocente, $comunicado){
      $string_query = $this->db->query("INSERT INTO ComunicadoWeb VALUES(1,$idCurso,$legajoDocente,'04/09/2014',$comunicado)");
    }
    function get_comunicado($idCurso, $startDate, $endDate){
      $string_query = $this->db->query("SELECT * FROM ComunicadoWeb WHERE idCurso = 4 and
                                      convert(varchar, fecha, 103)between '04/09/2014' and '28/08/2014'");
      return $string_query->result();
    }
    function update_comunicado($idComunicado){
      $string_query = $this->db->query("UPDATE ComunicadoWeb SET comunicado = $comunicado WHERE idComunicado = $idComunicado");
    }
    /* END COMUNICADOS WEB*/

    /* START TEMARIO DICTADO*/
    function set_temario_dictado($idCurso, $idAsignatura,$legajoDocente, $temasDictado){
      $string_query = $this->db->query("INSERT INTO TemarioDictado VALUES (idCurso = $idCurso, idAsignatura = $idAsignatura, fecha = $fecha, temasDictado = $temasDictado, legajoDocente = $legajoDocente)");
    }
    function get_temario_dictado($idCurso, $idAsignatura){
      $string_query = $this->db->query("SELECT * FROM TemarioDictado WHERE idCurso = $idCurso and idAsignatura = $idAsignatura and YEAR(fecha) = YEAR(getdate())");
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



    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }

}
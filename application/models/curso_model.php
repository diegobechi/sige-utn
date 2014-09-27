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
      $query = $string_query->result();      
      return $this->clear_result($query);
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

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }

}
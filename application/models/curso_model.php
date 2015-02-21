<?php

class Curso_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }

    function get_curso($legajoAlumno, $año){ 
      $string_query = $this->db->query("SELECT c.idCurso, n.division, c.seccion, t.nombre, n.nombre as nivel
                                        FROM Inscripcion i, Alumno a, Curso c, NivelEducativo n, Turno t
                                        WHERE i.legajoAlumno = a.legajoAlumno and
                                              a.legajoAlumno = $legajoAlumno and
                                              n.idNivelEducativo = c.idNivelEducativo and
                                              c.idTurno = t.idTurno and
                                              i.idCurso = c.idCurso and
                                              YEAR(i.fecha) = $año");
      return $string_query->result();
    }
    
    function get_all_students($idCurso){
      $string_query = $this->db->query("SELECT  alu.legajoAlumno, alu.apellido, alu.nombre, alu.sexo
                                        FROM Alumno alu, Curso c, Inscripcion i
                                        WHERE i.idCurso = c.idCurso and
                                        i.legajoAlumno = alu.legajoAlumno  and
                                        c.idCurso = $idCurso                                                  
                                        GROUP BY alu.legajoAlumno, alu.apellido, alu.nombre, alu.sexo
                                        ORDER BY alu.apellido ASC");
      return $string_query->result();
    }

    function get_all_asignaturas($idCurso, $año){
      $string_query = $this->db->query("SELECT  a.nombre as 'nom_asignatura', hc.diaSemana, SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8) as 'horaInicio' ,  SUBSTRING(CONVERT(CHAR(38),hc.horaFin,121), 12,8) as 'horaFin', d.apellido, d.nombre,d.correoElectronico, d.legajoDocente
                                        FROM HorarioCurso hc, Docente d,Curso c, Asignatura a 
                                        WHERE hc.legajoDocente = d.legajoDocente and 
                                           hc.idCurso = c.idCurso and
                                           hc.idAsignatura = a.idAsignatura and
                                           c.idCurso = $idCurso");
      $query = $string_query->result();
      $query = $this->clear_result($query);
      return $query;  
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

    function get_asistencia_por_fecha($idCurso, $fecha){
      $string_query = $this->db->query("SELECT alu.legajoAlumno, alu.apellido, alu.nombre, CONVERT (char(10),aa.fecha, 103) as fecha, aa.justificacion, aa.presente
                                        FROM Alumno alu, AsistenciaAlumno aa, Inscripcion i, Curso c
                                        WHERE alu.legajoAlumno = aa.legajoAlumno and 
                                           alu.legajoAlumno = i.legajoAlumno and
                                           c.idCurso = i.idCurso and
                                           c.idCurso = $idCurso and
                                           aa.fecha = '$fecha'
                                           GROUP BY  alu.legajoAlumno, alu.apellido, alu.nombre, aa.fecha, aa.justificacion, aa.presente
                                           ORDER BY  alu.apellido asc, alu.nombre asc");
      return $string_query->result();
    }

    function insert_asistencia_por_fecha($string_insert){
      $string_query = $this->db->query("INSERT INTO AsistenciaAlumno (legajoAlumno, fecha, presente, justificacion) 
                                        VALUES $string_insert");
      return $string_query;      
    }

    function update_asistencia_por_fecha($legajoAlumno, $fecha, $presente, $justificacion){
      $string_query = $this->db->query("UPDATE  AsistenciaAlumno
                                        SET legajoAlumno = $legajoAlumno, fecha = '$fecha', presente = $presente, justificacion = '$justificacion' 
                                        WHERE  legajoAlumno = $legajoAlumno and fecha = '$fecha'");      
      return $string_query;
    }

    /* START COMUNICADOS WEB*/
    function set_comunicado($idCurso, $legajoDocente, $fecha, $comunicado){
      $string_query = $this->db->query("INSERT INTO ComunicadoWeb(idCurso, legajoDocente, fecha, comunicado) 
                                        VALUES ($idCurso, $legajoDocente, '$fecha', '$comunicado')");
      return $string_query;
    }
 
    function get_comunicado($idCurso, $startDate, $endDate){
      $consulta = "SELECT CONVERT(CHAR(12),cw.fecha,111) as fecha,cw.comunicado, d.apellido, d.nombre, cw.idComunicadoWeb
                  FROM ComunicadoWeb cw, Docente d, Curso c
                  WHERE cw.legajoDocente = d.legajoDocente and
                      cw.idCurso = c.idCurso and
                      (cw.fecha between '$startDate' and '$endDate' )and
                      c.idCurso = $idCurso
                  ORDER BY cw.fecha DESC";
      $string_query = $this->db->query($consulta);
      return $string_query->result();
    }

    function update_comunicado($idComunicadoWeb, $textoComunicado, $date, $legajoDocente){
      $string_query = $this->db->query("UPDATE ComunicadoWeb  
                                        SET legajoDocente = $legajoDocente, fecha = '$date', comunicado = '$textoComunicado'
                                        WHERE idComunicadoWeb = $idComunicadoWeb");

      return $string_query;
    }
    /* END COMUNICADOS WEB*/

    /* START TEMARIO DICTADO*/
    function set_temario_dictado($idCurso, $idAsignatura, $fecha, $temasClase, $legajoDocente){ 
      $string_query = $this->db->query("INSERT INTO TemarioDictado (idCurso, idAsignatura, fecha, temasClase, legajoDocente) 
                                        VALUES ($idCurso, $idAsignatura, CONVERT(VARCHAR(12), ' $fecha ', 111), '$temasClase', $legajoDocente)");
      return $string_query;

    }
    function get_temario_dictado($idCurso, $idAsignatura){
      $string_query = $this->db->query("SELECT a.nombre as 'asignatura', CONVERT(VARCHAR(11),tm.fecha, 106) as 'fechaPublicacion'  , tm.temasClase , d.apellido , d.nombre
                                        FROM TemarioDictado tm, Docente d , Asignatura a
                                        WHERE tm.legajoDocente = d.legajoDocente and
                                              tm.idAsignatura = a.idAsignatura and
                                              tm.idCurso = $idCurso and
                                              a.idAsignatura = $idAsignatura;");
      return $string_query->result();
    }
    function update_temario_dictado($idAsignatura, $idCurso, $fecha, $temasClase, $legajoDocente){
      $consulta = "UPDATE  TemarioDictado 
                  SET  temasClase = '$temasClase', legajoDocente = $legajoDocente 
                  WHERE  idcurso = $idCurso  and CONVERT(VARCHAR(11), fecha , 106) = '$fecha' and idAsignatura = $idAsignatura";
      $string_query = $this->db->query($consulta);
      return $string_query;
    }
    /* END TEMARIO DICTADO*/

    function get_programa($idCurso, $idAsignatura){
      $string_query = $this->db->query("SELECT a.programa 
                                        FROM Curso c , NivelEducativo ne, Asignatura a
                                        WHERE c.idNivelEducativo = ne.idNivelEducativo and
                                              ne.idNivelEducativo = a.idNivelEducativo and
                                              c.cicloLectivo = 2015 and
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

    function getNotasPorAsignaturaInicial($idCurso, $idAsignatura, $etapa){
      $string_query = $this->db->query("SELECT  alu.legajoAlumno, alu.apellido, alu.nombre,ce.etapa,  ce.motivo, ce.calificacion, a.idAsignatura, ce.modificacion
                                        FROM Alumno alu , CalificacionEscolar ce, Asignatura a, Curso c, HorarioCurso hc, Inscripcion i
                                        WHERE c.idCurso = hc.idCurso and
                                           a.idAsignatura = hc.idAsignatura and
                                              alu.legajoAlumno = ce.legajoAlumno and
                                              a.idAsignatura = ce.idAsignatura and
                                              alu.legajoAlumno=i.legajoAlumno and
                                              c.idCurso = i.idCurso and
                                              a.idAsignatura = $idAsignatura and
                                              c.idCurso = $idCurso and
                                              ce.etapa= '$etapa'");
      return $string_query->result();
    }

    function clear_result($query){
        for($i = 0; $i< count($query); $i++){
            $array_query[$i] = (array)$query[$i];
        }
        return $array_query;
    }

}


/*devolver los datos de un comunicado web en particular pasado como parametro 

SELECT  cw.idComunicadoWeb,CONVERT (char(10),cw.fecha, 103) as 'fechaComunicado' , cw.comunicado, a.nombre
FROM ComunicadoWeb cw, Curso c, Docente d, Asignatura a, AsignaturaPorDocente ad
WHERE cw.idCurso = c.idCurso and
      cw.legajoDocente = d.legajoDocente and
      d.legajoDocente = ad.legajoDocente and
      a.idAsignatura = ad.idAsignatura and
      d.legajoDocente = $legajoDocente and 
      cw.idComunicadoWeb = $idComunicadoWeb 
      
      
/* devolver un temario dictado seleccionado de una asignatura en un curso determinado 

SELECT CONVERT(VARCHAR(11),td.fecha, 106) as 'fechaPublicacion'  , td.temasClase , d.apellido , d.nombre, a.idAsignatura
FROM TemarioDictado td, Docente d , Asignatura a
WHERE td.legajoDocente = d.legajoDocente and
      td.idAsignatura = a.idAsignatura and
      td.idCurso = $idCurso and 
      a.idAsignatura = $idAsignatura and
      td.fecha = $fecha

/*Borrar un comunicado web especifcado como parametro

DELETE FROM ComunicadoWeb 
 WHERE idComunicadoWeb = $idComunicadoWeb

      */
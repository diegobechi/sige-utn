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
    $string_query = $this->db->query("SELECT a.apellido, a.nombre,a.nroDocumento, a.sexo,CONVERT(VARCHAR(11),a.fechaNacimiento, 106) as 'fechaNacimiento',a.nacionalidad, a.correoElectronico, d.calle,d.numero,d.piso,d.departamento, a.telefonoFijo, a.telefonoMovil,a.lugarNacimiento,a.legajoAlumno, ne.division, e.nombre as 'estado', c.seccion, a.observaciones
                                      FROM Alumno a , Domicilio d, Inscripcion i, Curso c, NivelEducativo ne, Estado e
                                      WHERE  a.idDomicilio = d.idDomicilio and
                                      a.legajoAlumno = i.legajoAlumno and
                                      c.idCurso = i.idCurso and
                                      c.idNivelEducativo = ne.idNivelEducativo and
                                      a.idEstado = e.idEstado and
                                      a.legajoAlumno =$legajoAlumno 
                                      GROUP BY a.apellido, a.nombre, a.nroDocumento, a.sexo,a.fechaNacimiento, a.nacionalidad,a.correoElectronico,d.calle,d.numero,d.piso,d.departamento,a.telefonoFijo,a.telefonoMovil,a.lugarNacimiento, a.legajoAlumno, ne.division, e.nombre,c.seccion, a.observaciones");
    return $string_query->result();        
  }

  function get_tutor($legajoAlumno){
    $string_query = $this->db->query("SELECT DISTINCT t.idTutor, t.apellido, t.nombre, t.nroDocumento, t.sexo,CONVERT (char(10),t.fechaNacimiento, 103) as fechaNacimiento , e.nombre as 'estado', d.calle, d.numero, d.piso,d.departamento ,t.telefonoFijo, t.telefonoMovil, t.correoElectronico
                                      FROM Alumno a, Tutor t, GrupoFamiliar gf, Domicilio d, Estado e
                                      WHERE a.legajoAlumno = gf.legajoAlumno and
                                      t.idTutor = gf.idTutor and
                                      t.idDomicilio = d.idDomicilio and
                                      t.idEstadoCivil = e.idEstado and
                                      a.legajoAlumno= $legajoAlumno");
    return $string_query->result();
  }

  function get_asignaturas($legajoAlumno, $cicloLectivo){
    $string_query = $this->db->query("SELECT DISTINCT a.idAsignatura, a.nombre, a.programa
                                      FROM Asignatura a, Alumno alu, Inscripcion i, Curso c, HorarioCurso hc
                                      WHERE alu.legajoAlumno = i.legajoAlumno and
                                      i.idCurso = c.idCurso and
                                      c.idCurso = hc.idCurso and
                                      a.idAsignatura = hc.idAsignatura  and          
                                      c.cicloLectivo = $cicloLectivo and
                                      alu.legajoAlumno = $legajoAlumno");
    return $string_query->result();
  }

  function get_notas_alumno($legajoAlumno, $cicloLectivo){
    $string_query = $this->db->query("SELECT DISTINCT asi.idAsignatura, asi.nombre as 'Asignatura' , ce.calificacion, ce.modificacion
                                      FROM CalificacionEscolar ce, Inscripcion i, Alumno a, Asignatura asi, CicloLectivo cl, Curso c
                                      WHERE a.legajoAlumno = i.legajoAlumno  and
                                            a.legajoAlumno = ce.legajoAlumno and
                                            asi.idAsignatura = ce.idAsignatura and
                                            i.idCurso = ce.idCurso and
                                            c.cicloLectivo = cl.cicloLectivo and
                                            c.idCurso = i.idCurso and
                                            c.cicloLectivo = $cicloLectivo and
                                            a.legajoAlumno = $legajoAlumno");
    return $string_query->result();
  }

  function get_mis_alumnos_a_cargo($idTutor){
    $tring_query = $this ->db->query("SELECT DISTINCT a.legajoAlumno,a.apellido, a.nombre
                                      FROM Alumno a, Tutor t, GrupoFamiliar gf
                                      WHERE a.legajoAlumno = gf.legajoAlumno and
                                      t.idTutor = gf.idTutor and
                                      t.idTutor = $idTutor;");
  }

  function get_asistencia($legajoAlumno, $año){       
    $string_query = $this->db->query("SELECT a.legajoAlumno, CONVERT(VARCHAR(11), a.fecha, 106) as fecha, a.presente, a.justificacion
                                      FROM AsistenciaAlumno a
                                      WHERE a.legajoAlumno = $legajoAlumno and 
                                            YEAR(a.fecha) = $año and
                                            a.presente = 0");
    $query = $string_query->result();
    return $this->clear_result($query);
  }

  function get_info_asignatura($idCurso, $idAsignatura){
    $string_query = $this->db->query("SELECT a.nombre as 'nom_asignatura', hc.diaSemana, SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8) as 'horaInicio' ,  SUBSTRING(CONVERT(CHAR(38),hc.horaFin,121), 12,8) as 'horaFin', d.apellido, d.nombre,d.correoElectronico, d.legajoDocente
                                      FROM HorarioCurso hc, Docente d,Curso c, Asignatura a 
                                      WHERE hc.legajoDocente = d.legajoDocente and 
                                         hc.idCurso = c.idCurso and
                                         hc.idAsignatura = a.idAsignatura and
                                         c.idCurso = $idCurso and
                                         a.idAsignatura = $idAsignatura");
    $query = $string_query->result();
    $query = $this->clear_result($query);
    return $query;  
  }

  function get_notas_por_materia($legajoAlumno, $idAsignatura, $año){
    $string_query = $this->db->query("SELECT a.nombre,ce.motivo, ce.calificacion,CONVERT(VARCHAR(11), ce.fecha, 106) as fecha 
                                      FROM Curso c, NivelEducativo ne, Alumno alu, Inscripcion i, Asignatura a, CalificacionEscolar ce 
                                      WHERE alu.legajoAlumno= i.legajoAlumno and i.idCurso = c.idCurso and    
                                      c.idNivelEducativo = ne.idNivelEducativo and a.idNivelEducativo = ne.idNivelEducativo and 
                                      ce.idAsignatura = a.idAsignatura and ce.legajoAlumno = alu.legajoAlumno and 
                                      alu.legajoAlumno = $legajoAlumno and YEAR(ce.fecha)= $año and a.idAsignatura = $idAsignatura
                                      GROUP BY a.nombre, ce.fecha, ce.motivo, ce.calificacion");
    return $string_query->result();        
  }

  function get_aportes($legajoAlumno){
    $string_query = $this->db->query( "SELECT DISTINCT mc.nroComprobante,mc.descripcion, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106) as 'fecha'
                                      FROM   MovimientoCaja mc,  CuotaGrupoFamiliar cgf,Tutor t, GrupoFamiliar gf, Alumno a, Cuota c
                                      WHERE  mc.idCuotaGrupoFamiliar = cgf.idCuotaGrupoFamiliar and
                                      cgf.idTutor = t.idTutor and 
                                      gf.idTutor = t.idTutor and
                                      gf.legajoAlumno = a.legajoAlumno and
                                      a.legajoAlumno = $legajoAlumno UNION
                                      SELECT DISTINCT  mc.nroComprobante,mc.descripcion, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106)  
                                      FROM MatriculaAlumno ma, Alumno a, Matricula m,Tutor t, MovimientoCaja mc
                                      WHERE ma.legajoAlumno = a.legajoAlumno and
                                      ma.idMatricula= m.idMatricula and 
                                      mc.idMatriculaAlumno = ma.idMatriculaAlumno and
                                      a.legajoAlumno = $legajoAlumno");
    return $string_query->result();
  }
  function get_sanciones($legajoAlumno){
    $string_query = $this->db->query("SELECT * FROM SancionDisciplinaria WHERE legajoAlumno = $legajoAlumno");
    $query = $string_query->result();
    return $this->clear_result($query);    
  }
  function get_meritos($legajoAlumno){
    $string_query = $this->db->query("");
    return $string_query->result();
  }

  /* START AMB Personas Autorizadas */
  function get_autorizados($idTutor){
    $string_query = $this->db->query("SELECT pa.idTutor, pa.apellido, pa.nombre, pa.nroDocumento, pa.telefono, pa.relacion 
      FROM PersonaAutorizada pa, Tutor t
      WHERE pa.idTutor = t.idTutor and 
      pa.idTutor = $idTutor");
    return $string_query->result();
  }

  function set_autorizados($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion){
    $string_query = $this->db->query("INSERT INTO PersonaAutorizada (idtutor, nombre, apellido, nroDocumento, telefono, relacion)
      VALUES ('$idTutor', '$nombre', '$apellido', '$nroDocumento', '$telefono', '$relacion')");
    return $string_query->result();
  }

  function update_autorizados($idTutor,$nombre,$apellido,$nroDocumento,$telefono,$relacion){
    $string_query = $this->db->query("UPDATE PersonaAutorizada 
      SET idTutor = '$idTutor', nroDocumento = '$nroDocumento', nombre='$nombre', apellido= '$apellido',  telefono = '$telefono', relacion = '$relacion' 
      WHERE idTutor= $idtutor");
    return $string_query->result();
  }

  function delete_autorizados($idTutor,$nroDocumento){
    $string_query = $this->db->query("DELETE FROM PersonaAutorizada WHERE idTutor = $idTutor and nroDocumento = $nroDocumento");
    return $string_query->result();
  }

  /* END AMB Personas Autorizadas */

}
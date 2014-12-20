  
/* Devolver las asignaturas de un alumno que recibo como parametro junto al ciclo lectivo*/

select distinct  a.nombre
from Asignatura a, Alumno alu, Inscripcion i, Curso c, HorarioCurso hc
where alu.legajoAlumno = i.legajoAlumno and
      i.idCurso = c.idCurso and
      c.idCurso = hc.idCurso and
      a.idAsignatura = hc.idAsignatura  and          
      c.cicloLectivo = '2014' and
      alu.legajoAlumno = '100001'
             
       
/* Devolver las notas del alumno de una asignatura en un curso determinado que recibe como parametro */  
    
SELECT a.nombre,ce.motivo, ce.calificacion,ce.etapa
FROM Curso c, NivelEducativo ne, Alumno alu, Inscripcion i, Asignatura a, CalificacionEscolar ce 
WHERE alu.legajoAlumno= i.legajoAlumno and i.idCurso = c.idCurso and    
c.idNivelEducativo = ne.idNivelEducativo and a.idNivelEducativo = ne.idNivelEducativo and 
ce.idAsignatura = a.idAsignatura and ce.legajoAlumno = alu.legajoAlumno and 
alu.legajoAlumno = 100047 and c.idCurso = 9
GROUP BY a.nombre,ce.calificacion,ce.motivo, ce.etapa


/*calificaciones prueba con alumno 100047*/

SELECT ce.nroCalificacion, a.nombre,ce.motivo, ce.calificacion 
FROM Curso c, NivelEducativo ne, Alumno alu, Inscripcion i, Asignatura a, CalificacionEscolar ce 
WHERE alu.legajoAlumno= i.legajoAlumno and i.idCurso = c.idCurso and    
c.idNivelEducativo = ne.idNivelEducativo and a.idNivelEducativo = ne.idNivelEducativo and 
ce.idAsignatura = a.idAsignatura and ce.legajoAlumno = alu.legajoAlumno and 
alu.legajoAlumno = 100047 and c.idCurso = 9
GROUP BY ce.nroCalificacion,a.nombre, ce.calificacion,ce.motivo

/* Devolver las matriculas pagadas  de un alumno */

select distinct  mc.nroComprobante,mc.descripcion, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106)  
from MatriculaAlumno ma, Alumno a, Matricula m,Tutor t, MovimientoCaja mc
where ma.legajoAlumno = a.legajoAlumno and
      ma.idMatricula= m.idMatricula and 
      mc.idMatriculaAlumno = ma.idMatriculaAlumno and
      a.legajoAlumno = 100012
      
/* devolver las cuotas pagas de un alumno */

select distinct mc.nroComprobante,mc.descripcion,cgf.mes, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106) as 'Fecha de pago'
from   MovimientoCaja mc,  CuotaGrupoFamiliar cgf,Tutor t, GrupoFamiliar gf, Alumno a, Cuota c
where  mc.idCuotaGrupoFamiliar = cgf.idCuotaGrupoFamiliar and
       cgf.idTutor = t.idTutor and 
       gf.idTutor = t.idTutor and
       gf.legajoAlumno = a.legajoAlumno and
       a.legajoAlumno = 100012
     
       
/* devolver los mensajes publicados por el docente para el alumno */

select CONVERT (char(10),cw.fecha, 103) as fecha,cw.comunicado
from ComunicadoWeb cw, Docente d, Curso c
where cw.legajoDocente = d.legajoDocente and
	  cw.idCurso = c.idCurso and
	  c.idCurso = 2
	       
	  
/* devolver los datos de un alumno que recibe como parametro el legajo del mismo */

SELECT a.apellido, a.nombre,a.nroDocumento, a.sexo,CONVERT(VARCHAR(11),a.fechaNacimiento, 106) as 'fecha nacimiento',a.nacionalidad, a.correoElectronico, d.calle,d.numero,d.piso,d.departamento, a.telefonoFijo, a.telefonoMovil,a.lugarNacimiento,a.legajoAlumno, ne.division, COUNT(*) as Inasistencias, e.nombre as 'Estado Academico', c.seccion
FROM Alumno a , Domicilio d, Inscripcion i, Curso c, NivelEducativo ne, AsistenciaAlumno aa, Estado e
WHERE  a.idDomicilio = d.idDomicilio and
		a.legajoAlumno = i.legajoAlumno and
		c.idCurso = i.idCurso and
	    c.idNivelEducativo = ne.idNivelEducativo and 
	    a.legajoAlumno = aa.legajoAlumno and 
	    a.idEstado = e.idEstado	and
	    a.legajoAlumno =100012
	    GROUP BY a.apellido, a.nombre, a.nroDocumento, a.sexo,a.fechaNacimiento, a.nacionalidad,a.correoElectronico,d.calle,d.numero,d.piso,d.departamento,a.telefonoFijo,a.telefonoMovil,a.lugarNacimiento, a.legajoAlumno, ne.division, e.nombre, ne.nombre, c.seccion
		
	  
/*devolver los datos academicos del alumno con el legajo como parametro */

select a.legajoAlumno, ne.division, COUNT(*) as Inasistencias, e.nombre as 'Estado Academico'
from Alumno a,Inscripcion i, Curso c, NivelEducativo ne, AsistenciaAlumno aa, Estado e
where a.legajoAlumno = i.legajoAlumno and
	  c.idCurso = i.idCurso and
	  a.legajoAlumno = 100012 and 
	  c.idNivelEducativo = ne.idNivelEducativo and 
	  a.legajoAlumno = aa.legajoAlumno and 
	  a.idEstado = e.idEstado	  
	  group by a.legajoAlumno, ne.division, e.nombre
	  
/*Con el legajo del alumno obtengo datos del tutor */

select t.apellido, t.nombre, t.telefonoMovil, t.correoElectronico, t.ocupacion
from Alumno alu, Tutor t , GrupoFamiliar gf, Domicilio d, Inscripcion i, Curso c, Barrio b
where alu.legajoAlumno = gf.legajoAlumno and
      t.idTutor = gf.idTutor and
      alu.idDomicilio = d.idDomicilio and
      d.idBarrio = b.idBarrio and
      alu.legajoAlumno = i.legajoAlumno and 
      c.idCurso = i.idCurso and   
      alu.legajoAlumno= 100012
      	  
	  	        
/* Devolver los horarios de cursado del alumno pasando el curso como parametro*/

SELECT  SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8) as 'hora inicio', SUBSTRING(CONVERT(CHAR(38),hc.horaFin,121), 12,8) as 'hora fin',hc.diaSemana,a.nombre
FROM HorarioCurso hc, Asignatura a, Inscripcion i, Alumno alu, Curso c
WHERE   hc.idCurso = c.idCurso and
		hc.idAsignatura = a.idAsignatura and
        alu.legajoAlumno = i.legajoAlumno and
        i.idCurso = c.idCurso and
        c.idCurso = 4 
        order by SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8)
        
/*devolver los docentes de un curso pasando como parametro el curso*/ 

SELECT DISTINCT d.apellido, d.nombre, a.nombre as 'asignatura' 
FROM HorarioCurso hc, Docente d, Curso c, Asignatura a, Turno t
WHERE hc.legajoDocente = d.legajoDocente and
	  hc.idCurso = c.idCurso and
	  hc.idAsignatura = a.idAsignatura and
	  c.idTurno = t.idTurno and	
	  c.idCurso = $idCurso  
	       
/* Devolver las cuotas y la matricula paga de un determinado alumno */    

SELECT distinct mc.nroComprobante,mc.descripcion, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106) as 'fecha'
from   MovimientoCaja mc,  CuotaGrupoFamiliar cgf,Tutor t, GrupoFamiliar gf, Alumno a, Cuota c
where  mc.idCuotaGrupoFamiliar = cgf.idCuotaGrupoFamiliar and
       cgf.idTutor = t.idTutor and 
       gf.idTutor = t.idTutor and
       gf.legajoAlumno = a.legajoAlumno and
       a.legajoAlumno = 100012 union 
select distinct  mc.nroComprobante,mc.descripcion, mc.importe,CONVERT(VARCHAR(11), mc.fecha, 106)  
from MatriculaAlumno ma, Alumno a, Matricula m,Tutor t, MovimientoCaja mc
where ma.legajoAlumno = a.legajoAlumno and
      ma.idMatricula= m.idMatricula and 
      mc.idMatriculaAlumno = ma.idMatriculaAlumno and
      a.legajoAlumno = 100012   
       
       
             
/* devolver el horario de un curso  ingresado por parametro*/     
       
select hc.diaSemana,hc.horaInicio, hc.horaFin , a.nombre from HorarioCurso hc,Asignatura a  where hc.idCurso = 1 and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Lunes'
union
select hc.diaSemana,hc.horaInicio, hc.horaFin ,  a.nombre from HorarioCurso hc,Asignatura a  where hc.idCurso = 1 and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Martes'
union
select hc.diaSemana,hc.horaInicio, hc.horaFin ,  a.nombre from HorarioCurso hc,Asignatura a  where hc.idCurso = 1 and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Miercoles'
union
select hc.diaSemana,hc.horaInicio, hc.horaFin ,   a.nombre from HorarioCurso hc,Asignatura a  where hc.idCurso = 1 and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Jueves'
union
select hc.diaSemana,hc.horaInicio, hc.horaFin ,   a.nombre from HorarioCurso hc,Asignatura a  where hc.idCurso = 1 and a.idAsignatura = hc.idAsignatura and hc.diaSemana = 'Viernes'

order by diaSemana, horaInicio


/* devolver los datos de la asignatura por docente pasando por parametro la asignatura, el curso*/

SELECT hc.diaSemana, hc.horaInicio , hc.horaFin , d.apellido, d.nombre
FROM curso c, HorarioCurso hc, Docente d
WHERE hc.idCurso = c.idCurso and 
      hc.legajoDocente = d.legajoDocente and 
      c.idCurso = 1 and 
      idAsignatura = 24;
      
               
      
/* devolver los datos de la persona autorizada a retirar un alumno pasando el id del tutor */

SELECT pa.idTutor, pa.apellido_nombre, pa.nroDocumento, pa.telefono, pa.relacion 
FROM PersonaAutorizada pa, Tutor t
WHERE pa.idTutor = t.idTutor and 
      pa.idTutor = 2

/* insertar los datos de la persona autorizada a retirar un alumno pasando el id del tutor */

/*INSERT INTO PersonaAutorizada (idtutor, nroDocumento, apellido_nombre, telefono, relacion)
VALUES (@idtutor, @nroDocumento, @apellido_nombre, @telefono, @relacion)

/* Actualizar los datos de la persona autorizada a retirar un alumno pasando el id del tutor */

UPDATE PersonaAutorizada SET nroDocumento = @nroDocumento, apellido_nombre= @apellido_nombre, telefono = @telefono, relacion = @relacion, WHERE idTutor= @idtutor"    */


/* devolver el temario dictado de una asignatura paso el curso y la asignatura */
SELECT CONVERT(VARCHAR(11),tm.fecha, 106) as 'fechaPublicacion'  , tm.temasClase , d.apellido , d.nombre
FROM TemarioDictado tm, Docente d , Asignatura a
WHERE tm.legajoDocente = d.legajoDocente and
      tm.idAsignatura = a.idAsignatura and
      tm.idCurso = $idCurso;
      
      
/* devolver el programa de una asignatura */
      
SELECT a.programa 
FROM Curso c , NivelEducativo ne, Asignatura a
WHERE c.idNivelEducativo = ne.idNivelEducativo and
      ne.idNivelEducativo = a.idNivelEducativo and
      c.cicloLectivo = 2014 and
      c.idCurso= 9  and
      a.idAsignatura= 44;
  
/* con el curso y la asignatura como parametro debo traer el horario de la asignatura y el docente que la da*/

SELECT hc.diaSemana,  SUBSTRING(CONVERT(CHAR(38),hc.horaInicio,121), 12,8) as 'horaInicio' ,  SUBSTRING(CONVERT(CHAR(38),hc.horaFin,121), 12,8) as 'horaFin', d.apellido, d.nombre,d.correoElectronico, d.curriculumVitae
FROM HorarioCurso hc, Docente d,Curso c, Asignatura a 
WHERE hc.legajoDocente = d.legajoDocente and 
	  hc.idCurso = c.idCurso and
	  hc.idAsignatura = a.idAsignatura and
	  c.idCurso = 9 and
	  a.idAsignatura = 44
	 	  	  
/* paso un legajo del alumno y me devuelve el id del curso en el cual esta */

select i.idCurso
from Inscripcion i, Alumno a
where i.legajoAlumno = a.legajoAlumno and
      a.legajoAlumno = 100047 and
      YEAR(i.fecha) = 2014;
      

select * from Tutor
   
              
             
              
              
              
select * from Asignatura where idAsignatura = 1 

select * from AsignaturaPorDocente where legajoDocente = 10003

select * from Asignatura where idAsignatura = 44

select * from NivelEducativo where idNivelEducativo = 6

select * from TemarioDictado

delete from TemarioDictado 

select * from ComunicadoWeb

SELECT cw.fecha,cw.comunicado, d.apellido, d.nombre
                                        FROM ComunicadoWeb cw, Docente d, Curso c
                                        WHERE cw.legajoDocente = d.legajoDocente and
                                            cw.idCurso = c.idCurso and
                                            cw.fecha between  2014/11/06 and 2014/11/13 and
                                            c.idCurso = 9
                                            
                                            
                                            select * from curso where idNivelEducativo=  2
                                            
                                            
                                            select * from Curso where idCurso = 2
                                            
                                            
                                            
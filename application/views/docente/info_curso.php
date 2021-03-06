<div class = "contenedor-info container" style = "display:block;"> <div class = "titulo-principal">
	
</div>
<div style ="padding:20px">
	<ul class = "lista-opciones">
		<li data-title="alumnos" class="active"> <img src="../img/white-icons/appbar.people.multiple.png"/>Alumnos</li>
		<li data-title="asignaturas"> <img src="../img/white-icons/appbar.book.list.png"/>Asignaturas</li>
		<li data-title="cargarNotas"> <img src="../img/white-icons/appbar.grade.a.plus.png"/>Cargar Notas</li>
		<li data-title="temario" class="temas_dictados"> <img src="../img/white-icons/appbar.calendar.day.png"/>Temario</li>
		<li data-title="listados" style="display:none;"> <img src="">Listados</li>
		<li data-title="inasistencias" class="menu-inasistencias"> <img src="../img/white-icons/appbar.clipboard.paper.check.png"/>Inasistencias</li>
		<li data-title="mensajes" class="mensajes_enviados"> <img src="../img/white-icons/appbar.chat.png"/>Mensajes</li>
	</ul>
	<div id="fecha_base" style="display:none;"></div>
	<div class="contenedor-principal alumnos">
		<div class ="titulo-principal" style="background-color: rgba(32, 57, 82, 0.75);">
			<span></span>
			<h3> <img src=""> Alumnos </h3>
		</div>
		<ul class ="contenedor-alumnos">
		</ul>
	</div>
	<div class="contenedor-principal asignaturas" style="display:none;">		
		<div class="contenedor-asignaturas">
			<div class="listado-asignaturas">
				<ul style="margin: 0 10px;list-style: none;color: #FFF;">			     			
				</ul>
			</div> 
		</div>
	</div>
	<div class="contenedor-principal cargarNotas" style="display:none;">		
		<div class="contenedor-filtros">
			<select id="filtro_curso" style="display:none;">					
			</select>
			<div style="display: inline-block;margin-left: 75px;">
				<label>Asignatura</label>
				<select id="filtro_asignatura">
				</select>
			</div>
			<div style="display: inline-block;margin-left: 100px;">
				<label>Etapa</label>
				<select id="filtro_etapa">					
				</select>
			</div>			
		</div>
		<div class="grilla-notas" style="display:none;">			
			
			<div>					
				<div id="contenedor-informe-progreso">
					<div id="informe-nivel-primaria" style="float:left;">
						<a id="tabla_referencias" style="float:right;">Referencias							
						</a>
						<div class="tabla-abreviaturas" style="display:none;">
								<table id="abreviaturas">
									<thead>
										<tr>
											<td colspan="2">Abreviaturas</td>						
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>P</td>
											<td>Prueba</td>
										</tr>
										<tr>
											<td>E</td>
											<td>Examén</td>
										</tr>
										<tr>
											<td>EO</td>
											<td>Exposición Oral</td>
										</tr>
										<tr>
											<td>TP</td>
											<td>Trabajo Práctico</td>
										</tr>
										<tr>
											<td>TI</td>
											<td>Trabajo Integrador</td>
										</tr>
										<tr>
											<td>R</td>
											<td>Recuperatorio</td>
										</tr>
										<tr>
											<td>C</td>
											<td>Coloquio</td>
										</tr>
										<tr>
											<td>NC</td>
											<td>Nota de Concepto</td>
										</tr>
										<tr>
											<td>LO</td>
											<td>Lección Oral</td>
										</tr>
									</tbody>
								</table>
							</div>
						<table> Listado de alumnos
							<thead>
								<tr id="cabecera-notas">
									<td>Legajo</td>
									<td>Alumno</td>
									<td data-nroCalificacion="1">
										<select>
											<option>P</option>
											<option>E</option>
											<option>EO</option>
											<option>TP</option>
											<option>TI</option>												
											<option>R</option>
											<option>C</option>
											<option>NC</option>
											<option>LO</option>
										</select>
									</td>
									<td data-nroCalificacion="2">
										<select>
											<option>P</option>
											<option>E</option>
											<option>EO</option>
											<option>TP</option>
											<option>TI</option>												
											<option>R</option>
											<option>C</option>
											<option>NC</option>
											<option>LO</option>
										</select>
									</td>
									<td data-nroCalificacion="3">
										<select>
											<option>P</option>
											<option>E</option>
											<option>EO</option>
											<option>TP</option>
											<option>TI</option>												
											<option>R</option>
											<option>C</option>
											<option>NC</option>
											<option>LO</option>
										</select>
									</td>
									<td data-nroCalificacion="4">
										<select>
											<option>P</option>
											<option>E</option>
											<option>EO</option>
											<option>TP</option>
											<option>TI</option>												
											<option>R</option>
											<option>C</option>
											<option>NC</option>
											<option>LO</option>
										</select>
									</td>
									<td data-nroCalificacion="5">
										<select>
											<option>P</option>
											<option>E</option>
											<option>EO</option>
											<option>TP</option>
											<option>TI</option>												
											<option>R</option>
											<option>C</option>
											<option>NC</option>
											<option>LO</option>
										</select>
									</td>
									<td data-nroCalificacion="10" data-promedio="">
										<input type="text" value="Prom">
									</td>									
								</tr>
							</thead>
							<tbody id="listado-primario-notas">									
							</tbody>
						</table>
						<div>
							<span id="modificacion-primaria"></span>
							<input type="button" class="btn btn-info" id="guardar-notas-primaria" value="Guardar">
						</div>
						<script type="text/javascript">
						$('body').on("mouseover",'#tabla_referencias',function(){
					        $('.tabla-abreviaturas').show();
					    })

					   $('body').on("mouseleave",'#tabla_referencias',function(){
					        $('.tabla-abreviaturas').hide();
					    })
						</script>
					</div>
				</div>
			</div>
			
		</div>
		<div class="inicial-notas" style="display:none;">
			<div id="informe-nivel-inicial">
				<div class="accordion nivel-inicial" id="accordion2">
				</div>
			</div>
		</div>
	</div>
	<div class="contenedor-principal temario" style="display:none;">
		<h4>Temario dictado</h4>
		<div style="text-align: left; width: 100%; height: 70px;">			
			<input id="id-curso-temario" type="text" value="" style="display:none;"/>
			<div style="margin-left:140px;float: left;">
				<label>Asignatura</label>
				<select id="asignaturaTemario">					
				</select>
			</div>
			<div class="input-append date" id="dp1" data-date="" data-date-format="dd-mm-yyyy" style="margin-left: 100px; float: left;">
				<label>Fecha</label>
				<input class="span2" size="16" type="text" value="" readonly="">
				<span class="add-on"><i class="icon-calendar"></i></span>
			</div>
		</div>
		<div style="margin-top: 10px;">
			<label>Escriba a continuacion los temas dictados:</label>
			<textarea id="temaDictado" maxlength="180"></textarea><br>
			<input id="enviarTemario" type="button" class="btn btn-info" value="Enviar" disabled>
			<input id="updateTemario" type="button" class="btn btn-info" value="Update" style="display:none;">
		</div>
		<div>			
			<div id="show-list-items">
			</div>
		</div>
	</div>
	<div class="contenedor-principal inasistencias" style="display:none;">
		<div class="titulo-principal" style="background-color: rgba(32, 57, 82, 0.75);">
			<h3>Listado de Asistencia
				<div class="input-append date" id="dp2" data-date="" data-date-format="dd-mm-yyyy" style="float: right;margin: 7px; margin-right: 30px;">
					<label style="display: inline-block; margin-right: 20px;">Fecha</label>
					<input class="span2" size="16" type="text" value="" readonly="">
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
			</h3>
		</div>
		<div>
			<table>
				<thead>
					<tr>
						<td>Legajo</td>
						<td>Nombre Alumno</td>
						<td>Asistencia</td>
						<td>Justificacion</td>
					</tr>
				</thead>
				<tbody id="listado-asistencia">					
				</tbody>				
			</table>			
		</div>
		<input type="button" class="btn btn-info" value="Guardar" id="guardar-asistencia"/>
	</div>
	<div class="contenedor-principal mensajes" style="display:none;">
		<h4>COMUNICADO WEB</h4>
		<div>
			<div>
				<input id="id-curso-comunicado" type="text" value="" style="display:none;"/>
				<label>Escriba a continuacion el mensaje para los alumnos:</label>
				<textarea id="temaComunicado" maxlength="180"></textarea><br>
				<input id="enviarComunicado" type="button" class="btn btn-info" value="Enviar">
				<input id="updateComunicado" type="button" class="btn btn-info" value="Update" style="display:none;">
			</div>
			<div>
				<div id="show-list-comunicados">
				</div>
			</div>
		</div>			
	</div>
</div>
</div>

<div class="overlay-popup"style = "display:none;"></div>

<div class="perfil-alumno-container" style = "display:none;">
	<div class="popup-header">
		<h2><span id="perfil-nombre-header"></span><span id="perfil-grado-header"></span></h2>
		<div class="close-popup"><img src="../img/close.png"></div>
	</div>
	<div class="popup-body">
		<div class="container-left">
			<img class="profile-picture" src="../img/profile-temp.png">
			<div class="linea-separacion">
				<h4>Tutores</h4>
			</div>
			<img class="tutores-alumno" src="../img/profile-temp.png">
		</div>
		<div class="container-right">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#profile" role="tab" data-toggle="tab">Informacion Personal</a></li>				
				<li><a href="#datostutor" role="tab" data-toggle="tab">Datos del Tutor</a></li>
				<li><a href="#notes" role="tab" data-toggle="tab" style="display:none;">Observaciones</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="profile">
					<label>Legajo</label><input id="perfil-legajo" type="text" readonly><br>
					<label>Nro Documento</label><input id="perfil-dni" type="text" readonly><br>
					<label>Sexo</label><input id="perfil-sexo" type="text" readonly><br>
					<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac" type="text" readonly><br>
					<label>Nacionalidad</label><input id="perfil-nacionalidad" type="text" readonly><br>
					<label>Domicilio</label><input id="perfil-domicilio" type="text" readonly><br>
					<label>Telefono Fijo</label><input id="perfil-tel-fijo" type="text" readonly><br>
					<label>Telefono Movil</label><input id="perfil-tel-movil" type="text" readonly><br>
					<label>Lugar de Nacimiento</label><input id="perfil-lugar-nac" type="text" readonly><br>
					<label>Estado Civil</label><input id="perfil-estado-civil" type="text" readonly><br>
				</div>
				<div class="tab-pane" id="datostutor">
					<div class="datos-tutor">
						<label>Nombre y Apellido</label><input id="perfil-nombre-t" type="text" readonly><br>
						<label>Nro Documento</label><input id="perfil-dni-t" type="text" readonly><br>
						<label>Sexo</label><input id="perfil-sexo-t" type="text" readonly><br>
						<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac-t" type="text" readonly><br>
						<label>Estado Civil</label><input id="perfil-estado-civil-t" type="text" readonly><br>
						<label>Domicilio</label><input id="perfil-domicilio-t" type="text" readonly><br>
						<label>Telefono Fijo</label><input id="perfil-tel-fijo-t" type="text" readonly><br>
						<label>Telefono Movil</label><input id="perfil-tel-movil-t" type="text" readonly><br>
						<label>Correo Electronico</label><input id="perfil-mail-t" type="text" readonly><br>
					</div>
				</div>
				<div class="tab-pane" id="notes">
					<div id="perfil-observaciones"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
#informe-nivel-primaria,
#informe-nivel-inicial{
	width: 80%;
	margin: 0 auto;
	padding: 40px;
	margin: 40px;
	margin-top: 20px;
	background-color: #FFF;
	border: 1px solid #CCC;
}

#informe-nivel-primaria input,
#informe-nivel-primaria select{
	width: 57px;
	margin: 0;
	border: none;
}

#informe-nivel-primaria td{
	border: 1px solid #DDD;
}

.contenedor-filtros h3{
	width: 120px;
	display: inline-block;
}

.contenedor-filtros{

}
.foto-tutor{
	width: 120px;
	margin: 15px;
	float: left;
}

.linea-separacion{
	border-top: 1px dashed #999;
	margin-top: 20px;
}
</style>
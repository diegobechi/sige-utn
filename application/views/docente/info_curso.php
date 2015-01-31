
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<input type="button" value="Regresar" id="back-button">
<div class = "contenedor-info" style = "display:block;"> <div class = "titulo-principal">
	<span></span>
	<h1 id="informacion-num-curso"><img src="img/curso.png"> INFORMACION DEL CURSO - </h1>
</div>
<div style ="padding:20px">
	<ul class = "lista-opciones">
		<li data-title="alumnos"> <img src="img/alumno.png"/>Alumnos</li>
		<li data-title="asignaturas"> <img src="img/materia.png"/>Asignaturas</li>
		<li data-title="cargarNotas"> <img src="img/cargarnotas.png"/>Cargar Notas</li>
		<li data-title="temario"> <img src="img/temario.png"/>Temario</li>
		<li data-title="listados" style="display:none;"> <img src="img/listados.png"/>Listados</li>
		<li data-title="inasistencias"> <img src="img/inasistencias.png"/>Inasistencias</li>
		<li data-title="mensajes"> <img src="img/mensajes.png"/>Mensajes</li>
	</ul>
	<div class="contenedor-principal alumnos">
		<div class ="titulo-principal">
			<span></span>
			<h3> <img src="img/person.png"> Alumnos </h3>
		</div>
		<ul class ="contenedor-alumnos">
		</ul>
	</div>
	<div class="contenedor-principal asignaturas" style="display:none;">
		<div class="titulo-principal">
			<h1> <img src="img/book_1.png">  Asignaturas 
				<select>
				</select>
			</h1>
		</div>
		<div class="contenedor-asignaturas">
			<div class="listado-asignaturas">
				<ul style="margin: 10px;">			     			
				</ul>
			</div> 
		</div>
	</div>
	<div class="contenedor-principal cargarNotas" style="display:none;">
		<div class="contenedor-filtros">
			<!--<h3>Curso:</h3>-->
			<select id="filtro_curso" style="display:none;">					
			</select>
			<h3>Asignatura</h3>
			<select id="filtro_asignatura">
			</select>
			<h3>Etapa</h3>
			<select id="filtro_etapa">					
			</select>

			<table>
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
		<div class="grilla-notas" style="display:none;">
			<div>					
				<div id="contenedor-informe-progreso">
					<div id="informe-nivel-primaria">
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
									<td data-nroCalificacion="6">
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
									<td data-nroCalificacion="7">
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
									<td data-nroCalificacion="8">
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
									<td data-nroCalificacion="9">
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
									<td data-nroCalificacion="10">
										<label>Prom</label>
									</td>
								</tr>
							</thead>
							<tbody id="listado-primario-notas">									
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div>
				<span id="modificacion-primaria"></span>
				<input type="button" id="guardar-notas-primaria" value="Guardar">
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
		<div>
			<input id="id-curso-temario" type="text" value="" style="display:none;"/>
			<select id="asignaturaTemario">					
			</select>
		</div>
		<div style="margin-top: 30px;">
			<label>Escriba a continuacion el mensaje:</label>
			<textarea id="temaDictado"></textarea>
			<input id="enviarTemario" type="button" value="Enviar">
			<input id="updateTemario" type="button" value="Update" style="display:none;">
		</div>
		<div>			
			<div id="show-list-items">
			</div>
		</div>
	</div>
	<div class="contenedor-principal listados" style="display:none;">
		<div class = "titulo-principal">
			<span></span>
			<h1><img src="img/book_1.png"> Listados</h1> 
		</div>

		<div class = "contenedor-de-listados">
			<ul>
				<li class = "box-listado">
					<a id="curso" href="#" class="box-alumno">
						<div>
							<img src="img/listado.png">
							<h6> Listado de Alumnos</h6>
						</div>
					</a>
				</li>
				<li class = "box-listado">
					<a id="curso" href="#" class="box-alumno">
						<div>
							<img src="img/listado.png">
							<h6> Inasistencias por fecha</h6>
						</div>
					</a>
				</li>
				<li class = "box-listado">
					<a id="curso" href="#" class="box-alumno">
						<div>
							<img src="img/listado.png">
							<h6> Licencias otorgadas</h6>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="contenedor-principal inasistencias" style="display:none;">
		<h4>Listado de Asistencia</h4>
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
				<input type="button" value="Guardar" id="guardar-asistencia"/>
			</table>
		</div>
	</div>
	<div class="contenedor-principal mensajes" style="display:none;">
		<h4>MENSAJES</h4>
		<div>
			<div>
				<input id="id-curso-comunicado" type="text" value="" style="display:none;"/>
				<label>Escriba a continuacion el mensaje:</label>
				<textarea id="temaComunicado"></textarea>
				<input id="enviarComunicado" type="button" value="Enviar">
				<input id="updateComunicado" type="button" value="Update" style="display:none;">
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
				<li><a href="#notes" role="tab" data-toggle="tab">Observaciones</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="profile">
					<label>Legajo</label><input id="perfil-legajo" type="text" value="2134121231"><br>
					<label>Nro Documento</label><input id="perfil-dni" type="text"><br>
					<label>Sexo</label><input id="perfil-sexo" type="text"><br>
					<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac" type="text"><br>
					<label>Nacionalidad</label><input id="perfil-nacionalidad" type="text"><br>
					<label>Domicilio</label><input id="perfil-domicilio" type="text"><br>
					<label>Telefono Fijo</label><input id="perfil-tel-fijo" type="text"><br>
					<label>Telefono Movil</label><input id="perfil-tel-movil" type="text"><br>
					<label>Lugar de Nacimiento</label><input id="perfil-lugar-nac" type="text"><br>
					<label>Estado Civil</label><input id="perfil-estado-civil" type="text"><br>
				</div>
				<div class="tab-pane" id="datostutor">
					<div class="datos-tutor">
						<label>Nro Documento</label><input id="perfil-dni-t" type="text"><br>
						<label>Sexo</label><input id="perfil-sexo-t" type="text"><br>
						<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac-t" type="text"><br>
						<label>Estado Civil</label><input id="perfil-estado-civil-t" type="text"><br>
						<label>Domicilio</label><input id="perfil-domicilio-t" type="text"><br>
						<label>Telefono Fijo</label><input id="perfil-tel-fijo-t" type="text"><br>
						<label>Telefono Movil</label><input id="perfil-tel-movil-t" type="text"><br>
						<label>Correo Electronico</label><input id="perfil-mail-t" type="text"><br>
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
	background-color: #FFF;
	border: 1px solid #CCC;
}

#informe-nivel-primaria input,
#informe-nivel-primaria select{
	width: 60px;
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
	margin: 40px !important;
	padding: 40px;
	width: 80%;
	background-color: #fff;
	margin: auto;
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
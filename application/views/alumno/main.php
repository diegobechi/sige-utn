<ul class="nav nav-tabs">
	<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
	<li><a id="misAsignaturas" href="#tab_b" data-toggle="tab">MIS ASIGNATURAS</a></li>
	<li><a id="misAportes" href="#tab_c" data-toggle="tab">MIS APORTES</a></li>
	<li><a id="misDatos"href="#tab_d" data-toggle="tab">MIS DATOS</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade active in" id="tab_a">
		<h4>Welcome NOMBRE ALUMNO</h4>
		<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
			ac turpis egestas.</p>
		</div>
		<div class="tab-pane fade" id="tab_b">
			<div id="asignatura-info-container">
			</div>
			<div id="selector-asignatura">
				<h4>Seleccione una Asignatura</h4>
				<div id="selectorBtnAsignatura">
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_c">
			<div id="aportes-info-container">
				<table >
					<thead>
					</thead>
					<tbody class="aportes-alumno">

					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_d">
			<div class="pestana-datos-alumno">
				<div class="box-generic personales">
					<h3>Datos personales</h3>
					<div>
						<label>Nombre y Apellido</label><input id="perfil-nombre-completo" type="text"><br>
						<label>Nro Documento</label><input id="perfil-dni" type="text"><br>
						<label>Sexo</label><input id="perfil-sexo" type="text"><br>
						<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac" type="text"><br>
						<label>Nacionalidad</label><input id="perfil-nacionalidad" type="text"><br>
						<label>Domicilio</label><input id="perfil-domicilio" type="text"><br>
						<label>Telefono Fijo</label><input id="perfil-tel-fijo" type="text"><br>
						<label>Telefono Movil</label><input id="perfil-tel-movil" type="text"><br>
						<label>Mail</label><input id="perfil-mail" type="text"><br>
						<label>Lugar de Nacimiento</label><input id="perfil-lugar-nac" type="text"><br>
					</div>
				</div>
				
				<div class="box-generic academicos">
					<h3>Datos academicos generales</h3>
					<label>Legajo</label><input id="perfil-legajo" type="text"><br>
					<label>Curso</label><input id="perfil-curso"type="text"><br>
					<label>Inasistencias</label><input id="perfil-inasistencias"type="text"><br>
					<label>Promedio general</label><input id="perfil-promedio"type="text"><br>
					<label>Estado Academico</label><input id="perfil-estado"type="text"><br>
				</div>

				<div class="box-generic academicos">
					<h3>Acciones</h3>
					<input id="misTutores" type="button" value="Ver Tutores">
					<input id="misHorarios" type="button" value="Mis Horarios">					
					<input id="misDocentes" type="button" value="Mis Docentes">
				</div>
				<div class="overlay-popup"style = "display:none;"></div>
				<div class="perfil-tutor-container" style = "display:none;">
					<div class="popup-header">
						<h2><span id="perfil-nombre-header"></span><span id="perfil-grado-header"></span></h2>
						<div class="close-popup"><img src="img/close.png"></div>
					</div>
					<div class="popup-body">
						<div class="container-left">
							<img class="profile-picture" src="img/profile-temp.png">
						</div>
						<div class="container-right">
							<ul class="nav nav-tabs" role="tablist">
							  <li class="active"><a href="#profile" role="tab" data-toggle="tab">Informacion Personal</a></li>
							</ul>
							<div class="tab-content">
							  <div class="tab-pane active" id="profile">							  	
							  	<label>Nro Documento</label><input id="tutor-dni" type="text"><br>
							  	<label>Sexo</label><input id="tutor-sexo" type="text"><br>
							  	<label>Fecha de Nacimiento</label><input id="tutor-fecha-nac" type="text"><br>
							  	<label>Estado Civil</label><input id="tutor-estado-civil" type="text"><br>							  	
							  	<label>Domicilio</label><input id="tutor-domicilio" type="text"><br>							  	
							  	<label>Telefono Fijo</label><input id="tutor-tel-fijo" type="text"><br>
							  	<label>Telefono Movil</label><input id="tutor-tel-movil" type="text"><br>
							  	<label>Correo Electronico</label><input id="tutor-mail" type="text"><br>
							  	
							  </div>
							</div>
						</div>
					</div>
				</div>
				<div id="conte-listado-horarios" style="display:none;">
					<div>
						<h3>Mis Horarios</h3>
						<div id="listadoHorarios">
							<table id="tablaHorarios">
								<thead>
									<tr>
										<td>Lunes</td>
										<td>Martes</td>
										<td>Miercoles</td>
										<td>Jueves</td>
										<td>Viernes</td>
									</tr>
								</thead>
								<tbody class="cuerpo-tabla-horarios">
								</tbody>
							</table>
							<div class="footer-horarios">
								<div>
									<img src="img/Colegio/0. Escudo.jpg">
									<label>Instituto Santa Teresita</label>
								</div>
								<div>
									<span>Telefono: 0351-153240621</span>
									<span>Mail: santateresita@gmail.com</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="conte-listado-docentes" style="display:none;">
					<div>
						<h3>Mis Docentes</h3>
						<div id="listadoDocentes"></div>
					</div>
				</div>
			</div>
		</div><!-- tab content -->
	</div>
	<div id="page-wrap" class="vertical">
		<div id="lista-mensajes">
			<h3>Mensajes <span id= 'cantMensajes'></span> </h3>
		</div>
	</div>

	<style>

	.cuerpo-tabla-horarios{
		background-color: white;
		position: absolute;
		z-index: 99;
		left: 0;
		right: 0;
		width: 80%;
		margin: 0 auto;
	}

	.cuerpo-tabla-horarios td,
	.cuerpo-tabla-horarios tr {
		border: 1px solid;
	}

	.cuerpo-tabla-horarios td{
		padding: 10px;
		text-align: center;
	}

	#listadoDocentes{
		width: 80%;
		z-index: 999999;
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		background: aliceblue;
	}

	.pestana-datos-alumno label{
		display: inline-block;
		width: 150px;
	}

	.box-generic.personales{
		float: left;
		width: 450px;
	}
	.box-generic.academicos{
		float: right;
		width: 450px;
	}

	.box-generic{
		background-color: #FFFFFF;
		margin-bottom: 25px;
		border: 1px solid rgba(221,221,221,0.5);
	}
	.box-generic h3{
		margin: 0px;
		padding: 10px 20px;
		font-size: 20px;
		line-height: 20px;
		background-color: #efefef;
		color: #62687e;
		border-bottom: 1px solid rgba(221,221,221,0.5);
	}

	#lista-mensajes{
		display: block;
		position: relative;
		margin: 40px 0;
	}

	#lista-mensajes h3{
		font: bold 12px Sans-Serif;
		letter-spacing: 2px;
		text-transform: uppercase;
		background: #369;
		color: #fff;
		padding: 5px 10px;
		margin:0;
		line-height: 24px;
	}
	#lista-mensajes div {
		background-color:#fff;
		padding: 10px;
	}
	#page-wrap { 
		width: 600px;
		right: 0px;
		top: 10%;
		position: fixed;
	}

	#page-wrap.vertical{
		right: -600px;
	}

	.vertical #lista-mensajes h3 {
		position: absolute;
		top: 0;
		left: 0;
		-webkit-transform-origin: 0 0;
		-moz-transform-origin: 0 0;
		-ms-transform-origin: 0 0;
		-o-transform-origin: 0 0;
		-webkit-transform: rotate(90deg);
		-moz-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		-o-transform: rotate(90deg);
	}

	</style>


	<style>
	.box-curso-generic{
		background-color: aquamarine;
		width: 150px;
		text-align: center;
		display: inline-block;
		height: 150px;
		margin: 20px;
	}

	</style>
</div>

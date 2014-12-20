<label class="label-menu-superior-general">INSTITUTO SANTA TERESITA</label>
<ul class="nav nav-tabs"  style="background-color: #000;">		
	<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
	<li><a id="misCursos" href="#tab_b" data-toggle="tab">MIS CURSOS</a></li>
	<li><a href="#tab_c" data-toggle="tab">MENSAJES</a></li>
	<li><a href="#tab_d" data-toggle="tab">MIS DATOS</a></li>
	<li><a href="#tab_e" data-toggle="tab">TEMARIO</a></li>
	<li><a href="#tab_f" data-toggle="tab">CARGAR NOTAS</a></li>
	<li><a href="c_home/logout">Logout</a></li>
</ul>
<div class="tab-content">
	
		<div class="tab-pane fade active in" id="tab_a">
			<div class="contenedor-pestana-general">
				<div class="box-generic">
					<h3>Welcome NOMBRE DOCENTE</h3>
					<img class="img-cover"src="img/smart-teacher.jpg">
				</div>
			</div>			
		</div>
		<div class="tab-pane fade" id="tab_b">			
			<div id="curso-info-container">

			</div>
			<div id="selector-curso" class="box-generic">
				<h3>Seleccione un curso</h3>
				<div id="selectorBtnCurso">
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_c">
			<h4>MENSAJES</h4>
			<div>
				<div>			
					<div class="left-panel">
						<div id="legajo" style="display:none">10003</div>
						<div>
							<select id="cursoComunicado" class="">
								<option data-cursoid="9"> 3 grado</option>
								<option data-cursoid="1"> 1 grado</option>
								<option></option>
							</select>
						</div>
						<input id="fechaComunicado" type="text" value="14-12-2014">
						<div style="margin-top: 30px;">
							<label>Escriba a continuacion el mensaje:</label>
							<textarea id="temaComunicado"></textarea>
							<input id="enviarComunicado" type="button" value="Enviar">
						</div>
					</div>
					<div class="right-panel">
						<input id="updateComunicado" type="button" value="Update Comunicados">
						<div id="show-list-comunicados">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_d">
			<div class="contenedor-pestana-general">
					<div class="pestana-datos-docente">
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
							<label>Cursos</label><input id="perfil-curso"type="text"><br>

						</div>

						<div class="box-generic acciones">
							<h3>Acciones</h3>
							<div class="botones-datos-personales">
								<input id="misTutores" type="button" value="Cargar CV">
								<input id="misHorarios" type="button" value="Mis Cursos">
							</div>
						</div>						
					</div>
				</div>
				<h4>CURRICULUM</h4>
				<div>
					<input type="button" value="Cargar CV">
					<div>PANEL PARA PREVISUALIZAR EL CV EN PDF
						<div>
							<iframe src="http://red.ilce.edu.mx/sitios/micrositios/cortazar_aniv/pdf/8_Cielo_Rayuela_libro.pdf" style="width:600px; height:500px;" frameborder="0"></iframe>						
						</div>
					</div>
				</div>			
		</div>
		<div class="tab-pane fade" id="tab_e">
			<style>
				.right-panel,
				.left-panel {
					width: 48%;
					border: 1px solid #000;			
					padding: 10px;
					background-color: #FFF;
				}
				.right-panel{
					float: right;
				}
				.left-panel{
					float: left;
				}
				.separate-line{
					border-top: 1px dashed #000;
					margin: 10px 0;
				}
			</style>
			<div>			
				<div class="left-panel">
					<div id="legajoDocente" style="display:none">10003</div>
					<div>
						<select id="cursoTemario" class="">
							<option data-cursoid="9"> 3 grado</option>
							<option data-cursoid="1"> 1 grado</option>
							<option></option>
						</select>
						<select id="asignaturaTemario" class="">
							<option data-asignaturaid="44">Matematica</option>
							<option></option>
							<option></option>
						</select>
					</div>
					<input id="fechaDictado" type="text" value="14-12-2014">
					<div style="margin-top: 30px;">
						<label>Escriba a continuacion el mensaje:</label>
						<textarea id="temaDisctado"></textarea>
						<input id="enviarTemario" type="button" value="Enviar">
					</div>
				</div>
				<div class="right-panel">
					<input id="updateTemario" type="button" value="Update Temario">
					<div id="show-list-items">
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_f">
			<div class="box-generic">
				<h3>CARGAR NOTAS</h3>
				<div>Carga de notas planilla</div>
			</div>
		</div>
</div><!-- tab content -->

<style>
.contenedor-pestañas{
	width: 80%;
	margin: 0 auto;
}
.img-cover{
	width: 100%;
	height: auto;
}
.box-curso-generic{
	background-color: aquamarine;
	width: 150px;
	text-align: center;
	display: inline-block;
	height: 150px;
	margin: 20px;
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
</style>



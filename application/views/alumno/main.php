<script type="text/javascript" src="../js/alumno.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style1.css">
<div class="header-menu">
	<img class="icono-escudo" src="../img/Colegio/0. Escudo.png">
	<label class="label-menu-superior-general">Instituto <br>Santa Teresita</label>
	<ul class="nav nav-tabs" style="background-color: #000;">	
		<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
		<li><a id="misAsignaturas" href="#tab_b" data-toggle="tab">MI CURSO</a></li>
		<li><a id="misAportes" href="#tab_c" data-toggle="tab">MIS APORTES</a></li>
		<li><a id="misDatos"href="#tab_d" data-toggle="tab">MIS DATOS</a></li>
		<li><a id="misNotas"href="#tab_e" data-toggle="tab">MIS NOTAS</a></li>
		<div class="user-right">
			<span><?php echo $nombre_usuario ?></span>			
			<img src="../img/arrow-down.png"/>
		</div>					
		<ul class="user-options">
			<li><span>Perfil</span></li>
			<li><span id="change-user-pass">Cambiar contraseña</span></li>
			<li><a href="c_home/logout">Logout</a></li>
		</ul>
		</div>
	</ul>
</div>

<div class="tab-content">
		<div class="tab-pane fade active in" id="tab_a">
			<div class="contenedor-pestana-general">
				<div class="box-generic asignaturas">
					<h3>Welcome <?php echo $nombre_usuario ?></h3>
					<div>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
					ac turpis egestas.</div>
				</div>				
			</div>		
		</div>
		<div class="tab-pane fade" id="tab_b">
			<div class="contenedor-pestana-general">
				<div id="asignatura-info-container">
				</div>
				<div id="selector-asignatura" class="box-generic asignaturas">
					<h3><img src="">Asignaturas del curso</h3>
					<ul id="selectorBtnAsignatura">
					</ul>
				</div>
			</div>			
		</div>
		<div class="tab-pane fade" id="tab_c">

			<div id="aportes-info-container"  class="contenedor-pestana-general">
				<div>
					<h1>Listado de aranceles:</h1>
				</div>
				<div> <input type="button" value="Imprimir en PDF"></div>
				<table id="tablaAportes">
					<thead>
						<tr>
							<td>Ticket</td>
							<td>Arancel</td>
							<td>Precio</td>
							<td>Fecha</td>
						</tr>
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
					<div class="botones-datos-personales">
						<input id="misTutores" type="button" value="Tutor / Autorizados">
						<input id="misHorarios" type="button" value="Mis Horarios">					
						<input id="misDocentes" type="button" value="Mis Docentes">
					</div>
				</div>
				<div class="overlay-popup"style = "display:none;"></div>
				<div class="perfil-tutor-container" style = "display:none;">
					<div class="popup-header">
						<h2><span id="perfil-nombre-header"></span><span id="perfil-grado-header"></span></h2>
						<div class="close-popup"><img src="../img/close.png"></div>
						<div id="idTutor"></div>
					</div>
					<div class="popup-body">
						<div class="container-left">
							<img class="profile-picture" src="../img/profile-temp.png">
						</div>
						<div class="container-right">
							<ul class="nav nav-tabs" role="tablist">
							  <li class="active"><a href="#profile" role="tab" data-toggle="tab">Informacion Personal</a></li>
							  <li class=""><a id="retirarPersonas" href="#personas-premitidas" role="tab" data-toggle="tab">Personas Retirar</a></li>
							  <li class=""><a class="nueva-permitida" href="#nueva-premitida" role="tab" data-toggle="tab" style="display:none;">Asociar Nueva Persona</a></li>
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
							  <div class="tab-pane " id="personas-premitidas">							  	
							  	<table>
							  		<thead>
							  			<tr>
							  				<td></td>
							  				<td>Nombre Completo</td>
							  				<td>Nro Documento</td>
							  				<td>Telefono</td>
							  				<td>Relacion</td>
							  				<td></td>
							  				<td></td>
							  			</tr>
							  		</thead>
							  		<tbody id="listadoAutorizados">
							  		</tbody>
							  	</table>
							  	<div class="nuevaPersonaPermitida">
							  		<input id="permita-nombre" type="text" placeholder="Nombre completo...">
								  	<input id="permita-dni" type="text" placeholder="Nro documento.."> <br>
								  	<input id="permita-num" type="text" placeholder="Telefono...">
								  	<input id="permita-relacion" type="text" placeholder="Relación..."> <br>
								  	<input type="button" value="Agregar" id="agregarPermitidas">
							  	</div>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>
				<div id="conte-listado-horarios" style="display:none;">
					<div>
						<div class="close-popup"><img src="../img/close.png"></div>
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
									<img src="../img/Colegio/0. Escudo.jpg">
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
		<div class="tab-pane fade" id="tab_e">
			<div class="contenedor-principal cargarNotas" style="display:block;">
				<div class="grilla-notas" style="display:block;">
					<div>					
						<div id="contenedor-informe-progreso">
							<h1> Listado de Asignaturas</h1>
							<div id="informe-nivel-primaria" style="display:none;">
								<table> 
									<thead>
										<tr id="cabecera-notas">
										</tr>
									</thead>
									<tbody id="listado-primario-notas">									
									</tbody>
								</table>
							</div>
							<div id="informe-nivel-inicial" style="display:none;">
								<div class="accordion nivel-inicial" id="accordion2">
								</div>								
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
		</div>
	</div>
	<div id="page-wrap" class="vertical">
		<div id="lista-mensajes">			
		</div>
	</div>
	<div class="overlay-change-pass" style="display:none;">
	</div>
	<div class="change-pass-container" style="display:none;">
		<form>
			<label>Ingrese la nueva contraseña</label>		
			<input type="password" placeholder=""/>
			<label>Confirmmar Contraseña</label>
			<input type="password" placeholder=""/><br>
			<input type="button" class="btn btn-danger" value="Cancelar"/>
			<input type="button" class="btn btn-primary" value="Confirmar"/>
		</form>
	</div>
	<div>
		<div class="overlay"></div>
		<div id="conte_popup"></div>
	</div>
	<div>
	</div>
	<div class="popup-opciones-asignatura">
		
	</div>

	<style>

	.icono-escudo{
		width: 45px;
		float: left;
		margin: 10px;
	}	

	.header-menu{
		background-color: #000;
		color: #FFF;
	}

	.user-right{
		display: inline-block;
		float: right;
		margin: 8px 50px;
	}

	.user-options{
		display: none;
		position: absolute;
		background-color: white;
		color: black;
		list-style: none;
		padding: 10px 16px;
		border: 1px solid #DDD;
		margin: 38px 29px 0 0;
		box-shadow: 0px 2px 6px #CCC;
		right: 0;
	}
	.user-options li{
		cursor: pointer;
		padding: 0 16px;
		line-height: 30px;
	}

	.user-options li:hover{
		color: #FFFFFF;
		background-color: #909090;
	}

	.change-pass-container{
		width: 230px;
		top: 0;
		left: 0;
		margin: auto;
		bottom: 0;
		right: 0;
		height: 170px;
		position: absolute;
		border: 1px solid #D5D5D5;
		padding: 30px;
		border-radius: 5px;
		box-shadow: 0px 1px 21px -2px;
		background-color: #FFFFFF;
	}

	#listadoAutorizados input{
		width: 100px;
	}

	#aportes-info-container{
		width: 500px;
		margin: 0 auto;
		background-color: #fff;
		padding: 15px;
	}

	.aportes-alumno td{
		padding: 5px;
		border: 1px solid #000;
	}

	#misTutores,
	#misHorarios,
	#misDocentes{
		height: 100px;
		width: 100px;
	}

	#misHorarios{
		margin: 0 10px;
	}

	.botones-datos-personales{
		margin: 0 auto;
		width: 330px;
		padding: 15px 0;
	}

	.nuevaPersonaPermitida{
		text-align: center;
		border: 1px solid #000;
		padding: 15px;
	}

	#conte-listado-horarios{
		background-color: white;
		position: absolute;
		z-index: 99;
		left: 0;
		right: 0;
		width: 80%;
		margin: 0 auto;
	}

	#conte-listado-horarios td,
	#conte-listado-horarios tr {
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

	</style>
</div>

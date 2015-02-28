
<script type="text/javascript" src="../js/alumno.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body style="background-image: url('../img/fondo-1.jpg');">
	<div class="header-menu">
		<img class="icono-escudo" src="../img/Colegio/0. Escudo.png">
		<label class="label-menu-superior-general">Instituto <br>Santa Teresita</label>
		<ul class="nav nav-tabs menu-main">	
			<li class="active"><a href="#tab_a" data-toggle="tab"><img src="../img/white-icons/appbar.home.png">Inicio</a></li>
			<li><a id="misAsignaturas" href="#tab_b" data-toggle="tab"><img src="../img/white-icons/appbar.book.png">Mi Curso</a></li>
			<li><a id="misAportes" href="#tab_c" data-toggle="tab"><img src="../img/white-icons/appbar.money.png">Mis Aportes</a></li>
			<li><a id="misNotas"href="#tab_e" data-toggle="tab"><img src="../img/white-icons/appbar.grade.a.plus.png">Mis Notas</a></li>
			<li class="lastone"><a id="misDatos"href="#tab_d" data-toggle="tab"><img src="../img/white-icons/appbar.people.profile.png">Mis Datos</a></li>
			<div class="user-right">
				<span><?php echo $nombre_usuario ?></span>			
				<img src="../img/white-icons/appbar.list.png"/>
			</div>
		</ul>					
		<ul class="user-options">
			<li class="mi_perfil"><span>Mis Datos</span></li>
			<li class="pass_change"><span>Cambiar contraseña</span></li>
			<li class="logout"><span>Cerrar sesion</span></li>
		</ul>
	</div>

	<div class="tab-content container">
		<div class="tab-pane fade active in" id="tab_a">
			<div class="contenedor-pestana-general">
				<div class="box-generic bienvenido">
					<h3>Bienvenido, <?php echo $nombre_usuario ?></h3>
					<img src="http://lecturalab.org/userfiles/tt_estrategias_alumnos_clase.jpg" style="height: 450px; width: 100%;">
				</div>				
			</div>		
		</div>
		<div class="tab-pane fade" id="tab_b">
			<div class="contenedor-pestana-general materias">
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
				<div id="sin-aranceles" style="display:none;">
				</div>
				<div id="con-aranceles" style="display:none;">
					<div class="box-generic aranceles">
						<h3>Listado de aranceles</h3>
						<div style="padding: 30px;">
							<table id="tablaAportes">
								<thead style="text-align: center;">
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
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_d">
			<div class="pestana-datos-alumno">
				<div class="box-generic personales">
					<h3>Datos personales</h3>
					<div style="padding: 30px;">
						<label>Nombre y Apellido</label><input id="perfil-nombre-completo" type="text" readonly><br>
						<label>Nro Documento</label><input id="perfil-dni" type="text" readonly><br>
						<label>Sexo</label><input id="perfil-sexo" type="text" readonly><br>
						<label>Fecha de Nacimiento</label><input id="perfil-fecha-nac" type="text" readonly><br>
						<label>Nacionalidad</label><input id="perfil-nacionalidad" type="text" readonly><br>
						<label>Domicilio</label><input id="perfil-domicilio" type="text" readonly><br>
						<label>Telefono Fijo</label><input id="perfil-tel-fijo" type="text" readonly><br>
						<label>Telefono Movil</label><input id="perfil-tel-movil" type="text" readonly><br>
						<label>Mail</label><input id="perfil-mail" type="text" readonly><br>
						<label>Lugar de Nacimiento</label><input id="perfil-lugar-nac" type="text" readonly><br>
					</div>
				</div>
				<div style="float: right;width: 40%;margin-right: 1%;margin-top: 30px;">
					<div class="box-generic academicos" style="box-shadow: 0px 0px 25px 1px #CCC;">
						<h3>Datos academicos generales</h3>
						<div style="padding: 30px;">							
							<label>Legajo</label><input id="perfil-legajo" type="text" readonly><br>
							<label>Curso</label><input id="perfil-curso"type="text" readonly><br>
							<label>Estado Academico</label><input id="perfil-estado"type="text" readonly><br>
						</div>
					</div>

					<div class="box-generic academicos" style="box-shadow: 0px 0px 25px 1px #CCC;">
						<h3>Más informacion</h3>
						<div class="botones-datos-personales">
							<input id="misTutores" type="button" value="Tutor / Responsable">
							<input id="misInasistencias" type="button" value="Historial Inasistencias" style="margin-top: 15px;
">
						</div>
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
								<li class=""><a id="retirarPersonas" href="#personas-premitidas" role="tab" data-toggle="tab" style="display:none;">Personas Retirar</a></li>
								<li class=""><a class="nueva-permitida" href="#nueva-premitida" role="tab" data-toggle="tab" style="display:none;">Asociar Nueva Persona</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">							  	
									<label>Nro Documento</label><input id="tutor-dni" type="text" readonly><br>
									<label>Sexo</label><input id="tutor-sexo" type="text" readonly><br>
									<label>Fecha de Nacimiento</label><input id="tutor-fecha-nac" type="text" readonly><br>
									<label>Estado Civil</label><input id="tutor-estado-civil" type="text" readonly><br>							  	
									<label>Domicilio</label><input id="tutor-domicilio" type="text" readonly><br>							  	
									<label>Telefono Fijo</label><input id="tutor-tel-fijo" type="text" readonly><br>
									<label>Telefono Movil</label><input id="tutor-tel-movil" type="text" readonly><br>
									<label>Correo Electronico</label><input id="tutor-mail" type="text" readonly><br>
								</div>
								<div class="tab-pane " id="personas-premitidas">							  	
									<table>
										<thead>
											<tr>
												<td></td>
												<td>Nombre</td>
												<td>Apellido</td>
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
										<input id="permita-nombre" type="text" placeholder="Nombre...">
										<input id="permita-apellido" type="text" placeholder="Apellido...">
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
				<div id="conte-listado-inasistencias" class="optiones-materias"style="display:none;">
					<div class="popup-header">
						<h2 class="faltas">Mis Inasistencias</h2>
						<div class="close-popup"><img src="../img/close.png"></div>
					</div>
					<div class="popup-body">
						<div id="listadoInasistencias">
							<table>
								<thead>
									<tr>
										<td>Fecha</td>
										<td>Motivo</td>
									</tr>
								</thead>
								<tbody>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- tab content -->
		<div class="tab-pane fade" id="tab_e">
			<div class="contenedor-principal cargarNotas" style="display:block;">
				<div class="grilla-notas" style="display:block;">
					<div>					
						<div id="contenedor-informe-progreso" class="box-generic progreso">
							<h3> Mis notas de este año </h3>
							<div id="informe-nivel-primaria" style="display:none;">
								<div class="contenedor-filtros">
									<select id="filtro_curso" style="display:none;">					
									</select>
									<div style="display: inline-block;margin-left: 75px;">
										<input type="radio" id="grilla_completa" name="mis_notas" checked>
										<label>Grilla Completa</label><br>
										<input type="radio" id="por_etapas" name="mis_notas">
										<label>Por etapas</label>
										<select id="filtro_etapa" style="display:none;">					
										</select>
									</div>			
								</div>
								<table id="tabla_grilla_completa"> 
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
			<h3>Mensajes <span id= 'cantMensajes'></span> </h3>			
		</div>
	</div>
	<div class="overlay-change-pass" style="display:none;">
	</div>
	<div class="change-pass-container" style="display:none;">
		<img src="../img/Icons/cross-black.png">
		<form>
			<label>Ingrese la nueva contraseña</label>		
			<input type="password" placeholder=""/>
			<label>Confirmmar Contraseña</label>
			<input type="password" placeholder=""/><br>
			<input type="button" class="btn btn-danger cancelar" value="Cancelar"/>
			<input type="button" class="btn btn-primary" value="Confirmar"/>
		</form>
	</div>
	<div>
		<div class="overlay"></div>
		<div id="conte_popup"></div>
	</div>
	<div id="loading" style="display:none;">
		<div>
			<img src="../img/loading.gif">
		</div>
	</div>

	<div class="overlay-popup" style = "display:none;"></div>
	<div class="optiones-materias" style = "display:none;">
		<div class="popup-header">
			<img src="../img/close.png">
			<h2></h2>
		</div>
		<div class="popup-body">
			<div id="opciones-materias-contenedor">
			</div>
		</div>
	</div>

	<style>

	#listado-primario-notas span{
		position: absolute;
		background-color: aqua;
		margin: 10px;
		padding: 20px;
	}

	.asignaturas-curso label{
		display: inline-block;
	}
	.asignaturas-curso:hover > label{
		color: #FFFFFF;
	}

	#selectorBtnAsignatura{
		list-style: none;
		margin: 0;
		padding: 15px;
	}
	
	#informe-nivel-primaria td {
	    padding: 5px 10px;
	}

	#selectorBtnAsignatura li{
		line-height: 30px;
		cursor: pointer;
		padding: 15px;
	}

	#selectorBtnAsignatura li:hover{
		background-color: #333;
	}
	
	.show-opciones{
		display: block;
		float: right;
		background-color: #FFFFFF;
		border: 1px solid#CCC;
		border-radius: 5px;
		color: #000000;
	}

	.show-opciones ul{
		list-style: none;
		margin: 0;
	}

	.show-opciones ul a{
		margin: 0;
		color: #000000;	
	}

	.show-opciones ul a:hover{
		text-decoration: none;
	}

	.show-opciones ul li:hover{
		background-color: #D5D5D5 !important;
	}

	.show-opciones ul li{
		padding: 10px 35px !important;
	}

	#selectorBtnAsignatura li:hover > span{
		color: white;
	}

	.icono-escudo{
		width: 60px;
		float: left;
		margin: 10px;
	}	

	.header-menu{
		background-color: #000;
		color: #FFF;
	}

	#listadoAutorizados input{
		width: 100px;
	}

	#aportes-info-container{
		width: 540px;
		margin: 20px auto;
		padding: 15px;
	}

	#sin-aranceles{
		padding: 40px;
		font-family: 'Lato';
		font-size: 28px;
		line-height: 30px;
		text-align: center;
		border: 1px solid #000;
	}

	.aportes-alumno td{
		padding: 5px;
		border: 1px solid #000;
	}

	#misTutores,
	#misInasistencias{
		height: 45px;
		width: 100%;
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

	.box-generic.asignaturas{
		box-shadow: 0px 0px 25px 1px #CCC;
	}

	#lista-mensajes{
		display: block;
		position: relative;
		margin: 40px 0;
		border-bottom: 1px solid #CCC;
		border-left: 1px solid #CCC;
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

	
	#informe-nivel-inicial{
		width: 80%;
		margin: 0 auto;
		padding: 40px;
		margin: 40px;
		background-color: #FFF;
		border: 1px solid #CCC;
	}

	
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
</body> 

</html>
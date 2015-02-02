<script type="text/javascript" src="../js/docente.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
	<div class="header-menu">
		<img class="icono-escudo" src="../img/Colegio/0. Escudo.png">
		<label class="label-menu-superior-general">Instituto <br>Santa Teresita</label>
		<ul class="nav nav-tabs menu-main">		
			<li class="active"><a href="#tab_a" data-toggle="tab"><img src="../img/white-icons/appbar.home.png">Inicio</a></li>
			<li><a id="misCursos" href="#tab_b" data-toggle="tab"><img src="../img/white-icons/appbar.book.png">Mis Cursos</a></li>
			<li class="lastone"><a id="misDatos" href="#tab_c" data-toggle="tab"><img src="../img/white-icons/appbar.people.profile.png">Mis Datos</a></li>
			<div class="user-right">
				<span><?php echo $nombre_usuario ?></span>			
				<img src="../img/white-icons/appbar.list.png"/>
			</div>
		</ul>
		<ul class="user-options">
			<li><span>Perfil</span></li>
			<li><span id="change-user-pass">Cambiar contraseña</span></li>
			<li><a href="c_home/logout">Cerrar sesion</a></li>
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
			<div id="curso-info-container">
			</div>
			<div id="selector-curso" class="box-generic">
				<h3>Seleccione un curso</h3>
				<div id="selectorBtnCurso">
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_c">
			<div class="box-generic personales">
				<h3>Datos personales</h3>
				<div class="datos-personales">
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
			<div class="box-generic curriculum">
				<h3>Curriculum</h3>
				<div>
					<iframe src="http://www.institucional.frc.utn.edu.ar/sistemas/noticias/DOC/CV/liberatori_marcelo_2014.pdf" style="width:543px; height:435px;" frameborder="0"></iframe>						
				</div>
			</div>						
		</div>		
	</div><!-- tab content -->
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
	<style>

	.header-menu{
		background-color: #000;
		color: #FFF;
	}

	.user-right{
		display: inline-block;
		float: right;
		margin: 8px 30px;
	}

	.user-right img{
		margin-top: -4px;
		margin-left: 15px;
	}
	.box-generic.personales{
		float: left;
		width: 543px;
		margin-left: 1%;
		margin-top: 30px;
		box-shadow: 0px 0px 9px 4px #CCC;
	}
	.box-generic.personales label{
		display: inline-block;
		width: 150px
	}
	.datos-personales{
		width: 80%;
		margin:	auto;
		padding: 20px 0;
	}
	.box-generic.curriculum{
		float: right;
		margin-right: 1%;
		margin-top: 30px;
		max-height: 532px;
		box-shadow: 0px 0px 9px 4px #CCC;
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
	.contenedor-principal.cargarNotas{
		width: 70%;
		background-color: transparent;
		border: none;
	}
	.user-options li:hover{
		color: #FFFFFF;
		background-color: #909090;
	}
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
		float: left;
	}

	span.Presente{
		color: green;
		padding-left: 15px;
	}

	span.Ausente{
		color: red;
		padding-left: 15px;
	}

	#listado-asistencia input[type="checkbox"]{
		margin-top: 0px;
		height: 16px;
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
	</style>


</body> 

</html>
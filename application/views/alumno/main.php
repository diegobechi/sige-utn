<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
		<li><a id="misAsignaturas" href="#tab_b" data-toggle="tab">MIS ASIGNATURAS</a></li>
		<li><a href="#tab_d" data-toggle="tab">MIS APORTES</a></li>
		<li><a href="#tab_d" data-toggle="tab">MIS DATOS</a></li>
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
			<h4>MENSAJES</h4>
			<div>
				<div>PANEL PARA ENVIAR MENSAJES</div>
				<div>PANEL PARA LEER MENSAJES</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_d">
			<h4>MIS DATOS</h4>
			<div>
				<input type="button" value="Cargar CV">
				<div>PANEL PARA PREVISUALIZAR MIS DATOS </div>
			</div>
		</div>
	</div><!-- tab content -->
</div>
<div id="page-wrap">
	<div id="lista-mensajes">
	    <h3>Mensajes <span id= 'cantMensajes'></span> </h3>
	  	</div>
</div>

<script>

</script>

<style>

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
<!--	
<div id="datos-personales-alumno"class="pagina-principal-informacion-alumno">
	<div class="columna-foto-alumno">
		<div><img src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-prn1/37387_404125861265_4252004_n.jpg" class="foto-perfil-datos-personales"></div>
	</div>
	<div class="columna-datos-personales-alumno">
		<div>
			<h3>HOME</h3>
			<div class="formulario">Nombre y apellido: <label id="nombre_apellido"></label> </div>
			<div class="formulario">Apellido <label id="nombre_apellido"></label></div>
			<div class="formulario">Direccion <label id="nombre_apellido"></label></div>
			<div class="formulario">Telefono <label id="nombre_apellido"></label></div>
		</div>
	</div>
	<div class="columna-informacion-alumno">
		<div id="home-wrapper">
			<div class="home-head-buttons">
				<menu id="home-top-menu">
					<ul>
						<li>
							<a onclick="app.sige.transition_page.animation(0,3)" href="javascript:;" class="home-top-item active">Comunicados</a>
						</li>
						<li>
							<a onclick="app.sige.transition_page.animation(1,3)" href="javascript:;" class="home-top-item">Asistencia</a>
						</li>
						<li>
							<a onclick="app.sige.transition_page.animation(2,3)" href="javascript:;" class="home-top-item">Meritos y Sanciones</a>
						</li>
					</ul>
				</menu>
			</div>
		</div>
			<div id="pt-main" class="pt-perspective">
				<div class="pt-page pt-page-1">
					<div>Comunicados</div>
				</div>
				<div class="pt-page pt-page-2">
					<div>
						<div>Asistencia</div>
					</div>					
				</div>
				<div class="pt-page pt-page-3">
					<div>Meritos y sanciones</div>
				</div>
			</div>
	</div>-->
</div>

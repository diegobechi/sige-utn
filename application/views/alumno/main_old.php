<div class="contenedor-general">


<div id="contenedor-general">
	<div class="columna-foto-alumno">
		<div><img src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-prn1/37387_404125861265_4252004_n.jpg" class="foto-perfil-datos-personales"></div>
	</div>
	<div class="columna-datos-personales-alumno">
		<div>
			<h3>DATOS PERSONALES</h3>
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
	</div>
</div>
<div id="contenedor-pestañas" class="contenedor-pestañas">
	<div>
		<ul id="grupoPestañas" class="nav nav-tabs" style="margin:0px">
		    <li id="pestaña1"><a href="#pane1" data-toggle="tab" onclick="app.sige.openTabs(1)">Comunicados</a></li>
		    <li id="pestaña2"><a href="#pane2" data-toggle="tab" onclick="app.sige.openTabs(2)">Aportes</a></li>
		    <li id="pestaña3"><a href="#pane3" data-toggle="tab" onclick="app.sige.openTabs(3)">Normas de convivencia</a></li>
		    <li id="pestaña4"><a href="#pane4" data-toggle="tab" onclick="app.sige.openTabs(4)">FAQs</a></li>
	  	</ul>
	</div>
	<div id="contenedor-cuerpos-pestañas" class="contenedor-cuerpos-pestañas">
		<div id="cuerpo-pestaña-comunicados" class="cuerpo-pestañas-bottom"></div>
		<div id="cuerpo-pestaña-aportes" class="cuerpo-pestañas-bottom"></div>
		<div id="cuerpo-pestaña-normas-convivencia" class="cuerpo-pestañas-bottom"></div>
		<div id="cuerpo-pestaña-preguntas-frecuentes" class="cuerpo-pestañas-bottom"></div>
	</div>
</div>

</div>


<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
		<li><a id="misCursos" href="#tab_b" data-toggle="tab">MIS CURSOS</a></li>
		<li><a href="#tab_c" data-toggle="tab">MENSAJES</a></li>
		<li><a href="#tab_d" data-toggle="tab">CURRICULUM</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tab_a">
			<div class="box-generic">
				<h3>Welcome NOMBRE DOCENTE</h3>
				<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
				ac turpis egestas.</p>
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
				<div>PANEL PARA ENVIAR MENSAJES</div>
				<div>PANEL PARA LEER MENSAJES</div>
			</div>
		</div>
		<div class="tab-pane fade" id="tab_d">
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
	</div><!-- tab content -->
</div>

<style>
.box-curso-generic{
	background-color: aquamarine;
	width: 150px;
	text-align: center;
	display: inline-block;
	height: 150px;
	margin: 20px;
}
body .tab-content{
	width: 80%;
	margin: 0 auto;
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
	</div>
</div>-->





<label class="label-menu-superior-general">INSTITUTO SANTA TERESITA</label>
<ul class="nav nav-tabs"  style="background-color: #000;">		
	<li class="active"><a href="#tab_a" data-toggle="tab">INICIO</a></li>
	<li><a id="misCursos" href="#tab_b" data-toggle="tab">MIS CURSOS</a></li>
	<li><a href="#tab_c" data-toggle="tab">MENSAJES</a></li>
	<li><a href="#tab_d" data-toggle="tab">CURRICULUM</a></li>
	<li><a href="#tab_e" data-toggle="tab">TEMARIO</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade active in" id="tab_a">
		<div class="box-generic">
			<h3>Welcome NOMBRE DOCENTE</h3>
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>					
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
</div><!-- tab content -->

<style>
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



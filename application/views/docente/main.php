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
				<div class="send-message-container">
	<div class="send-menssage-header">
		<div class="date-notes">
			<label>Fecha: </label><?php echo date("d-m-Y"); ?><br>
			<label>Hora: </label><div id='hora' style="display:inline-block"></div><br>
		</div>
		<div>
			<label>Nombre del Docente</label><br>
		</div>		
		<label>Enviar a:</label>
		<div class="radio">
		  <label>
		    <input type="radio" name="opciones" id="opciones_1" value="opcion_1" checked>
		    Todo el curso
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="opciones" id="opciones_2" value="opcion_2" style="margin-top: 8px;">
		    Solo una asignatura 
		    <select class="selectpicker">
			    <option>Materia 1</option>
			    <option>Materia 2</option>
			    <option>Materia 3</option>
			</select>
		  </label>
		</div>		
		
	</div>
	<div style="margin-top: 30px;">
		<label>Escriba a continuacion el mensaje:</label>
		<textarea></textarea>
		<div class="btn">Enviar</div>
	</div>
</div>
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

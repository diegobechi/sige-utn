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
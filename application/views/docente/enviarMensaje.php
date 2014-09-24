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

<script type="text/javascript">
window.onload=hora;
fecha = new Date();

function hora(){
	var hora=fecha.getHours();
	var minutos=fecha.getMinutes();
	var segundos=fecha.getSeconds();
	if(hora<10){ hora='0'+hora;}
	if(minutos<10){minutos='0'+minutos; }
	if(segundos<10){ segundos='0'+segundos; }
	fech=hora+":"+minutos+":"+segundos;
	document.getElementById('hora').innerHTML=fech;
	fecha.setSeconds(fecha.getSeconds()+1);
	setTimeout("hora()",1000);
}

$(document).ready(function(){
	$('#opciones_1, #opciones_2').click(function() {
   		if($('#opciones_2').is(':checked')){ 
   			$('.selectpicker').css('visibility', 'visible');
   		}else{
   			$('.selectpicker').css('visibility', 'hidden');
   		}
	});
})
</script>

<style type="text/css">

.date-notes{
	float: right;
}
.date-notes label{
	width: 50px;
}
.selectpicker{margin-bottom: 0px; visibility: hidden;}
.send-message-container{
	margin: 0 auto;
	width: 500px;
	background-color: #fff;
	padding: 20px;
}
.send-message-container label{
	display: inline-block;
}
.send-message-container textarea{
	width: 485px;
	height: 100px;
	display: block;
}
.send-menssage-header .radio{
	height: 25px;
}
</style>
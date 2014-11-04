
<div class = "contenedor-info" style = "display:block;">  
	<input type="button" value="Regresar" id="back-button">
	<div class = "titulo-principal">
		<span></span>
		<h1><img src="img/curso.png"> INFORMACION DE LA ASIGNATURA - </h1>
	</div>
	<div style ="padding:20px">
		<div class = "lista-opciones">
			<li data-title="notas"> <img src="img/alumno.png"/>Notas</li>
			<li data-title="temas-dictados" id="temas-dictados"> <img src="img/materia.png"/> Temas Dictados</li>
			<li data-title="programa" id="programa"> <img src="img/listados.png"/>Programa</li>
			<li data-title="general"> <img src="img/mensajes.png"/>General</li>
		</div>	
		<div class ="contenedor-principal alumnos">
			<div class ="titulo-principal">
				<span></span>
				<h3> <img src="img/person.png"> Mis Notas </h3>
			</div>
			<div class ="contenedor-de-alumnos">
				<ul>
				</ul>
			</div>
		</div>

		<div class = "contenedor-principal temas-dictados" style="display:none;">
			<div class = "titulo-principal">
		  	  <span></span>
		  	   <h1><img src="img/book_1.png"> Temas Dictados</h1> 
		    </div>
		    <div id="listadoTemasDictados">
		    </div>
		</div>

		<div class = "contenedor-principal programa" style="display:none;">
			<div class = "titulo-principal">
				<h1> <img src="img/book_1.png">  Programa 
					<select>
					<option> 2014
					</option>
					<option> 2013
					</option>
					<option> 2012
					</option>
					</select>
				</h1>
		    </div>
		    	<div class="contenedor-asignaturas">
			     	<div class= " listado-asignaturas">			     		
			     </div> 
		    </div>
		</div>

		<div class="contenedor-principal general" style="display:none;">
			<div class = "titulo-principal">
		  	  <span></span>
		  	   <h1><img src="img/book_1.png"> Informacion General</h1> 
		    </div>
			<div>
     			<label>Luenes 8am a 12am</label>
     			<label>Luenes 8am a 12am</label>
     			<label>Luenes 8am a 12am</label>
     		</div>
     		<div>
     			<img src="">
     			<label>Diego Bechi</label>
     			<label>diegobechi@gmail.com</label>
     			<input type="button" value="Ver CV">
     		</div>
		</div>
	</div>
</div>
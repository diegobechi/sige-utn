
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
			<li data-title="inasistencias"> <img src="img/inasistencias.png"/>Inasistencias</li>
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
		</div>

		<div class = "contenedor-principal asignaturas" style="display:none;">
			<div class = "titulo-principal">
				<h1> <img src="img/book_1.png">  Asignaturas 
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
			     		<ul>
			     			<li class="box-asignatura-generica"> 
			     				<div class="asignatura-titulo">
			     					<h3> Asignatura
			     					</h3>        
			     				</div>
			     				<div class="asignatura-body" style = "display:none;">
			     					ASDASASDASDASDASDAS
			     				</div>      
			     			</li>
			     			<li class="box-asignatura-generica"> 
			     				<div class="asignatura-titulo">
			     					<h3> Asignatura
			     					</h3>        
			     				</div>
			     				<div class="asignatura-body" style = "display:none;">
			     					ASDASASDASDASDASDAS
			     				</div>      
			     			</li>
			     			<li class="box-asignatura-generica"> 
			     				<div class="asignatura-titulo">
			     					<h3> Asignatura
			     					</h3>        
			     				</div>
			     				<div class="asignatura-body" style = "display:none;">
			     					ASDASASDASDASDASDAS
			     				</div>      
			     			</li>
						</ul>
			     </div> 
		    </div>
		</div>

		<div class="contenedor-principal inasistencias" style="display:none;">
		</div>
	</div>
</div>
<div class = "contenedor-info" style = "display:block;">  
	<div class = "titulo-principal">
		<span></span>
		<h1> <img src="img/curso.png"> INFORMACION DEL CURSO</h1>
	</div>
	<div style ="padding:20px">
		<div class = "lista-opciones">
			<li data-title="alumnos"> <img src="img/alumno.png"/>Alumnos</li>
			<li> <img src="img/materia.png"/> Asignaturas
				<ul>
					<li data-title="misAsignaturas">Mis Asignaturas</li>
					<li data-title="asignaturas">Asignaturas del curso</li>
				</ul>
			</li>
			<li data-title="listados"> <img src="img/listados.png"/>Listados</li>
			<li data-title="inasistencias"> <img src="img/inasistencias.png"/>Inasistencias</li>
			<li data-title="mensajes"> <img src="img/mensajes.png"/>Mensajes</li>
		</div>	
		<div class ="contenedor-principal alumnos">
			<div class ="titulo-principal">
				<span></span>
				<h3> <img src="img/person.png"> Alumnos </h3>
			</div>
			<div class ="contenedor-de-alumnos">
				<ul>
				</ul>
			</div>
		</div>

		<div class = "contenedor-principal listados" style="display:none;">
			<div class = "titulo-principal">
		  	  <span></span>
		  	   <h1><img src="img/book_1.png"> Listados</h1> 
		    </div>
		  	
		  	<div class = "contenedor-de-listados">
		   	    <ul>
		    	    <li class = "box-listado">
		   		        <a id="curso" href="#" class="box-alumno">
							<div>
								<img src="img/listado.png">
								<h6> Listado de Alumnos</h6>
							</div>
				        </a>
				    </li>
				    <li class = "box-listado">
		   		        <a id="curso" href="#" class="box-alumno">
							<div>
								<img src="img/listado.png">
								<h6> Inasistencias por fecha</h6>
							</div>
				        </a>
				    </li>
				     <li class = "box-listado">
		   		        <a id="curso" href="#" class="box-alumno">
							<div>
								<img src="img/listado.png">
								<h6> Licencias otorgadas</h6>
							</div>
				        </a>
				    </li>
		        </ul>
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
		    	<div class = "contenedor-asignaturas">
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
	</div>
</div>

<div class="overlay-popup"style = "display:none;"></div>

<div class="perfil-alumno-container" style = "display:none;">
	<div class="popup-header">
		<span></span>
		<h2>Nombre del alumno - Grado del alumno</h2>
		<div class="close-popup"><img src="img/close.png"></div>
	</div>
	<div class="popup-body">
		<div class="container-left">
			<img class="profile-picture" src="img/profile-temp.png">
			<div>
				<h4>Tutores</h4>
			</div>
			<img class="tutores-alumno" src="img/profile-temp.png">
		</div>
		<div class="container-right">
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#profile" role="tab" data-toggle="tab">Informacion Personal</a></li>
			  <li><a href="#notes" role="tab" data-toggle="tab">Observaciones</a></li>
			  <li><a href="#messages" role="tab" data-toggle="tab">Otros</a></li>
			</ul>
			<div class="tab-content">
			  <div class="tab-pane active" id="profile">
			  	<label>Legajo</label><input type="text"><br>
			  	<label>Nro Documento</label><input type="text"><br>
			  	<label>Sexo</label><input type="text"><br>
			  	<label>Fecha de Nacimiento</label><input type="text"><br>
			  	<label>Nacionalidad</label><input type="text"><br>
			  	<label>Domicilio</label><input type="text"><br>
			  	<label>Telefono Fijo</label><input type="text"><br>
			  	<label>Telefono Movil</label><input type="text"><br>
			  	<label>Lugar de Nacimiento</label><input type="text"><br>
			  	<label>Estado Civil</label><input type="text"><br>
			  </div>
			  <div class="tab-pane" id="notes">Observaciones
			  </div>
			  <div class="tab-pane" id="messages">Otros</div>
			</div>
		</div>
	</div>
	<div class="overlay-perfil-tutor"></div>
	<div class="popup-perfil-tutor">
		<div class="foto-tutor">
			<img src="img/profile-temp.png">			
		</div>
		<div class="datos-tutor">
			<label>Nro Documento</label><label>32333924</label><br>
			<label>Sexo</label><label>MACHO</label><br>
			<label>Fecha de Nacimiento</label><label>07/06/1986</label><br>
			<label>Estado Civil</label><label>Soltero</label><br>
			<label>Domicilio</label><label>lalalalalala</label><br>
			<label>Telefono Fijo</label><label>123123123131</label><br>
			<label>Telefono Movil</label><label>1231231231231</label><br>
			<label>Correo Electronico</label><label>123123123123@gmail.com</label><br>
		</div>		
	</div>
</div>

<style>
	.overlay-perfil-tutor{
		display: none;
		background-color: black;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		position: fixed;
		opacity: 0.7;
	}
	.datos-tutor label{
		display: inline-block;
	}
	.datos-tutor{
		float: left;
	}
	.foto-tutor{
		width: 120px;
		margin: 15px;
		float: left;
	}
	.popup-perfil-tutor{
		display: none;
		background-color: white;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		width: 460px;
		height: 200px;
		margin: auto;
		border: 4px solid red;
	}
</style>
<div class = "contenedor-info" style = "display:none;">  
	<div class = "titulo-principal">
		<span></span>
		<h1> <img src="img/curso.png"> INFORMACION DEL CURSO</h1>
	</div>
	<div style ="padding:20px">
		<div class = "lista-opciones">
			<li> <img src="img/alumno.png"/><a> Alumnos</a></li>
			<li> <img src="img/materia.png"/> <a> Asignaturas</a></li>
			<li> <img src="img/listados.png"/><a> Listados</a></li>
			<li> <img src="img/inasistencias.png"/><a> Inasistencias</a></li>
			<li> <img src="img/mensajes.png"/><a> Mensajes</a></li>
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

		<div class = "contenedor-principal listados">
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
			  <div class="tab-pane" id="notes">Observaciones</div>
			  <div class="tab-pane" id="messages">Otros</div>
			</div>
		</div>
	</div>
</div>

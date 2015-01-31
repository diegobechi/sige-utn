
<div class = "contenedor-info" style = "display:block;">  
	<input type="button" value="Regresar" id="back-button">
	<div class = "titulo-principal">
		<span></span>
		<h1><img src="img/curso.png"> INFORMACION DE LA ASIGNATURA - </h1>
	</div>
	<div style ="padding:20px">
		<div class = "lista-opciones">
			<li data-title="temas-dictados" id="temas-dictados"> <img src="img/materia.png"/>Temas Dictados</li>
			<li data-title="programa" id="programa"> <img src="img/listados.png"/><a href="http://red.ilce.edu.mx/sitios/micrositios/cortazar_aniv/pdf/8_Cielo_Rayuela_libro.pdf" id="link_programa" target="_blank"> Programa</a></li>
			<li data-title="general" id="info_general"> <img src="img/mensajes.png"/>General</li>
		</div>		
		<div class = "contenedor-principal temas-dictados" style="display:block;">
			<div class = "titulo-principal">
		  	  <span></span>
		  	   <h1><img src="img/book_1.png"> Temas Dictados</h1> 
		    </div>
		    <div id="listadoTemasDictados">
		    </div>
		    <div><input type="button" value="Ver mas"></div>
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
		    <div>
		    	<div class="contenedor-programa">			     	
			     </div> 
		    </div>
		</div>
		<div class="contenedor-principal general" style="display:none;">
			<div class = "titulo-principal">
		  	  <span></span>
		  	   <h1><img src="img/book_1.png"> Informacion General</h1> 
		    </div>
			<div class="info_horarios">
     		</div>
     		<div class="info_docente">
     		</div>
		</div>
	</div>
</div>
<style>
.contenedor-principal{
	display: inline-block;
	width: 740px;
	height: 250px;
	border: 2px solid grey;
	margin: 0;
	background-color: gainsboro;
}
.Titulo-principal h1{
	background-color:orange;
	color:black;
	margin-top: 0px;
	font-size: 20px;
}
.contenedor-asignaturas{
	margin-top: 0px;
	display: inline-block;
  	background-color: darkslategrey;
  	border: 2px solid grey;
 	width: 738px;
 	height: 200px;
}
.box-asignatura-generica{
	background-color: white;
	border: 2px solid orange;

}
.box-asignatura-generica a{
	text-align: center;

}
.box-asignatura{
	text-decoration: none;
}


</style>
<div class = "contenedor-principal">
	<div class = "Titulo-principal">
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
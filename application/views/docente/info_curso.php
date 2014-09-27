<style>
.contenedor{
	width: 850px;
	margin: 0 auto;
	border: 2px solid #000;
	
}
.titulo-principal h1{
	margin-top: 0;
	background-color: orange;
	color: #fff;
	font-size: 20px;
	padding-left: 10px;
}
.lista-opciones{
	width: 150px;
	background-color:gainsboro;
	float: left;
	margin-right: 10px;
	}
.Contenedor-general{
	display: inline-block;
	width: 740px;
	border: 2px solid grey;
	margin: 0;
	background-color: gainsboro;
}
.Titulo-de-opciones h3{
	background-color: orange;
margin-top: 0px;

}
.contenedor-de-alumnos{
	background: darkslategrey;
	border: 2px solid grey;
	width: 725px;
	margin-right: 10px;
	margin-left: 10px;
}
.box-alumno-generic  {
	background-color: white;
	width: 150px;
	display: inline-block;
	border: 2px solid orange;
}
.box-alumno-generic a {
	text-align: center;
}

.box-alumno{
	text-decoration: none;
}

</style>

<div class = "contenedor-info" style = "display:none;">  
	<div class = "titulo-principal">
		<span></span>
		<h1> <img src="img/curso.png"> INFORMACION DEL CURSO</h1>
	</div>
	<div style ="padding:20px">
		<div class = "lista-opciones">
			<li> <img src="img/alumno.png"><a> Alumnos</li> </a>
			<li> <img src="img/materia.png"> <a> Asignaturas</li> </a>
			<li> <img src="img/listados.png"><a> Listados</li> </a>
			<li> <img src="img/inasistencias.png"><a> Inasistencias</li> </a>
			<li> <img src="img/mensajes.png"><a> Mensajes</li> </a>
		</div>	
		<div class ="Contenedor-general">
			<div class ="Titulo-de-opciones">
				<span></span>
				<h3> <img src="img/person.png"> Alumnos </h3>
			</div>
			<div class ="contenedor-de-alumnos">
				<ul>
					<li class="box-alumno-generic"> 
						<a id="legajo-50609"href="#" class ="box-alumno">
							<div>
								<h2> Bechi 
								</h2>
								<h3> Diego David 
								</h3>
								<img src="img/student_1.png">
							</div>
						</a>
					</li>
					<li class="box-alumno-generic"> <a id="legajo"href="#" class ="box-alumno">
						<div>
							<h2> Ribba	 
							</h2>
							<h3> Maria Noel 
							</h3>
							<img src="img/student_1.png">
						</div>
					</a>
					</li>
					<li class="box-alumno-generic"> <a id="legajo"href="#" class ="box-alumno">
						<div>
							<h2> Romero		
							</h2>
							<h3> Fernando 
							</h3>
							<img src="img/student_1.png">
						</div>
					</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
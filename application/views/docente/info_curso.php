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
.contenedor-general{
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
			<li> <img src="img/alumno.png"/><a> Alumnos</a></li>
			<li> <img src="img/materia.png"/> Asignaturas
				<ul> <li> MisAsignaturas
					</li>
					<li>  delCurso 
					</li>
				</ul>
			 </li>
			<li> <img src="img/listados.png"/><a> Listados</a></li>
			<li> <img src="img/inasistencias.png"/><a> Inasistencias</a></li>
			<li> <img src="img/mensajes.png"/><a> Mensajes</a></li>
		</div>	
		<div class ="contenedor-general">
			<div class ="Titulo-de-opciones">
				<span></span>
				<h3> <img src="img/person.png"> Alumnos </h3>
			</div>
			<div class ="contenedor-de-alumnos">
				<ul>
				</ul>
			</div>
		</div>
	</div>
</div>
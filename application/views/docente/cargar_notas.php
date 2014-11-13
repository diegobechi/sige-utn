<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

<div>
	<div class="contenedor-filtros">
		<h3>Curso:</h3>
		<select>
			<option>3° Grado</option>
			<option>4° Grado</option>
		</select>
		<h3>Asignatura</h3>
		<select>
			<option>Matematica</option>
			<option>Lengua</option>
		</select>
		<h3>Etapa</h3>
		<select>
			<option>Primera</option>
			<option>Segunda</option>
		</select>
	</div>
	<div id="contenedor-informe-progreso">
    <div id="informe-nivel-primaria">
      <table> Listado de alumnos
       <thead>
        <tr>
         <td>Legajo</td>
         <td>Alumno</td>
         <td>
          <select>
           <option>P</option>
           <option>E</option>
           <option>TP</option>
         </select>
       </td>
       <td>
        <select>
         <option>P</option>
         <option>E</option>
         <option>TP</option>
       </select>
     </td>
     <td>
      <select>
       <option>P</option>
       <option>E</option>
       <option>TP</option>
     </select>
   </td>
   <td>
    <select>
     <option>P</option>
     <option>E</option>
     <option>TP</option>
   </select>
 </td>
 <td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
<td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
<td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
<td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
<td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
<td>
  <select>
   <option>P</option>
   <option>E</option>
   <option>TP</option>
 </select>
</td>
</tr>
</thead>
<tbody>
<tr>
  <td>50609</td>
  <td>Bechi Diego</td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
</tr>
<tr>
  <td>50609</td>
  <td>Bechi Diego</td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
</tr>
<tr>
  <td>50609</td>
  <td>Bechi Diego</td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
</tr>
<tr>
  <td>50609</td>
  <td>Bechi Diego</td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
</tr>
<tr>
  <td>50609</td>
  <td>Bechi Diego</td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
  <td><input type="text"></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<input type="button" value="CargarAlumnos" id="cargarAlumnosInicial">

<div id="informe-nivel-inicial">
  <div class="accordion nivel-inicial">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <img src="../img/person.png">
          <span>Nombre del Alumno</span>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
          Imforme de progreso del alumno de la etapa seleccionada
        </div>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          <img src="../img/person.png">
          <span>Nombre del Alumno</span>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse">
        <div class="accordion-inner">
          Imforme de progreso del alumno de la etapa seleccionada
        </div>
      </div>
    </div>
  </div>
  <div class="pagination pagination-centered">
    <ul>
      <li class="disabled"><a href="#">Prev</a></li>
      <li class="active"><a href="#">1</a></li>
      <li class="disabled"><a href="#">2</a></li>
      <li class="disabled"><a href="#">3</a></li>
      <li class="disabled"><a href="#">4</a></li>
      <li class="disabled"><a href="#">5</a></li>
      <li class="disabled"><a href="#">Next</a></li>
    </ul>
  </div>
</div>

<style type="text/css">
#informe-nivel-primaria,
#informe-nivel-inicial{
  width: 80%;
  margin: 0 auto;
  padding: 40px;
  margin: 40px;
  background-color: #FFF;
  border: 1px solid #CCC;
}

#informe-nivel-primaria input,
#informe-nivel-primaria select{
  width: 60px;
  margin: 0;
  border: none;
}

#informe-nivel-primaria td{
  border: 1px solid #DDD;
}

.contenedor-filtros h3{
  width: 120px;
  display: inline-block;
}

.contenedor-filtros{
  margin: 40px !important;
  padding: 40px;
  width: 80%;
  background-color: #fff;
  margin: auto;
}
</style>
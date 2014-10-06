<div class="overlay-popup"style = "display:block;"></div>
<div class="perfil-alumno-container" style = "display:block;">
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
			  	<label>Nro Documento</label><input type="text"><br>
			  	<label>Sexo</label><input type="text"><br>
			  	<label>Fecha de Nacimiento</label><input type="text"><br>
			  	<label>Domicilio</label><input type="text"><br>
			  	<label>Telefono Fijo</label><input type="text"><br>
			  	<label>Telefono Movil</label><input type="text"><br>
			  	<label>Estado Civil</label><input type="text"><br>
			  </div>
			  <div class="tab-pane" id="messages">Otros</div>
			</div>
		</div>
	</div>
</div>









<style type="text/css">
	.overlay-popup{
	    width: 100%;
	    height: 100%;
	    position: fixed;
	    background-color: rgba(000, 000, 000, 0.5);
	    top: 0;
	    bottom: 0;
	    z-index: 99;
	 }
	.close-popup{
	    float: right;
	    margin: 10px 10px 0 0;
	    cursor: pointer;
	 }
	.perfil-alumno-container{
		width: 800px;
		margin: 0 auto;
		z-index: 999;
		position: absolute;
		left: 0;
		right: 0;
	}
	.container-left{
		width: 200px;
		float: left;
		text-align: center;
	}
	.container-left img{
		border: 2px solid #ddd;
	}
	.container-right{
		width: 590px;
		display: inline-block;
	}
	.popup-header{
	    background-color: #000;
	    border-radius: 10px 10px 0 0;
	}
	.popup-header h2{
	    margin: 0;
	    color: white;
	    display: inline-block;
	    font-size: 25px;
	    vertical-align: middle;
	}
	.popup-body{
	    padding: 30px 0;
	    background-color: #d1d1d1;
	    border-radius: 0 0 10px 10px;
	    min-height: 400px;
	 }
	 .container-right .tab-pane.active{
	 	border: 1px solid #dddddd;
	 	border-top: 0;
	 	background-color: #fff;
	 	padding: 20px 0 0 10px;
	 }
	 .container-right .nav.nav-tabs{
	 	margin: 0px;
	 }
	 #profile label{
	 	width: 150px;
	 	display: inline-block;
	 }
	 .tutores-alumno{
	 	width: 90px;
	 	height: 90px;
	 }
	 .profile-picture{
	 	width: 150px;
	 	height: 150px;
	 }
</style>
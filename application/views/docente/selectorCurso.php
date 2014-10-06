<div class="overlay-popup" style="display:none"></div>
<div id="selector-asignatura" style="display:none">	
	<div class="popup-header">
		<img class="icono-popup-header" src="img/book.png">
		<h2>Seleccionar una asignatura</h2>
		<div class="close-popup"><img src="img/close.png"></div>
	</div>
	<div class="popup-body" id="selectorBtnAsignatura">
	</div>
</div>



<style type="text/css">
/* START POPUP SELECTOR CURSO */
#selector-curso{
    margin: 0 auto;
    width: 450px;
    z-index: 999;
    position: absolute;
    left: 0;
    right: 0;
    top: 25%;
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
 .btn-cursos{
    display: block;
 }
 .overlay-popup{
    width: 100%;
    height: 100%;
    position: fixed;
    background-color: rgba(000, 000, 000, 0.5);
    top: 0;
    bottom: 0;
    z-index: 99;
 }
 .icono-popup-header{
    display: inline-block;
    margin: 10px;
 }
 .close-popup{
    float: right;
    margin: 10px 10px 0 0;
    cursor: pointer;
 }
 .popup-body .btn{
    border-radius: 0;
 }
 .popup-body{
    padding: 30px;
    background-color: #d1d1d1;
    border-radius: 0 0 10px 10px;
 }
/* END POPUP SELECTOR CURSO */
</style>

var app = app || {};
app.sige = {};

app.sige.init = function() {
    $.ajax({
        type: "post",
        url: "index.php/docente/getCursos",
        dataType: "json",
        success: function(data){
        	app.sige.organizarCursos(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
		{
		 	console.log(textStatus);
		}
    	});
}

app.sige.organizarCursos  = function(data){
	var array_cursos = data;
	for (var i=0; i < array_cursos.length ; i++) {
		var division = array_cursos[i].nombre;
		$('#miscursos').append('<input type="button" value='+division+'>');
	};
}




var app = app || {};
app.sige = {};

app.sige.init = function() {
    $.ajax({
        type: "post",
        url: "index.php/alumno/getAsignaturas",
        dataType: "json",
        success: function(data){
        	app.sige.organizarAsignaturas(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
		{
		 	console.log(textStatus);
		}
    	});
}

app.sige.organizarAsignaturas  = function(data){
	var array_cursos = data;
	for (var i=0; i < array_asginaturas.length ; i++) {
		var division = array_asginaturas[i].nombre;
		$('#misasignaturas').append('<input type="button" value='+division+'>');
	};
}



$("#misAsignaturas").on("click",function(){
    $.ajax({
        url : "alumno/getAsignaturas/100012/2014",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {    
            crearSelectorAsignatura(data);
            console.log("exito");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    });
});
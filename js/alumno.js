$('body').on('click', '#misAportes', function(){
    var aportes = $('.aportes-alumno tr').size()
    if(aportes== 0){   
        $.ajax({
            url: "alumno/getAportes/",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){    
                crearListadoAportes(data);
                console.log("exito");
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    }
})

function crearListadoAportes(data){
    var conte = $('.aportes-alumno');
    if(data.length >= 1){
        for(var i=0; i < data.length; i++){
            var new_line = '<tr><td>'+data[i].nroComprobante+'</td><td>'+data[i].descripcion+'</td><td>'+parseFloat(data[i].importe).toFixed(2)+'</td><td>'+data[i].fecha+'</td></tr>';
            conte.append(new_line);
        }
    }else{
        var sinAportes = "Usted no ha realizado aportes al dia de la fecha.";
        conte.append(sinAportes);
    }
    
    
}

$("#misAsignaturas").on("click",function(){
    var fecha = new Date();
    var año = fecha.getFullYear();
    $.ajax({
        url : "alumno/getAsignaturas/"+año,
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

function crearSelectorAsignatura(data){
    var conte_btn=$("#selectorBtnAsignatura");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<div class='box-asignatura-generica' data-idasignatura='"+data[i].idAsignatura+"'>"+data[i].nombre+"</div>";
        conte_btn.append(newBox);
    }
 }

$('body').on("click",".box-asignatura-generica", function(event){    
    
    var conte_info = $('.contenedor-info');
    var numAsignatura= $(this).data('idasignatura');
    var nombre_asignatura = $(this).text();
    if(!conte_info.size() > 0){        
        $.ajax({
            url : "alumno/cargar_vista_asignatura",
            type: "GET",
            dataType: "html",
            success: function(data, textStatus, jqXHR){            
                $('#asignatura-info-container').append(data);
                $('#selector-asignatura').hide();
                $('.titulo-principal h1').text(nombre_asignatura);
                $('.titulo-principal h1').attr('data-idasignatura', numAsignatura);
                cargarInfoAsignatura(numAsignatura);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    }else{        
        $('#selector-asignatura').hide();
        conte_info.show();
        cargarInfoAsignatura(numAsignatura);
    }
});

$('body').on('click','#programa', function(){
    var numAsignatura = $('.titulo-principal h1').data('idasignatura');
    var numCurso = 9;
    $.ajax({
        url: "curso/getProgramaAsignatura/"+numCurso+"/"+numAsignatura+"",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            cargarPrograma(data);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("fallo");
        }
    })
})

function cargarPrograma(data){
    var conte = $('.contenedor-programa');
    conte.empty();
    /* var new_line = "<div><iframe src='"+data[0].programa+"' style='width:600px; height:500px;' frameborder='0'></iframe></div>";*/
    var new_line = "<div><iframe src='http://red.ilce.edu.mx/sitios/micrositios/cortazar_aniv/pdf/8_Cielo_Rayuela_libro.pdf' style='width:600px; height:500px;' frameborder='0'></iframe></div>";
    conte.append(new_line);
}


$('body').on('click','#info_general', function(){
    var numAsignatura = $('.titulo-principal h1').data('idasignatura');
    var numCurso = $('#curso-alumno').data('cursoid');
    $.ajax({
        url: "curso/getDatosAsignaturas/"+numCurso+"/"+numAsignatura+"",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            cargarInfoCursoGeneral(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarInfoCursoGeneral(data){
    var conte_horarios = $('.info_horarios');
    var conte_docente = $('.info_docente');
    for (var i=0; i<data.length;i++){
        var new_line="<span>"+data[i].diaSemana+" "+data[i].horaInicio+" "+data[i].horaFin+"</span> </br>";
        conte_horarios.append(new_line);
    }
    var new_card="<img src=''><label>"+data[0].apellido+", "+data[0].nombre+" </br> "+data[0].correoElectronico+"</label><label></label></br><a target='_blank' href='"+data[0].curriculumVitae+"'> ver cv</a>";
    conte_docente.append(new_card);
}

$(document).ready(function(){
    buscarMiCurso();
})

function buscarComunicadoWeb(curso){
    $.ajax({
         url: "curso/getComunicadoWeb/"+curso,
         type:"GET",
         dataType: "json",
         success: function(data, textStatus, jqXHR){
            console.log(data);
            cargarComunicadoWeb(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            var data = {};
            console.log("fallo");
            cargarComunicadoWeb(data);
        }
    }) 
}

function buscarMiCurso(){
    var fecha = new Date();
    var año = fecha.getFullYear();
    $.ajax({
         url: "curso/getMiCurso/"+año,
         type:"GET",
         dataType: "json",
         success: function(data, textStatus, jqXHR){
            console.log(data);
            $('body').prepend('<div id="curso-alumno" data-cursoid="'+data[0].idCurso+'" style="display: none;"></div>');
            buscarComunicadoWeb(data[0].idCurso);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            var data = {};
            console.log("fallo");
            cargarComunicadoWeb(data);
        }
    }) 
}

$('#lista-mensajes h3').on('click',function(){
    if($('#page-wrap').hasClass('vertical')){
        $('#page-wrap').removeClass('vertical');
    }else{
        $('#page-wrap').addClass('vertical');
    }
})

$('body').on('click', '#misDatos', function(){
    
    $.ajax({
        url : "alumno/getDatosAlumno/",
        type: "GET",
        dataType: "json",
        success: function(data, textStatus, jqXHR){
            console.log(data);
            cargarDatosAlumno(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    });
});

function cargarDatosAlumno(data){
    $('#perfil-nombre-completo').val(data[0].apellido+', '+data[0].nombre);   
    $('#perfil-dni').val(data[0].nroDocumento);
    $('#perfil-sexo').val(data[0].sexo);
    $('#perfil-fecha-nac').val(data[0].fechaNacimiento);
    $('#perfil-nacionalidad').val(data[0].nacionalidad);
    $('#perfil-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#perfil-tel-fijo').val(data[0].telefonoFijo);
    $('#perfil-tel-movil').val(data[0].telefonoMovil);
    $('#perfil-mail').val(data[0].correoElectronico);
    $('#perfil-lugar-nac').val(data[0].lugarNacimiento);

    $('#perfil-legajo').val(data[0].legajoAlumno);
    $('#perfil-estado').val(data[0].estado);
    $('#perfil-inasistencias').val(data[0].inasistencias);
    $('#perfil-curso').val(data[0].division +' '+data[0].seccion);    
}


$('body').on('click', '#misDocentes', function(){
    var idCurso = $('#curso-alumno').data('cursoid');
    $.ajax({
        url: 'curso/getMisDocentes/'+ idCurso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarMisDocentes(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarMisDocentes(data){
    var conte = $('#listadoDocentes');
    for (var i = 0; i < data.length; i++) {
        var newLine = '<div><div><img src="img/alumno.png"></div><div><h4>'+data[i].apellido+''+data[i].nombre+'</h4><span>'+data[i].asignatura+'</span><span>'+data[i].correoElectronico+'</span></div></div></div>';
        conte.append(newLine);
    };
    $('#conte-listado-docentes').show();
    $('.overlay-popup').show();
}

$('body').on('click', '#misHorarios', function(){
    var idCurso = $('#curso-alumno').data('cursoid');
    $.ajax({
        url: 'curso/getMisHorarios/'+ idCurso,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarMisHorarios(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarMisHorarios(data){
    console.log(data);
    var conte = $('.cuerpo-tabla-horarios');
    var newLine = "";
    for (var i = 0; i < data.Lunes.length; i++) {
        var newLine = "<tr><td>"+data.Lunes[i].nombre+"</br>"+data.Lunes[i].horaInicio+" - "+data.Lunes[i].horaFin+"</td><td>"+data.Martes[i].nombre+"</br>"+data.Martes[i].horaInicio+" - "+data.Martes[i].horaFin+"</td><td>"+data.Miércoles[i].nombre+"</br>"+data.Miércoles[i].horaInicio+" - "+data.Miércoles[i].horaFin+"</td><td>"+data.Jueves[i].nombre+"</br>"+data.Jueves[i].horaInicio+" - "+data.Jueves[i].horaFin+"</td><td>"+data.Viernes[i].nombre+"</br>"+data.Viernes[i].horaInicio+" - "+data.Viernes[i].horaFin+"</td></tr>";      
        conte.append(newLine);
    };
    $('#conte-listado-horarios').show();
    $('.overlay-popup').show();
}

$('body').on('click', '#misTutores', function(){
    $.ajax({
        url: 'alumno/getTutor/',
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarDatosTutor(data);            
            $(".overlay-popup").show();
            $(".perfil-tutor-container").show();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

function cargarDatosTutor(data){
    $('#idTutor').attr('data-idtutor', data[0].idTutor);
    $('#perfil-nombre-header').text(data[0].apellido+', '+data[0].nombre);
    $('#tutor-dni').val(data[0].nroDocumento);
    $('#tutor-sexo').val(data[0].sexo);
    $('#tutor-fecha-nac').val(data[0].fechaNacimiento);
    $('#tutor-estado').val(data[0].estado);
    $('#tutor-domicilio').val(data[0].calle+" "+data[0].numero +" "+data[0].piso+" "+data[0].departamento );
    $('#tutor-tel-fijo').val(data[0].telefonoFijo);
    $('#tutor-tel-movil').val(data[0].telefonoMovil);
    $('#tutor-mail').val(data[0].correoElectronico);  
}

$('body').on('click', '#retirarPersonas', function(){
    // Buscar tutor en las cookies
    cargarPersonasAutorizadas();
})

function cargarPersonasAutorizadas(){
    var idTutor = $('#idTutor').data('idtutor');
    $.ajax({
        url: 'alumno/get_personasAutorizadas/'+ idTutor,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            var conte = $('#listadoAutorizados');
            conte.empty();
            var newLine = "";
            for (var i = 0; i < data.length; i++) {
                var newLine = "<tr data-tutor='"+data[i].idTutor+"' data-autorizado='"+data[i].nroDocumento+"'><td><span class='eliminarAutorizado button'> X </span></td><td><input type='text' value='"+data[i].apellido+"'></td><td><input type='text' value='"+data[i].nombre+"'></td><td><input type='text' value='"+data[i].nroDocumento+"'</td><td><input type='text' value='"+data[i].telefono+"'</td><td><input type='text' value='"+data[i].relacion+"'</td><td><span class='editarAutorizado button'>Update</span></td><td><span class='button'>span</Edit></td></tr>";      
                conte.append(newLine);
            };
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

$('body').on('click', '.editarAutorizado', function(){
    // Buscar tutor en las cookies
    var infoAutorizado = $(this).parent().parent();
    var persona = {};
    persona.idTutor = infoAutorizado.data('tutor');
    persona.nombreCompleto = infoAutorizado.children().children().eq(0).val();
    persona.nroDocumento = infoAutorizado.children().children().eq(1).val();
    persona.telefono = infoAutorizado.children().children().eq(2).val();
    persona.relacion = infoAutorizado.children().children().eq(3).val();

    console.log(persona);
})

$('body').on('click', '.eliminarAutorizado', function(){
    // Buscar tutor en las cookies
    var idTutor = $(this).parent().parent().data('tutor');
    var nroDoc = $(this).parent().parent().data('autorizado');
    $.ajax({
        url: 'alumno/delete_personasAutorizadas/'+ idTutor+"/"+nroDoc,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito");
            cargarPersonasAutorizadas();
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
})

$('body').on('click', '#agregarPermitidas', function(){
    var persona = {};
    persona.idTutor = $('#idTutor').data('idtutor');
    persona.nombreCompleto = $('#permita-nombre').val();
    persona.nroDocumento = $('#permita-dni').val();
    persona.telefono = $('#permita-num').val();
    persona.relacion = $('#permita-relacion').val();

    $.ajax({
        url: 'alumno/set_personasAutorizadas/'+ persona.idTutor+"/"+ persona.nombreCompleto+"/"+ persona.nroDocumento+"/"+ persona.telefono+"/"+ persona.relacion,
        type: 'POST',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log("Exito Guardando");
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("Fallo Guardando");
            cargarPersonasAutorizadas();
            $('#permita-idTutor').val('');
            $('#permita-nombre').val('');
            $('#permita-dni').val('');
            $('#permita-num').val('');
            $('#permita-relacion').val('');
        }
    })
})
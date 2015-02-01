$(document).ready(function(){
    buscarMiCurso();

    $('body').find('#lista-mensajes h3').on('click',function(){
        if($('#page-wrap').hasClass('vertical')){
            $('#page-wrap').removeClass('vertical');
        }else{
            $('#page-wrap').addClass('vertical');
        }
    })

    $('body').on('click', '#misAportes', function(){
        var aportes = $('.aportes-alumno tr').size()
        if(aportes== 0){   
            $.ajax({
                url: "alumno/getAportes/",
                type: "GET",
                dataType: "json",
                success: function(data, textStatus, jqXHR){    
                    crearListadoAportes(data);
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("fallo");
                }
            })
        }
    })

    $('body').on('click', '#misDatos', function(){    
        $.ajax({
            url : "alumno/getDatosAlumno/",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarDatosAlumno(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    });


    $('body').on('click', '#misDocentes', function(){
        var idCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: 'curso/getMisDocentes/'+ idCurso,
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarMisDocentes(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#misHorarios', function(){
        var idCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: 'curso/getMisHorarios/'+ idCurso,
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarMisHorarios(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#temas-dictados', function(){
        updateListaTemario();
    })

    $('body').on('click','#misAsignaturas, #misNotas',function(){
        var fecha = new Date();
        var año = fecha.getFullYear();
        var origen = $(this).attr('id');
        $.ajax({
            //url : "alumno/getAsignaturas/"+año,
            url : "alumno/getAsignaturas/2014",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                if( origen == 'misNotas'){                    
                    crearTablaNotasAsignaturas(data);                    
                }else{
                    crearSelectorAsignatura(data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
    });

    $('body').on('click', '.user-right img', function(event){
        event.stopPropagation();
        if($('.user-options').is(':visible')){
            $('.user-options').hide();
        }else{
            $('.user-options').show()
        }

        $('html').one('click', function(){
            $('.user-options').hide();
        })
        
    })

    $('body').on('click', '#change-user-pass', function(){
        $('.overlay-change-pass').show();
        $('.change-pass-container').show();
    })

    $('body').on("mouseover",".asignaturas-curso", function(event){    
        $(this).find('.option-asignaturas').show();
    });

    $('body').on("mouseleave",".asignaturas-curso", function(event){    
        $(this).find('.option-asignaturas').hide();
    });

    $('body').on("mouseleave",".show-opciones", function(event){    
        $(this).hide();
    });

    $('body').on("mouseover",".option-asignaturas", function(event){    
        $(this).parent().find('.show-opciones').show();
    });

    $('body').on("mouseleave",".option-asignaturas", function(event){    
        if($(this).parent().find('.show-opciones').is(':hover')){

        }else{
            $(this).parent().find('.show-opciones').hide();
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
                cargarPrograma(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log("fallo");
            }
        })
    })

    $('body').on('click','#info_general', function(){
        var numAsignatura = $('.titulo-principal h1').data('idasignatura');
        var numCurso = $('#curso-alumno').data('cursoid');
        $.ajax({
            url: "curso/getDatosAsignaturas/"+numCurso+"/"+numAsignatura+"",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                cargarInfoCursoGeneral(data);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#misTutores', function(){
        $.ajax({
            url: 'alumno/getTutor/',
            type: 'GET',
            dataType: 'json',
            success: function(data, textStatus, jqXHR){
                cargarDatosTutor(data);            
                $(".overlay-popup").show();
                $(".perfil-tutor-container").show();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        })
    })

    $('body').on('click', '#retirarPersonas', function(){
        // Buscar tutor en las cookies
        cargarPersonasAutorizadas();
    })
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
});

function crearListadoAportes(data){
    var conte = $('.aportes-alumno');    
    conte.empty();
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

function crearTablaNotasAsignaturas(asignaturas){
    var nivel = $('#curso-alumno').data('nivel');
    $.ajax({
            //url : "alumno/getAsignaturas/"+año,
            url : "alumno/getNotasAlumno/2014",
            type: "GET",
            dataType: "json",
            success: function(data, textStatus, jqXHR){
                if (nivel != "Inicial"){
                    $('#informe-nivel-primaria').show();
                    $('#informe-nivel-inicial').hide();
                    if($('#listado-primario-notas').children().size() < 1){    
                        var cant_columns = checkMayorCantNotas(data);
                        cargarInfoTablaNotas(asignaturas, data, cant_columns);
                    }    
                }else{                    
                    $('#informe-nivel-inicial').show();
                    $('#informe-nivel-primaria').hide();
                    if($('.accordion-group').size() < 1){
                        cargarNotasInicial(asignaturas, data);    
                    }                    
                }                
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log("fallo");
            }
        });
}

function cargarInfoTablaNotas(asignaturas,notas, cant_columns){
    var conte = $('#listado-primario-notas');
    conte.empty();
    //Creamos la cabecera
    var conteCabecera = $('#cabecera-notas');
    cant_columns = cant_columns + 3;
    var new_cabecera = "";
    for (var i = 0; i < cant_columns; i++) {
        if(i == 0){
            new_cabecera = "<td>Asignatura</td>";
        }else{
            if(i+1 != cant_columns){
                new_cabecera = "<td>Nota</td>";
            }else{
                new_cabecera = "<td>Promedio</td>";
            }
        }
        conteCabecera.append(new_cabecera);    
    };

    for (var i = 0; i < asignaturas.length; i++) {
        var new_line = "<tr>";
        var conta = 0;
        var idAsignatura = asignaturas[i].idAsignatura;        
        new_line += "<td>"+asignaturas[i].nombre+"</td>";
        var array_notas = getArrayNotas(notas, idAsignatura);
        console.log('Asignatura: '+asignaturas[i].nombre);
        for (var j = 0; j < cant_columns-1; j++) {
            if(typeof array_notas[j] != "undefined"){
                console.log('calificacion: '+array_notas[j].calificacion);
                new_line += "<td>"+array_notas[j].calificacion+"</td>";
                conta++;
            }else{
                new_line += "<td></td>";                
            }            
        };
        new_line += "</tr>";
        console.log('Fin fila');
        conte.append(new_line);
    };
}

function cargarNotasInicial(asignaturas, notas){
    var conte_btn = $('.accordion.nivel-inicial');
    conte_btn.empty();
    for (var i=0; i<asignaturas.length;i++){
        var idAsignatura = asignaturas[i].idAsignatura;
        var array_notas = getArrayNotas(notas, idAsignatura);
        var primera = " ";
        var segunda = " ";
        if (array_notas.length > 0){
            primera = (typeof array_notas[0] != "undefined") ? array_notas[0].calificacion : " ";
            segunda = (typeof array_notas[1] != "undefined") ? array_notas[1].calificacion : " ";
        };
        var newBox='<div class="accordion-group '+asignaturas[i].idAsignatura+' "><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'+i+'"><img src="../img/person.png"><span>'+asignaturas[i].nombre+'</span></a></div><div id="collapse'+i+'" class="accordion-body collapse"><div class="accordion-inner"><h4></h4><div><textarea disabled>'+primera+'</textarea></div><div><textarea disabled>'+segunda+'</textarea></div><span id="modificadoPor"></div></div></div>';
        conte_btn.append(newBox);
    }

}

function getArrayNotas(notas, idAsignatura){
    var notas_arr = [];
    for (var i = 0; i < notas.length; i++) {
        if(notas[i].idAsignatura == idAsignatura){
            notas_arr.push(notas[i]);
        }
    };
    return notas_arr;
}

function checkMayorCantNotas(data){
    var idAsignatura = "";
    var contador = 0;
    var mayor = {};
    mayor.cont = 0;
    for (var i = 0; i < data.length; i++) {
        if(i == 0){
            var idAsignatura = data[i].idAsignatura;
            contador++;
        }else{
            if(data[i].idAsignatura == idAsignatura){
                contador++;
            }else{
                if(contador > mayor.cont){
                    mayor.id = idAsignatura;
                    mayor.cont = contador;
                }                
                var idAsignatura = data[i].idAsignatura;
                contador = 1;
            }
        }
    };
    return mayor.cont;
}

function crearSelectorAsignatura(data){
    var conte_btn=$("#selectorBtnAsignatura");
    conte_btn.empty();
    for (var i=0; i<data.length;i++){
        var newBox="<li class='asignaturas-curso' data-idasignatura='"+data[i].idAsignatura+"'><label>"+data[i].nombre+"</label><img src='../img/setting.png' class='option-asignaturas'/><span><div class='show-opciones' style='display:none;'><ul><li><a class='ver-temario'>Temario Dictado</a></li><li><a target='_blank' href='"+data[i].programa+"'>Programa</a></li><li><a class='info_curso'>Info General</a></li></ul></div></span></li>";
        conte_btn.append(newBox);
    }
 }

function cargarPrograma(data){
    var conte = $('.contenedor-programa');
    conte.empty();
    /* var new_line = "<div><iframe src='"+data[0].programa+"' style='width:600px; height:500px;' frameborder='0'></iframe></div>";*/
    var new_line = "<div><iframe src='http://red.ilce.edu.mx/sitios/micrositios/cortazar_aniv/pdf/8_Cielo_Rayuela_libro.pdf' style='width:600px; height:500px;' frameborder='0'></iframe></div>";
    conte.append(new_line);
}

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

function buscarComunicadoWeb(curso){
    $.ajax({
         url: "curso/getComunicadoWeb/"+curso,
         type:"GET",
         dataType: "json",
         success: function(data, textStatus, jqXHR){
            cargarComunicadoWeb(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            var data = {};
            cargarComunicadoWeb(data);
        }
    }) 
}

function cargarComunicadoWeb(data){
    var conte = $("#lista-mensajes");
    var conte_popup = $("#mensajes_popup");
    if(data.length >= 1){
        var cant = data.length;
        if(data.length > 3 ){
            cant = 3;
        }
        $("#cantMensajes").text("(" + data.length+")");
        for (var i = 0 ; i<cant; i++){
            var nuevaLinea = "<div class='contenedor-comunicados'><p>"+data[i].comunicado+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p></div>";
            conte.append(nuevaLinea);
        }
        for (var i = 0 ; i<data.length; i++){
            var newMensaje = "<div class='contenedor-comunicados'><p>"+data[i].comunicado+" </p><p><strong>"+data[i].apellido+" "+data[i].nombre+" - "+data[i].fecha+" </strong></p></div>";
            conte_popup.append(newMensaje);
        }
    }else{
        var sinMensajes = "<div class='contenedor-comunicados sin-comunicados' > Este curso no tiene mensajes nuevos </div>";
        conte.append(sinMensajes);
    }
}

function buscarMiCurso(){
    var fecha = new Date();
    var año = fecha.getFullYear();
    $.ajax({
         //url: "curso/getMiCurso/"+año,
         url: "curso/getMiCurso/2014",
         type:"GET",
         dataType: "json",
         success: function(data, textStatus, jqXHR){
            $('body').prepend('<div id="curso-alumno" data-cursoid="'+data[0].idCurso+'" data-nivel="'+data[0].nombre+'" style="display: none;"></div>');
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

function cargarMisDocentes(data){
    var conte = $('#listadoDocentes');
    for (var i = 0; i < data.length; i++) {
        var newLine = '<div><div><img src="img/alumno.png"></div><div><h4>'+data[i].apellido+''+data[i].nombre+'</h4><span>'+data[i].asignatura+'</span><span>'+data[i].correoElectronico+'</span></div></div></div>';
        conte.append(newLine);
    };
    $('#conte-listado-docentes').show();
    $('.overlay-popup').show();
}

function updateListaTemario(){    
    var curso = $('#curso-alumno').data('cursoid');
    var asignatura = $('.contenedor-info').find('h1').data('idasignatura')
    $.ajax({
        url: 'curso/getTemasDictados/'+ curso+"/"+asignatura,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){            
            listarTemasAsignatura(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log("fallo");
        }
    })
}

function listarTemasAsignatura(data){
    var conte = $('#listadoTemasDictados');
        conte.empty();
    var newLine = "";
    for (var i = 0; i < data.length; i++) {
        newLine="<div class='tema-dictado'><div class='texto_tema_dictado'>"+data[i].temasClase+"</div><span>"+data[i].apellido+", "+data[i].nombre+"</span><span>"+data[i].fechaPublicacion+"</span><div class='separate-line'></div></div>";
        conte.append(newLine);
    };
}

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

function cargarPersonasAutorizadas(){
    var idTutor = $('#idTutor').data('idtutor');
    $.ajax({
        url: 'alumno/get_personasAutorizadas/'+ idTutor,
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
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
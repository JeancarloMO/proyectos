$(document).ready(function() {
    inicio();
    mostrarArchivos();
    $("#boton_subir").on('click', function() {
        subirArchivos();
    });
    $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
        var archivo = $(this).parents('tr').eq(0).find('.arc').text();
        archivo = $.trim(archivo);
        eliminarArchivos(archivo);
    });
});

function inicio(){
    /*$("#btn-importar").prop("disabled", true);*/
    limpiar();
    /*document.getElementById("nombre_archivo").focus();*/
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    /*$("#turno").prop("disabled", isNot);*/
}

function limpiar(){
    $('input[type="text"]').val('');
    $('input[type="file"]').val('');
    $('select').val('');
}

function subirArchivos() {
    $("#archivo").upload('procesos/subir_archivo.php',
                         {
        nombre_archivo: $("#nombre_archivo").val()
    },
                         function(respuesta) {
        //Subida finalizada.
        $("#barra_de_progreso").val(0);
        if (respuesta === 1) {
            mostrarRespuesta('El archivo ha sido subido correctamente.', true);
            $("#nombre_archivo, #archivo").val('');
        } else {
            mostrarRespuesta('El archivo NO se ha podido subir.', false);
        }
        mostrarArchivos();
    }, function(progreso, valor) {
        //Barra de progreso.
        $("#barra_de_progreso").val(valor);
    });
}
function eliminarArchivos(archivo) {
    $.ajax({
        url: 'procesos/eliminar_archivo.php',
        type: 'POST',
        timeout: 10000,
        data: {archivo: archivo},
        error: function() {
            mostrarRespuesta('Error al intentar eliminar el archivo.', false);
        },
        success: function(respuesta) {
            if (respuesta == 1) {
                mostrarRespuesta('El archivo ha sido eliminado.', true);
            } else {
                mostrarRespuesta('Error al intentar eliminar el archivo.', false);                            
            }
            mostrarArchivos();
        }
    });
}
function mostrarArchivos() {
    $.ajax({
        url: 'procesos/mostrar_archivos.php',
        dataType: 'JSON',
        success: function(respuesta) {
            if (respuesta) {
                var html = '';
                var cont = 0;
                for (var i = 0; i < respuesta.length; i++) {
                    if (respuesta[i] != undefined) {
                        cont = cont+1;
                        html += '<tr><td class="text-center">'+ cont +'</td><td class="arc text-center">' + respuesta[i] + '</td><td class="text-center"><< <a href="archivos/' + respuesta[i] + '" target="_blank" class="font-weight-bold">Link del archivo</a> >></td><td class="text-center"><a class="eliminar_archivo btn btn-sm btn-danger p-0 pr-2 font-weight-bold" href="javascript:void(0);"><i class="fa fa-close tam-icon px-2"></i>Eliminar</a></td></tr>';
                    }
                }
                $("#archivos_subidos").html(html);
            }
        }
    });
}
function mostrarRespuesta(mensaje, ok){
    $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
    if(ok){
        $("#respuesta").addClass('alert-success');
    }else{
        $("#respuesta").addClass('alert-danger');
    }
}
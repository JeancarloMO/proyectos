$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot) {
    isNot = !isNot;
    $("#codigo").prop("disabled", isNot);
    $("#asunto").prop("disabled", isNot);
    $("#area_remitente").prop("disabled", isNot);
    $("#area_recepciona").prop("disabled", isNot);
    $("#fecha").prop("disabled", isNot);
}

function limpiar() {
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('input[type="file"]').val('');
    $('textarea').val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function cancelar() {
    inicio();
    $("#miModalMulti .close").click();
}

function modalDocumentos() {
    $('#miModalBuscarDocumentos').modal('show');
    $('#miModalBuscarDocumentos').on('shown.bs.modal', function() {
        $('#area_buscarlista').focus();
    });
}

function registrarOficio() {
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(4);
    datosRegistro[0] = $("#codigo").val();
    datosRegistro[1] = $("#asunto").val();
    datosRegistro[2] = $("#area_remitente").val();
    datosRegistro[3] = $("#area_recepciona").val();
    datosRegistro[4] = $("#fecha").val();

    if (datosRegistro[0] == "" || datosRegistro[1] == "" || datosRegistro[2] == "" || datosRegistro[3] == "" || datosRegistro[4] == "") {

        modalOKI(1);

    } else {

        $.post("procesos/registrar.php", { valor: datosRegistro }, function(mensaje) {
            if (mensaje == "OK") {

                $("#archivo").upload('procesos/subirArchivos.php', {
                    codigo: datosRegistro[0]
                }, function(respuesta) {
                    if (respuesta === 1) {
                        modalOKI(2);
                        inicio();
                    } else if (respuesta === 3) {
                        alert("solo archivos pdf");
                        limpiar();
                    }
                });

            } else if (mensaje == "NUL") {
                modalOKI(4);
            } else {
                modalOKI(6);
            }
        });

    }

}

function editar(dato) {
    $.post("procesos/editarDatos.php", { valor: dato }, function(mensaje) {
        var cadena = mensaje.split("|")

        document.getElementById("codigo").value = cadena[0];
        document.getElementById("descripcion").value = cadena[1];
        document.getElementById("area").value = cadena[2];
        document.getElementById("inicio").value = cadena[3];

        if (cadena[4] != "1900-01-01") {
            document.getElementById("fin").value = cadena[4];
        } else {
            document.getElementById("fin").value = "";
        }

        modificar();

    });

}

function modificarActividad() {
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(4);
    datosRegistro[0] = $("#codigo").val();
    datosRegistro[1] = $("#descripcion").val();
    datosRegistro[2] = $("#area").val();
    datosRegistro[3] = $("#inicio").val();
    datosRegistro[4] = $("#fin").val();

    if (datosRegistro[1] == "" || datosRegistro[2] == "" || datosRegistro[3] == "") {

        modalOKI(1);

    } else {

        $.post("procesos/modificar.php", { valor: datosRegistro }, function(mensaje) {
            if (mensaje == "OK") {
                modalOKI(3);
                inicio();
                lista();
            } else if (mensaje == "NUL") {
                modalOKI(4);
            } else {
                modalOKI(6);
            }
        });

    }

}

function eliminarActividad(cod) {
    $("#miModalMulti .close").click();

    $.post("procesos/eliminar.php", { valor: cod }, function(mensaje) {
        if (mensaje == "OK") {
            modalOKI(5);
            inicio();
            lista();
        } else if (mensaje == "NUL") {
            modalOKI(4);
        } else {
            modalOKI(6);
        }
    });
}

function actualizarObs() {

    var cod = document.getElementById("obs_codigo").value;
    var obs = document.getElementById("obs").value;

    $.post("procesos/actualizarObs.php", { valor: obs, codigo: cod }, function() {
        $("#miModalObs .close").click();
    });

}

function modalObs(dato) {

    $.post("procesos/obs.php", { valor: dato }, function(mensaje) {

        var cadena = mensaje.split("|")

        var codigo = cadena[0];
        var alumno = '<span class="font-weight-bold">Actividad</span>: ' + cadena[1];
        var obs = cadena[2];

        $("#obs_alumno").html(alumno);
        document.getElementById("obs_codigo").value = codigo;
        document.getElementById("obs").value = obs;

        $('#miModalObs').modal('show');
        $('#miModalObs').on('shown.bs.modal', function() {
            $('#obs').focus();
        });

    });

}

function habilitarActividad(cod) {
    $("#miModalMulti .close").click();

    $.post("procesos/habilitar.php", { valor: cod }, function(mensaje) {
        if (mensaje == "OK") {
            modalOKI(5);
            inicio();
            finalizados();
        } else if (mensaje == "NUL") {
            modalOKI(4);
        } else {
            modalOKI(6);
        }
    });
}

function finalizar(cod) {
    $("#miModalMulti .close").click();

    $.post("procesos/finalizar.php", { valor: cod }, function(mensaje) {
        if (mensaje == "OK") {
            modalOKI(5);
            inicio();
            finalizados();
        } else if (mensaje == "NUL") {
            modalOKI(4);
        } else {
            modalOKI(6);
        }
    });
}

function modalEliminar(des, est) {
    var text = "";
    switch (des) {
        case 1:
            text = "¿Finalizar Actividad?";
            $("#eventoTotal").attr('onclick', 'eliminarActividad(' + est + ');');
            break;
        case 2:
            text = "¿Habilitar Actividad?";
            $("#eventoTotal").attr('onclick', 'habilitarActividad(' + est + ');');
            break;
        case 3:
            text = "¿Finalizar Completamente la Actividad?";
            $("#eventoTotal").attr('onclick', 'finalizar(' + est + ');');
            break;
        default:
            console.log("NOTIFICACIÓN E-002");
            text = "NOTIFICACIÓN E-002";
            break;
    }

    document.getElementById('modalConcepto').textContent = text;
    $('#miModalMulti').modal('show');
    $('#miModalMulti').on('shown.bs.modal', function() {
        $('#cerrarMulti').focus();
    });
}

function modalMulti(des) {
    var text = "";
    switch (des) {
        case 1:
            text = "¿Deseas Registrarlo?";
            $("#eventoTotal").attr('onclick', 'registrarOficio();');
            break;
        case 2:
            text = "¿Deseas Modificarlo?";
            $("#eventoTotal").attr('onclick', 'modificarActividad();');
            break;
        case 3:
            text = "¿Deseas Cancelarlo?";
            $("#eventoTotal").attr('onclick', 'cancelar();');
            break;
        default:
            console.log("NOTIFICACIÓN E-002");
            text = "NOTIFICACIÓN E-002";
            break;
    }

    document.getElementById('modalConcepto').textContent = text;
    $('#miModalMulti').modal('show');
    $('#miModalMulti').on('shown.bs.modal', function() {
        $('#cerrarMulti').focus();
    });
}

function modalOKI(des) {
    var text = "";
    switch (des) {
        case 1:
            text = "Los Campos estan vacios.";
            break;
        case 2:
            text = "Se Registro Correctamente.";
            break;
        case 3:
            text = "Se Modifico Correctamente.";
            break;
        case 4:
            text = "Error al Ejecutar la Operación.";
            break;
        case 5:
            text = "Se Finalizó la Actividad Correctamente.";
            break;
        default:
            console.log("NOTIFICACIÓN E-003");
            text = "NOTIFICACIÓN E-003";
            break;
    }

    document.getElementById('OKIconcepto').textContent = text;
    $('#miModalOKI').modal('show');
    $('#miModalOKI').on('shown.bs.modal', function() {
        $('#cerrarOKI').focus();
    });
}
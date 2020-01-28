$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#btn-dh").prop("disabled", false);
    $("#btn-hb").prop("disabled", true);
    $("#buscarlista").prop("disabled", true);
    $("#th_entrega").addClass("d-none");
    $("#th_adm").addClass("d-none");
    $("#filtrarUsuarioP").removeClass("d-none");
    $("#filtrarUsuarioF").addClass("d-none");
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot) {
    isNot = !isNot;
    $("#codigo").prop("disabled", isNot);
    $("#descripcion").prop("disabled", isNot);
    $("#area").prop("disabled", isNot);
    $("#inicio").prop("disabled", isNot);
    $("#fin").prop("disabled", isNot);
}

function limpiar() {
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('textarea').val('');
    $('select').val('');
}

function limpiar2() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('textarea').val('');
    $('#responsable').val('');
    controlAdd(false);
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
    lista();
    $("#miModalMulti .close").click();
}

function filtrarUsuarioP() {

    var usuario = $("#filtrarUsuarioP").val();

    $.post("procesos/filtrarUsuarioP.php", { valor: usuario }, function(mensaje) {
        $("#contenido").html(mensaje);
        limpiar2();
    })
}

function filtrarUsuarioF() {

    var usuario = $("#filtrarUsuarioF").val();

    $.post("procesos/filtrarUsuarioF.php", { valor: usuario }, function(mensaje) {
        $("#contenido").html(mensaje);
        limpiar2();
    })
}

function registrarActividad() {
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(4);
    datosRegistro[0] = $("#descripcion").val();
    datosRegistro[1] = $("#area").val();
    datosRegistro[2] = $("#inicio").val();
    datosRegistro[3] = $("#fin").val();
    datosRegistro[4] = $("#responsable").val();

    if (datosRegistro[0] == "" || datosRegistro[1] == "" || datosRegistro[2] == "" || datosRegistro[4] == "") {

        modalOKI(1);

    } else {

        $.post("procesos/registrar.php", { valor: datosRegistro }, function(mensaje) {
            if (mensaje == "OK") {
                modalOKI(2);
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

function lista() {
    $.post("procesos/listaActividades.php", function(mensaje) {
        $("#th_entrega").addClass("d-none");
        $("#th_adm").addClass("d-none");
        $("#filtrarUsuarioP").removeClass("d-none");
        $("#filtrarUsuarioF").addClass("d-none");
        $("#obs").prop("readonly", false);
        $("#obs_btns").removeClass("d-none");
        $("#contenido").html(mensaje);
        limpiar2();
        $('#filtrarUsuarioP').val('');
    });

    $("#btn-dh").prop("disabled", false);
    $("#btn-hb").prop("disabled", true);
    $("#buscarlista").prop("disabled", true);
}

function finalizados() {
    $.post("procesos/listaFinalizados.php", function(mensaje) {
        $("#th_entrega").removeClass("d-none");
        $("#th_adm").removeClass("d-none");
        $("#filtrarUsuarioP").addClass("d-none");
        $("#filtrarUsuarioF").removeClass("d-none");
        $("#obs").prop("readonly", true);
        $("#obs_btns").addClass("d-none");
        $("#contenido").html(mensaje);
        limpiar2();
        $('#filtrarUsuarioF').val('');
    });

    $("#btn-dh").prop("disabled", true);
    $("#btn-hb").prop("disabled", false);
    $("#buscarlista").prop("disabled", false);
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
            $("#eventoTotal").attr('onclick', 'registrarActividad();');
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
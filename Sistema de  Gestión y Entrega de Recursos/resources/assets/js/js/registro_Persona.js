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
    $("#codigo").val('');
    $("#buscarlista").val('');
}

function controlAdd(isNot) {
    isNot = !isNot;
    $('input[type="text"]').prop("disabled", isNot)
    $('select').prop("disabled", isNot)
}

function limpiar() {
    $('input[type="text"]').val('');
    $('select').val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
    limpiar();
    generarCodigo();
    $('#apellidos').focus();
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function cancelar() {
    $.confirm({
        title: 'Alerta!',
        content: '¿ Desea Cancelar el Registro ?',
        buttons: {
            SI: function() {
                inicio();
                buscarlista();
                $.alert('Operación Cancelada !');
            },
            NO: function() {}
        }
    });
}


/* CODIGO PERSONA */

function generarCodigo() {

    var datos = new FormData();
    datos.append("ajax", "generarCodigoPersona");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            document.getElementById("codigo").value = mensaje;

        }

    })

}

/* REGISTRAR PERSONA */

function registrarPersona() {

    var codigo = $("#codigo").val();
    var apellidos = $("#apellidos").val();
    var nombres = $("#nombres").val();
    var documento = $("#documento").val();
    var nro_documento = $("#nro_documento").val();
    var obs = $("#obs").val();

    if (codigo == "" || apellidos == "" || nombres == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarApellidos", apellidos);
        datos.append("enviarNombres", nombres);
        datos.append("enviarDocumento", documento);
        datos.append("enviarNro_documento", nro_documento);
        datos.append("enviarObs", obs);
        datos.append("ajax", "registrarPersona");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar al Personal ?',
            buttons: {
                SI: function() {

                    $.ajax({

                        url: "resources/views/layouts/ajax/registro.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(mensaje) {

                            if (mensaje == "OK") {
                                $.alert('Se Registró Correctamente !');
                                inicio();
                                buscarlista();
                            } else if (mensaje == "NUL") {
                                $.alert('Error de Inserción !');
                            } else {
                                $.alert('Error de Inserción !');
                            }

                        }

                    })

                },
                NO: function() {}
            }
        });

    }

}

/* SELECCIONAR EDITAR DATOS PERSONA */

function seleccionarPersona(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarPersona");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            var cadena = mensaje.split("|")

            document.getElementById("codigo").value = cadena[0];
            document.getElementById("apellidos").value = cadena[1];
            document.getElementById("nombres").value = cadena[2];
            document.getElementById("documento").value = cadena[3];
            document.getElementById("nro_documento").value = cadena[4];
            document.getElementById("obs").value = cadena[5];

            modificar();

        }

    })

}

/* MODIFICAR PERSONA */

function modificarPersona() {

    var codigo = $("#codigo").val();
    var apellidos = $("#apellidos").val();
    var nombres = $("#nombres").val();
    var documento = $("#documento").val();
    var nro_documento = $("#nro_documento").val();
    var obs = $("#obs").val();

    if (codigo == "" || apellidos == "" || nombres == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarApellidos", apellidos);
        datos.append("enviarNombres", nombres);
        datos.append("enviarDocumento", documento);
        datos.append("enviarNro_documento", nro_documento);
        datos.append("enviarObs", obs);
        datos.append("ajax", "modificarPersona");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Modificar al Personal ?',
            buttons: {
                SI: function() {

                    $.ajax({

                        url: "resources/views/layouts/ajax/registro.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(mensaje) {

                            if (mensaje == "OK") {
                                $.alert('Se Modificó Correctamente !');
                                inicio();
                                buscarlista();
                            } else if (mensaje == "NUL") {
                                $.alert('Error de Modificación !');
                            } else {
                                $.alert('Error de Modificación !');
                            }

                        }

                    })

                },
                NO: function() {}
            }
        });

    }

}

/* BUSCAR PERSONAS */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaPersona");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoPersona").html(mensaje);

        }

    })

}
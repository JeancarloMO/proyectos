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
}

function limpiar() {
    $('input[type="text"]').val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
    limpiar();
    $('#ruc').focus();
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

/* REGISTRAR PROVEEDOR */

function registrarProveedor() {

    var ruc = $("#ruc").val();
    var proveedor = $("#proveedor").val();
    var contacto = $("#contacto").val();
    var direccion = $("#direccion").val();

    if (ruc == "" || proveedor == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#ruc').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarRuc", ruc);
        datos.append("enviarProveedor", proveedor);
        datos.append("enviarContacto", contacto);
        datos.append("enviarDireccion", direccion);
        datos.append("ajax", "registrarProveedor");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar al Proveedor ?',
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

/* BUSCAR PROVEEDOR */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaProveedor");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoProveedor").html(mensaje);

        }

    })

}

/* SELECCIONAR EDITAR DATOS PROVEEDOR */

function seleccionarProveedor(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarProveedor");

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
            document.getElementById("ruc").value = cadena[1];
            document.getElementById("proveedor").value = cadena[2];
            document.getElementById("contacto").value = cadena[3];
            document.getElementById("direccion").value = cadena[4];

            modificar();

        }

    })

}

/* MODIFICAR PROVEEDOR */

function modificarProveedor() {

    var codigo = $("#codigo").val();
    var ruc = $("#ruc").val();
    var proveedor = $("#proveedor").val();
    var contacto = $("#contacto").val();
    var direccion = $("#direccion").val();

    if (codigo == "" || ruc == "" || proveedor == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarRuc", ruc);
        datos.append("enviarProveedor", proveedor);
        datos.append("enviarContacto", contacto);
        datos.append("enviarDireccion", direccion);
        datos.append("ajax", "modificarProveedor");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Modificar al Proveedor ?',
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
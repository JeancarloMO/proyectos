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
    $('#area').focus();
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

/* REGISTRAR AREA */

function registrarArea() {

    var area = $("#area").val();

    if (area == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarArea", area);
        datos.append("ajax", "registrarArea");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar el Area ?',
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

/* SELECCIONAR EDITAR DATOS AREA */

function seleccionarArea(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarArea");

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
            document.getElementById("area").value = cadena[1];

            modificar();

        }

    })

}

/* MODIFICAR AREA */

function modificarArea() {

    var codigo = $("#codigo").val();
    var area = $("#area").val();

    if (codigo == "" || area == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarArea", area);
        datos.append("ajax", "modificarArea");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Modificar el Area ?',
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

/* BUSCAR AREAS */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaArea");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoArea").html(mensaje);

        }

    })

}
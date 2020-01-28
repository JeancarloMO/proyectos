$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#btn_buscarArea").prop("disabled", true);
    $("#btn_buscarCargo").prop("disabled", true);
    $("#btn_buscarPersona").prop("disabled", true);
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
    $("#cod_persona").val('');
    $("#persona").val('');
    $("#cod_area").val('');
    $("#area").val('');
    $("#cod_cargo").val('');
    $("#cargo").val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscarArea").prop("disabled", false);
    $("#btn_buscarCargo").prop("disabled", false);
    $("#btn_buscarPersona").prop("disabled", false);
    controlAdd(true);
    limpiar();
    generarCodigo();
    $('#area').focus();
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscarArea").prop("disabled", false);
    $("#btn_buscarCargo").prop("disabled", false);
    $("#btn_buscarPersona").prop("disabled", false);
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

/* CODIGO PERSONAL */

function generarCodigo() {

    var datos = new FormData();
    datos.append("ajax", "generarCodigoPersonal");

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

/* AREA */

function modalbuscarArea() {
    $('#miModalBuscarArea').modal('show');
    $('#miModalBuscarArea').on('shown.bs.modal', function() {
        $('#area_buscarlista').focus();
    });
}

function area_buscarlista() {

    var text = $("input#area_buscarlista").val();

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

            document.getElementById("cod_area").value = cadena[0];
            document.getElementById("area").value = cadena[1];

            $('#miModalBuscarArea').modal('hide');

        }

    })

}

/* FIN AREA */

/* CARGO */

function modalbuscarCargo() {
    $('#miModalBuscarCargo').modal('show');
    $('#miModalBuscarCargo').on('shown.bs.modal', function() {
        $('#cargo_buscarlista').focus();
    });
}

function cargo_buscarlista() {

    var text = $("input#cargo_buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaCargo");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoCargo").html(mensaje);

        }

    })

}

function seleccionarCargo(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarCargo");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            var cadena = mensaje.split("|")

            document.getElementById("cod_cargo").value = cadena[0];
            document.getElementById("cargo").value = cadena[1];

            $('#miModalBuscarCargo').modal('hide');

        }

    })

}

/* FIN CARGO */

/* PERSONA */

function modalbuscarPersona() {
    $('#miModalBuscarPersona').modal('show');
    $('#miModalBuscarPersona').on('shown.bs.modal', function() {
        $('#per_buscarlista').focus();
    });
}

function per_buscarlista() {

    var text = $("input#per_buscarlista").val();

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

            document.getElementById("cod_persona").value = cadena[0];
            document.getElementById("persona").value = cadena[1] + ', ' + cadena[2];

            $('#miModalBuscarPersona').modal('hide');

        }

    })

}

/* FIN PERSONA */

/* REGISTRAR PERSONAL */

function registrarPersonal() {

    var codigo = $("#codigo").val();
    var cod_area = $("#cod_area").val();
    var cod_cargo = $("#cod_cargo").val();
    var cod_persona = $("#cod_persona").val();
    var obs = $("#obs").val();

    if (codigo == "" || cod_area == "" || cod_cargo == "" || cod_persona == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_area", cod_area);
        datos.append("enviarCod_cargo", cod_cargo);
        datos.append("enviarCod_persona", cod_persona);
        datos.append("enviarObs", obs);
        datos.append("ajax", "registrarPersonal");

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

/* SELECCIONAR EDITAR DATOS PERSONAL */

function seleccionarPersonal(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarPersonal");

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
            document.getElementById("cod_persona").value = cadena[1];
            document.getElementById("persona").value = cadena[2];
            document.getElementById("cod_area").value = cadena[3];
            document.getElementById("area").value = cadena[4];
            document.getElementById("cod_cargo").value = cadena[5];
            document.getElementById("cargo").value = cadena[6];
            document.getElementById("obs").value = cadena[7];

            modificar();

        }

    })

}

/* MODIFICAR PERSONAL */

function modificarPersonal() {

    var codigo = $("#codigo").val();
    var cod_area = $("#cod_area").val();
    var cod_cargo = $("#cod_cargo").val();
    var cod_persona = $("#cod_persona").val();
    var obs = $("#obs").val();

    if (codigo == "" || cod_area == "" || cod_cargo == "" || cod_persona == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_area", cod_area);
        datos.append("enviarCod_cargo", cod_cargo);
        datos.append("enviarCod_persona", cod_persona);
        datos.append("enviarObs", obs);
        datos.append("ajax", "modificarPersonal");

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

/* BUSCAR PERSONAL */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaPersonal");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoPersonal").html(mensaje);

        }

    })

}
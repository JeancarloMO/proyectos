$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#btn_buscarFamilia").prop("disabled", true);
    $("#producto").removeClass("bg-white");
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
    $("#cod_familia").val('');
    $("#familia").val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscarFamilia").prop("disabled", false);
    $("#producto").addClass("bg-white");
    controlAdd(true);
    limpiar();
    generarCodigo();
    $('#producto').focus();
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscarFamilia").prop("disabled", false);
    $("#producto").addClass("bg-white");
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


/* CODIGO PRODUCTO */

function generarCodigo() {

    var datos = new FormData();
    datos.append("ajax", "generarCodigoProducto");

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

/* FAMILIA */

function modalbuscarFamilia() {
    $('#miModalBuscarFamilia').modal('show');
    $('#miModalBuscarFamilia').on('shown.bs.modal', function() {
        $('#familia_buscarlista').focus();
    });
}

function familia_buscarlista() {

    var text = $("input#familia_buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaFamilia");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoFamilia").html(mensaje);

        }

    })

}

function seleccionarFamilia(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarFamilia");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            var cadena = mensaje.split("|")

            document.getElementById("cod_familia").value = cadena[0];
            document.getElementById("familia").value = cadena[1];

            $('#miModalBuscarFamilia').modal('hide');

        }

    })

}

/* FIN AREA */

/* REGISTRAR PRODUCTO */

function registrarProducto() {

    var codigo = $("#codigo").val();
    var cod_familia = $("#cod_familia").val();
    var producto = $("#producto").val();
    var descripcion = $("#descripcion").val();
    var presentacion = $("#presentacion").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var color = $("#color").val();

    if (codigo == "" || cod_familia == "" || producto == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_familia", cod_familia);
        datos.append("enviarProducto", producto);
        datos.append("enviarDescripcion", descripcion);
        datos.append("enviarPresentacion", presentacion);
        datos.append("enviarMarca", marca);
        datos.append("enviarModelo", modelo);
        datos.append("enviarColor", color);
        datos.append("ajax", "registrarProducto");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar el Producto ?',
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

/* SELECCIONAR EDITAR DATOS PRODUCTO */

function seleccionar(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarProducto");

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
            document.getElementById("cod_familia").value = cadena[1];
            document.getElementById("familia").value = cadena[2];
            document.getElementById("producto").value = cadena[3];
            document.getElementById("presentacion").value = cadena[4];
            document.getElementById("marca").value = cadena[5];
            document.getElementById("modelo").value = cadena[6];
            document.getElementById("color").value = cadena[7];
            document.getElementById("descripcion").value = cadena[8];

            modificar();

        }

    })

}

/* MODIFICAR PRODUCTO AJAX*/

function modificarProducto() {

    var codigo = $("#codigo").val();
    var cod_familia = $("#cod_familia").val();
    var producto = $("#producto").val();
    var descripcion = $("#descripcion").val();
    var presentacion = $("#presentacion").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var color = $("#color").val();

    if (codigo == "" || producto == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_familia", cod_familia);
        datos.append("enviarProducto", producto);
        datos.append("enviarDescripcion", descripcion);
        datos.append("enviarPresentacion", presentacion);
        datos.append("enviarMarca", marca);
        datos.append("enviarModelo", modelo);
        datos.append("enviarColor", color);
        datos.append("ajax", "modificarProducto");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Modificar el Producto ?',
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

/* BUSCAR PRODUCTOS */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaProducto");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoProducto").html(mensaje);

        }

    })

}
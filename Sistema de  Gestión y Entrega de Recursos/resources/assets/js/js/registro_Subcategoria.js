$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#btn_buscar").prop("disabled", true);
    limpiar();
    controlAdd(false);
    $("#buscarlista").val('');
}

function controlAdd(isNot) {
    isNot = !isNot;
    $('input[type="text"]').prop("disabled", isNot);
}

function limpiar() {
    $('input[type="text"]').val('');
    $("#cod_categoria").val('');
    $("#categoria").val('');
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscar").prop("disabled", false);
    controlAdd(true);
    limpiar();
    $('#subcategoria').focus();
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscar").prop("disabled", false);
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

/* CATEGORIA */

function modalbuscarCategoria() {
    $('#miModalBuscarCategoria').modal('show');
    $('#miModalBuscarCategoria').on('shown.bs.modal', function() {
        $('#cat_buscarlista').focus();
    });
}

function cat_buscarlista() {

    var text = $("input#cat_buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaCategoria");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoCategoria").html(mensaje);

        }

    })

}

function seleccionarCategoria(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarCategoria");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            var cadena = mensaje.split("|")

            document.getElementById("cod_categoria").value = cadena[0];
            document.getElementById("categoria").value = cadena[1];

            $('#miModalBuscarCategoria').modal('hide');

        }

    })

}

/* FIN CATEGORIA */

/* REGISTRAR SUBCATEGORIA */

function registrarSubcategoria() {

    var cod_categoria = $("#cod_categoria").val();
    var subcategoria = $("#subcategoria").val();

    if (cod_categoria == "" || subcategoria == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#subcategoria').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCod_categoria", cod_categoria);
        datos.append("enviarSubcategoria", subcategoria);
        datos.append("ajax", "registrarSubcategoria");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar la Sub-Categoria ?',
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

/* SELECCIONAR EDITAR DATOS SUBCATEGORIA */

function seleccionarSubcategoria(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarSubcategoria");

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
            document.getElementById("cod_categoria").value = cadena[1];
            document.getElementById("categoria").value = cadena[2];
            document.getElementById("subcategoria").value = cadena[3];

            modificar();

        }

    })

}

/* MODIFICAR SUBCATEGORIA */

function modificarSubcategoria() {

    var codigo = $("#codigo").val();
    var cod_categoria = $("#cod_categoria").val();
    var subcategoria = $("#subcategoria").val();

    if (codigo == "" || cod_categoria == "" || subcategoria == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#subcategoria').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_categoria", cod_categoria);
        datos.append("enviarSubcategoria", subcategoria);
        datos.append("ajax", "modificarSubcategoria");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Modificar la Sub-Categoria ?',
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

/* BUSCAR CATEGORIA */

function buscarlista() {

    var text = $("input#buscarlista").val();

    var datos = new FormData();
    datos.append("buscarDatos", text);
    datos.append("ajax", "buscarlistaSubcategoria");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoSubcategoria").html(mensaje);

        }

    })

}
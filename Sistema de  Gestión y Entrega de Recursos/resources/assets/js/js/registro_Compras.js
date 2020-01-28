$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#btn_buscar").prop("disabled", true);
    $("#btn_seleccionar").prop("disabled", true);
    $("#btn_calcular").prop("disabled", true);
    limpiar();
    controlAdd(false);
    $("#codigo").val('');
}

function controlAdd(isNot) {
    isNot = !isNot;
    $('input[type="text"]').prop("disabled", isNot);
    $('input[type="date"]').prop("disabled", isNot);
    $('select').prop("disabled", isNot);
}

function limpiar() {
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('select').val('');
    $("#ruc").val('');
    $("#proveedor").val('');
    $("#contenidoCompras").html("");
    document.getElementById("subTotal").innerHTML = "---";
    document.getElementById("igvTotal").innerHTML = "---";
    document.getElementById("importeTotal").innerHTML = "---";
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    $("#btn_buscar").prop("disabled", false);
    $("#btn_seleccionar").prop("disabled", false);
    $("#btn_calcular").prop("disabled", false);
    controlAdd(true);
    limpiar();
    generarCodigo();
    $("#comprobante").val("01");
    $("#igv").val('igv');
    $("#val_igv").val(18);
    //$('#producto').focus();
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
                //lista();
                //$("#buscarlista").val('');
                $.alert('Operación Cancelada !');
            },
            NO: function() {}
        }
    });
}

$("#comprobante").change(function() {
    var tipo_comprobante = $(this).val();
    if (tipo_comprobante == "01") {
        document.getElementById("igv").value = "igv";
        document.getElementById("val_igv").value = 18;
        $("#igv").prop("disabled", false);
        $("#val_igv").prop("disabled", false);
    } else if (tipo_comprobante == "02") {
        document.getElementById("igv").value = "";
        document.getElementById("val_igv").value = 0;
        $("#igv").prop("disabled", true);
        $("#val_igv").prop("disabled", true);
    }
})

/* CODIGO COMPRA */

function generarCodigo() {

    var datos = new FormData();
    datos.append("ajax", "generarCodigoCompra");

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

function selectComprobante() {

    var datos = new FormData();
    datos.append("ajax", "selectComprobante");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#comprobante").html(mensaje);

        }

    })

}

/* PROVEEDOR */

function modalbuscarProveedor() {
    $('#miModalBuscarProveedor').modal('show');
    $('#miModalBuscarProveedor').on('shown.bs.modal', function() {
        $('#prov_buscarlista').focus();
    });
}

function modalnuevoProveedor() {
    $('#miModalNuevoProveedor').modal('show');
    $('#miModalNuevoProveedor').on('shown.bs.modal', function() {
        $('#prov_ruc').val('');
        $('#prov_proveedor').val('');
        $('#prov_ruc').focus();
    });
}

function prov_cancelar() {
    $('#miModalNuevoProveedor').modal('hide');
}

function prov_registrarProveedor() {

    var ruc = $("#prov_ruc").val();
    var proveedor = $("#prov_proveedor").val();

    if (ruc == "" || proveedor == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#prov_ruc').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarRuc", ruc);
        datos.append("enviarProveedor", proveedor);
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
                                prov_buscarlista();
                                $('#miModalNuevoProveedor').modal('hide');
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

function prov_buscarlista() {

    var text = $("input#prov_buscarlista").val();

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

/* FIN PROVEEDOR */

/* SELECCIONAR DATOS PROVEEDOR */

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

            document.getElementById("cod_proveedor").value = cadena[0];
            document.getElementById("ruc").value = cadena[1];
            document.getElementById("proveedor").value = cadena[2];

            $('#miModalBuscarProveedor').modal('hide');

        }

    })

}

/* PRODUCTO */

function modalbuscarProducto() {
    $('#miModalBuscarProducto').modal('show');
    $('#miModalBuscarProducto').on('shown.bs.modal', function() {
        $('#prod_buscarlista').focus();
    });
}

function modalnuevoProducto() {
    $('#miModalNuevoProducto').modal('show');
    $('#miModalNuevoProducto').on('shown.bs.modal', function() {
        $('#prod_codigo').val('');
        $('#prod_producto').val('');
        $('#prod_presentacion').val('');
        $('#prod_marca').val('');
        $('#prod_modelo').val('');
        $('#prod_color').val('');
        $('#prod_descripcion').val('');
        prod_generarCodigo();
        $('#prod_codigo').prop("disabled", true);
        $('#prod_producto').focus();
    });
}

function prod_cancelar() {
    $('#miModalNuevoProducto').modal('hide');
}

function prod_generarCodigo() {

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

            document.getElementById("prod_codigo").value = mensaje;

        }

    })

}

function prod_registrarProducto() {

    var codigo = $("#prod_codigo").val();
    var producto = $("#prod_producto").val();
    var descripcion = $("#prod_descripcion").val();
    var presentacion = $("#prod_presentacion").val();
    var marca = $("#prod_marca").val();
    var modelo = $("#prod_modelo").val();
    var color = $("#prod_color").val();

    if (codigo == "" || producto == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });
        $('#producto').focus();

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
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
                                prod_buscarlista();
                                $('#miModalNuevoProducto').modal('hide');
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

function prod_buscarlista() {

    var text = $("input#prod_buscarlista").val();

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

$("#contenidoProducto tr").dblclick(function() {
    $('#contenidoProducto tr').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

/* FIN PRODUCTO */

/* SELECCIONAR PRODUCTOS */

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

            var num = $('#contenidoCompras tr').length;
            var cont = num + 1;
            var cadena = mensaje.split("|")

            var filas = [];
            var repetido = 0;

            if (num > 0) {

                $('#contenidoCompras tr').each(function() {

                    var codigo = $(this).find('td').eq(2).text();
                    var fila = [codigo];

                    filas.push(fila);

                });

                for (var i = 0; i < num; i++) {
                    if (filas[i] == cadena[0]) {
                        repetido = 1;
                    }
                }

            }

            if (repetido == 1) {

                $.notify("El producto ya fue seleccionado !", "error");

            } else {

                document.getElementById("contenidoCompras").insertRow(-1).innerHTML = '<td class="text-center">' + cont + '</td>' +
                    '<td class="text-center"><input class="text-center border border-info" style="width:50px;height:20px;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>' +
                    '<td class="text-center">' + cadena[0] + '</td><td>' + cadena[3] + ' ' + cadena[4] + ' ' + cadena[5] + ' ' + cadena[6] + ' ' + cadena[7] + ' ' + cadena[8] + '</td>' +
                    '<td class="text-center"><input class="text-center border border-info" style="width:50px;height:20px;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>' +
                    '<td id="total' + cadena[0] + '" class="text-center"></td>' +
                    '<td class="text-center" style="cursor:pointer;"><i class="fa fa-times tam-icon px-1 py-1 text-danger font-weight-bold borrar"></td>';

                $.notify("Producto Seleccionado !", "success");

            }

        }

    })

}

/* ELIMINAR PRODUCTOS DE LA TABLA */

$(document).on('click', '.borrar', function(event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

/* CALCULAR TOTAL */

function calcularTotal() {

    var filas = [];
    var num = $('#contenidoCompras tr').length;

    var subtotal = 0;
    var tipo_igv = $("#igv").val();
    var porcentaje_igv = $("#val_igv").val();
    var igv = 0;
    var importe = 0;

    $('#contenidoCompras tr').each(function() {

        var cantidad = $(this).find('td').eq(1).find('input').val();
        var precio = $(this).find('td').eq(4).find('input').val();
        var celda = $(this).find('td').eq(2).text();
        var total = parseFloat(Math.round((cantidad * precio) * 100) / 100).toFixed(2);
        var fila = [cantidad, precio, total, celda];

        filas.push(fila);

    });

    for (var i = 0; i < num; i++) {
        document.getElementById("total".concat(filas[i][3])).innerHTML = filas[i][2];
        subtotal = parseFloat(subtotal) + parseFloat(filas[i][2]);
    }

    subtotal = parseFloat(Math.round((subtotal) * 100) / 100).toFixed(2);

    if (tipo_igv != "") {
        if (tipo_igv == "incluido") {
            porcentaje_igv = parseFloat((parseFloat(porcentaje_igv) + 100) / 100);
            importe = subtotal;
            subtotal = parseFloat(Math.round((parseFloat(importe) / parseFloat(porcentaje_igv)) * 100) / 100).toFixed(2);
            igv = parseFloat(Math.round((parseFloat(importe) - parseFloat(subtotal)) * 100) / 100).toFixed(2);
        } else {
            igv = subtotal * (parseFloat(porcentaje_igv) / 100);
            igv = parseFloat(Math.round((igv) * 100) / 100).toFixed(2);
            importe = parseFloat(Math.round((parseFloat(subtotal) + parseFloat(igv)) * 100) / 100).toFixed(2);
        }
    } else {
        importe = subtotal;
        igv = 0
    }

    document.getElementById("subTotal").innerHTML = subtotal;
    document.getElementById("igvTotal").innerHTML = igv;
    document.getElementById("importeTotal").innerHTML = importe;

}

/* REGISTRAR COMPRAS */

function registrarCompra() {

    var codigo = $("#codigo").val();
    var tipo_comprobante = $("#comprobante").val();
    var nro_comprobante = $("#nro_comprobante").val();
    var proveedor = $("#cod_proveedor").val();
    var tipo_igv = $("#igv").val();
    var porcentaje_igv = $("#val_igv").val();
    var subtotal = $('#importe tr').find('td').eq(0).text();
    var importe = $('#importe tr').find('td').eq(2).text();
    var fecha = $("#fecha").val();

    var filas = [];
    var n = $('#contenidoCompras tr').length;

    $('#contenidoCompras tr').each(function() {

        var cod_producto = $(this).find('td').eq(2).text();
        var cantidad = $(this).find('td').eq(1).find('input').val();
        var precio = $(this).find('td').eq(4).find('input').val();
        var fila = [cod_producto, cantidad, precio, '|'];

        filas.push(fila);

    });

    if (codigo == "" || tipo_comprobante == "" || nro_comprobante == "" || fecha == "" ||
        proveedor == "" || importe == "---" || importe == "0.00") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarTipo_Comprobante", tipo_comprobante);
        datos.append("enviarNro_Comprobante", nro_comprobante);
        datos.append("enviarProveedor", proveedor);
        datos.append("enviarTipo_igv", tipo_igv);
        datos.append("enviarPorcentaje_igv", porcentaje_igv);
        datos.append("enviarSubtotal", subtotal);
        datos.append("enviarImporte", importe);
        datos.append("enviarFecha", fecha);
        datos.append("enviarDatos", filas);
        datos.append("enviarN", n);
        datos.append("ajax", "registrarCompra");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar la Compra ?',
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
                                //buscarlista();
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
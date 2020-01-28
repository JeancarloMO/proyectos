$(document).ready(function() {
    inicio();
});

function inicio() {
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#sub_btn_buscar").prop("disabled", true);
    $("#area_btn_buscar").prop("disabled", true);
    $("#pers_btn_buscar").prop("disabled", true);
    $("#btn_seleccionar").prop("disabled", true);
    limpiar();
    controlAdd(false);
    $("#codigo").val('');
}

function controlAdd(isNot) {
    isNot = !isNot;
    $('input[type="text"]').prop("disabled", isNot);
    $('input[type="date"]').prop("disabled", isNot);
}

function limpiar() {
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $("#contenidoEntregas").html("");
}

function nuevo() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    $("#sub_btn_buscar").prop("disabled", false);
    $("#area_btn_buscar").prop("disabled", false);
    $("#pers_btn_buscar").prop("disabled", false);
    $("#btn_seleccionar").prop("disabled", false);
    //controlAdd(true);
    $('input[type="date"]').prop("disabled", false);
    limpiar();
    generarCodigo();
    formatoFecha();
}

function modificar() {
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    //controlAdd(true);
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

function formatoFecha() {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes //agrega cero si el menor de 10
    document.getElementById("fecha").value = ano + "-" + mes + "-" + dia;
}

/* CODIGO ENTREGA */

function generarCodigo() {

    var datos = new FormData();
    datos.append("ajax", "generarCodigoEntrega");

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

/* SUBCATEGORIA */

function modalbuscarSubcategoria() {
    $('#miModalBuscarSubcategoria').modal('show');
    $('#miModalBuscarSubcategoria').on('shown.bs.modal', function() {
        $('#sub_buscarlista').focus();
    });
}

function sub_buscarlista() {

    var text = $("input#sub_buscarlista").val();

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

            document.getElementById("cod_subcategoria").value = cadena[0];
            document.getElementById("categoria").value = cadena[2];
            document.getElementById("subcategoria").value = cadena[3];

            $('#miModalBuscarSubcategoria').modal('hide');

        }

    })

}

/* FIN SUBCATEGORIA */

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

/* PERSONAL */

function modalbuscarPersonal() {
    $('#miModalBuscarPersonal').modal('show');
    $('#miModalBuscarPersonal').on('shown.bs.modal', function() {
        $('#pers_buscarlista').focus();
    });
}

function pers_buscarlista() {

    var text = $("input#pers_buscarlista").val();

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

            document.getElementById("cod_personal").value = cadena[0];
            document.getElementById("personal").value = cadena[2];

            $('#miModalBuscarPersonal').modal('hide');

        }

    })

}

/* FIN PERSONAL */

/* STOCK */

function modalbuscarStock() {
    $('#miModalBuscarStock').modal('show');
    $('#miModalBuscarStock').on('shown.bs.modal', function() {
        $('#prod_buscarlista').focus();
    });
}

/* FIN STOCK */

/* SELECCIONAR PRODUCTOS STOCK */

function seleccionar(dato) {

    var datos = new FormData();
    datos.append("buscarDatos", dato);
    datos.append("ajax", "seleccionarStock");

    $.ajax({

        url: "resources/views/layouts/ajax/registro.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            var num = $('#contenidoEntregas tr').length;
            var cont = num + 1;
            var cadena = mensaje.split("|")

            var filas = [];
            var repetido = 0;

            if (num > 0) {

                $('#contenidoEntregas tr').each(function() {

                    var codigo = $(this).find('td').eq(1).text();
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

                document.getElementById("contenidoEntregas").insertRow(-1).innerHTML = '<td class="text-center">' + cont + '</td>' +
                    '<td class="text-center">' + cadena[0] + '</td><td>' + cadena[1] + '</td>' +
                    '<td class="text-center"><input class="text-center border border-info" style="width:50px;height:20px;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>' +
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

/* REGISTRAR ENTREGAS */

function registrarEntrega() {

    var codigo = $("#codigo").val();
    var cod_subcategoria = $("#cod_subcategoria").val();
    var cod_area = $("#cod_area").val();
    var cod_personal = $("#cod_personal").val();
    var fecha = $("#fecha").val();

    var filas = [];
    var n = $('#contenidoEntregas tr').length;

    $('#contenidoEntregas tr').each(function() {

        var cod_producto = $(this).find('td').eq(1).text();
        var cantidad = $(this).find('td').eq(3).find('input').val();
        var fila = [cod_producto, cantidad, '|'];

        filas.push(fila);

    });

    if (codigo == "" || cod_area == "" || cod_personal == "" || fecha == "") {

        $.notify("Falta Llenar Algunos Campos", { position: "right bottom" });

    } else {

        var datos = new FormData();
        datos.append("enviarCodigo", codigo);
        datos.append("enviarCod_subcategoria", cod_subcategoria);
        datos.append("enviarCod_area", cod_area);
        datos.append("enviarCod_personal", cod_personal);
        datos.append("enviarFecha", fecha);
        datos.append("enviarDatos", filas);
        datos.append("enviarN", n);
        datos.append("ajax", "registrarEntrega");

        $.confirm({
            title: 'Alerta!',
            content: '¿ Desea Registrar la Entrega ?',
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
                                $.alert('Error !');
                            }

                        }

                    })

                },
                NO: function() {}
            }
        });

    }

}
function paint(obj) {
    $('#contenidoComprobantes tr').removeClass('bg-warning');
    obj.className = "bg-warning";
}

$("#comprobante").change(function() {
    $("#contenidoProductos").html("");
})

/* SELECCIONAR COMPROBANTE */

function seleccionarComprobante(cod, tipo, igv, subtotal, importe) {

    if (tipo != "") {
        if (tipo == "incluido") {
            document.getElementById("igv").innerHTML = tipo.concat(" (%) : ", igv);
        } else {
            document.getElementById("igv").innerHTML = "(%) : ".concat(igv);
        }
    } else {
        document.getElementById("igv").innerHTML = "(%) : ".concat(0);
    }

    igv = parseFloat(Math.round((parseFloat(importe) - parseFloat(subtotal)) * 100) / 100).toFixed(2);

    var datos = new FormData();
    datos.append("buscarDatos", cod);
    datos.append("ajax", "buscarlistaProductos");

    $.ajax({

        url: "resources/views/layouts/ajax/listas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoProductos").html(mensaje);

            document.getElementById("subTotal").innerHTML = subtotal;
            document.getElementById("igvTotal").innerHTML = igv;
            document.getElementById("importeTotal").innerHTML = importe;

        }

    })

}

/* BUSCAR LISTA COMPROBANTES */

function buscarlistaComprobantes() {

    var comprobante = $("#comprobante").val();
    var nro_comprobante = $("#nro_comprobante").val();
    var proveedor = $("#proveedor").val();
    var fecha = $("#fecha").val();

    var datos = new FormData();
    datos.append("enviarComprobante", comprobante);
    datos.append("enviarNro_comprobante", nro_comprobante);
    datos.append("enviarProveedor", proveedor);
    datos.append("enviarFecha", fecha);
    datos.append("ajax", "buscarlistaComprobantes");

    $.ajax({

        url: "resources/views/layouts/ajax/listas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoComprobantes").html(mensaje);

        }

    })

}

function imprimir() {

    var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "POST";
    form.target = "_blank";
    form.action = "resources/views/layouts/ajax/";
    var element1 = document.createElement("input");
    element1.name = "enviarDatos";
    element1.value = 1;
    element1.type = 'hidden';
    form.appendChild(element1);
    form.submit();

    //DESTROY
    form.remove();

}
function paint(obj) {
    $('#contenidoEntregas tr').removeClass('bg-warning');
    obj.className = "bg-warning";
}

/* SELECCIONAR ENTREGA */

function seleccionarEntrega(cod) {

    document.getElementById("cod").value = cod;

    var datos = new FormData();
    datos.append("buscarDatos", cod);
    datos.append("ajax", "buscarlistaProducto");

    $.ajax({

        url: "resources/views/layouts/ajax/listas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoProductos").html(mensaje);

        }

    })

}

/* BUSCAR LISTA ENTREGAS */

function buscarlistaEntregas() {

    var area = $("#area").val();
    var fecha = $("#fecha").val();

    var datos = new FormData();
    datos.append("enviarArea", area);
    datos.append("enviarFecha", fecha);
    datos.append("ajax", "buscarlistaEntregas");

    $.ajax({

        url: "resources/views/layouts/ajax/listas.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(mensaje) {

            $("#contenidoEntregas").html(mensaje);

        }

    })

}

function imprimir() {

    var cod = $("#cod").val();

    var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "POST";
    form.target = "_blank";
    form.action = "resources/views/layouts/reports/";
    var element = document.createElement("input");
    element.name = "report_enviar";
    element.value = "entrega";
    element.type = 'hidden';
    var element1 = document.createElement("input");
    element1.name = "enviarDatos";
    element1.value = cod;
    element1.type = 'hidden';
    form.appendChild(element);
    form.appendChild(element1);
    form.submit();

    //DESTROY
    form.remove();

}

function imprimirFiltro() {

    var area = $("#area").val();
    var fecha = $("#fecha").val();

    var form = document.createElement("form");
    document.body.appendChild(form);
    form.method = "POST";
    form.target = "_blank";
    form.action = "resources/views/layouts/reports/";
    var element = document.createElement("input");
    element.name = "report_enviar";
    element.value = "filtros";
    element.type = 'hidden';
    var element1 = document.createElement("input");
    element1.name = "enviarArea";
    element1.value = area;
    element1.type = 'hidden';
    var element2 = document.createElement("input");
    element2.name = "enviarFecha";
    element2.value = fecha;
    element2.type = 'hidden';

    form.appendChild(element);
    form.appendChild(element1);
    form.appendChild(element2);
    form.submit();

    //DESTROY
    form.remove();

}
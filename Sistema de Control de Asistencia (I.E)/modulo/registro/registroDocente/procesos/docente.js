$(document).ready(function(){
    inicio();
});

function modalbuscar(){
    $('#miModalBuscar').modal('show');
    $('#miModalBuscar').on('shown.bs.modal', function () {
        $('#b_paterno').focus();
    });
}

function inicio(){
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#codigo").prop("disabled", true);
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    $("#paterno").prop("disabled", isNot);
    $("#materno").prop("disabled", isNot);
    $("#nombres").prop("disabled", isNot);
    $("#obs").prop("disabled", isNot);
}

function limpiar(){
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('select').val('');
}

function nuevo(){
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
    limpiar();
    generarCodigo();
}

function modificar(){
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function cancelar(){
    inicio();
    lista();
    $("#miModalMulti .close").click();
}

function generarCodigo(){
    $.post("procesos/getCodigo.php", function(mensaje) {
        document.getElementById("codigo").value = mensaje;
    });
}

function modalMulti(des){
    var text = "";
    switch(des){
        case 1:
            text = "¿Deseas Registrarlo?";
            $("#eventoTotal").attr('onclick', 'registrarDocente();');
            break;
        case 2:
            text = "¿Deseas Modificarlo?";
            $("#eventoTotal").attr('onclick', 'modificarDocente();');
            break;
        case 3:
            text = "¿Deseas Cancelarlo?";
            $("#eventoTotal").attr('onclick', 'cancelar();');
            break;
        default:
            console.log("NOTIFICACIÓN E-002");
            text = "NOTIFICACIÓN E-002";
            break;
    }

    document.getElementById('modalConcepto').textContent = text;
    $('#miModalMulti').modal('show');
    $('#miModalMulti').on('shown.bs.modal', function () {
        $('#cerrarMulti').focus();
    });
}

function modalOKI(des){
    var text = "";
    switch(des){
        case 1:
            text = "Los Campos estan vacios.";
            break;
        case 2:
            text = "Se Registro Correctamente.";
            break;
        case 3:
            text = "Se Modifico Correctamente.";
            break;
        case 4:
            text = "Error al Ejecutar la Operación.";
            break;
        default:
            console.log("NOTIFICACIÓN E-003");
            text = "NOTIFICACIÓN E-003";
            break;
    }

    document.getElementById('OKIconcepto').textContent = text;
    $('#miModalOKI').modal('show');
    $('#miModalOKI').on('shown.bs.modal', function () {
        $('#cerrarOKI').focus();
    });
}

function registrarDocente(){
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(4);
    datosRegistro[0] = $("#codigo").val();
    datosRegistro[1] = $("#paterno").val();
    datosRegistro[2] = $("#materno").val();
    datosRegistro[3] = $("#nombres").val();
    datosRegistro[4] = $("#obs").val();

    if(datosRegistro[0] == "" || datosRegistro[1] == "" || datosRegistro[2] == "" || datosRegistro[3] == "" ){

        modalOKI(1);

    }else{

        $.post("procesos/registrarDocente.php", {valor: datosRegistro}, function(mensaje) {
            if(mensaje == "OK"){
                modalOKI(2);
                inicio();
                lista();
            }else if(mensaje == "NUL"){
                modalOKI(4);
            }else{
                modalOKI(5);
            }
        });

    }

}

function editar(dato){
    $.post("procesos/editarDatos.php", {valor: dato}, function(mensaje) {
        var cadena = mensaje.split("|")

        document.getElementById("codigo").value = cadena[0];
        document.getElementById("paterno").value = cadena[1];
        document.getElementById("materno").value = cadena[2];
        document.getElementById("nombres").value = cadena[3];
        document.getElementById("obs").value = cadena[4];

        modificar();

    });

}

function modificarDocente(){
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(4);
    datosRegistro[0] = $("#codigo").val();
    datosRegistro[1] = $("#paterno").val();
    datosRegistro[2] = $("#materno").val();
    datosRegistro[3] = $("#nombres").val();
    datosRegistro[4] = $("#obs").val();

    if(datosRegistro[0] == "" || datosRegistro[1] == "" || datosRegistro[2] == "" || datosRegistro[3] == "" ){

        modalOKI(1);

    }else{

        $.post("procesos/modificarDocente.php", {valor: datosRegistro}, function(mensaje) {
            if(mensaje == "OK"){
                modalOKI(3);
                inicio();
                lista();
            }else if(mensaje == "NUL"){
                modalOKI(4);
            }else{
                modalOKI(5);
            }
        });

    }

}

function lista(){
    $.post("procesos/listaDocente.php", function(mensaje) {
        $("#contenidoDocente").html(mensaje);
    });
}

function buscarlista() {
    var text = $("input#buscarlista").val();

    $.post("procesos/buscarLista.php", {valor: text}, function(mensaje) {
        $("#contenidoDocente").html(mensaje);
    });
};
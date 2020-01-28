$(document).ready(function(){
    inicio();
});

function modalbuscar(){
    $('#miModalBuscar').modal('show');
    $('#miModalBuscar').on('shown.bs.modal', function () {
        $('#b_paterno').focus();
    });
}

function modalbuscarDocente(){
    $('#miModalBuscarDocente').modal('show');
    $('#miModalBuscarDocente').on('shown.bs.modal', function () {
        $('#d_paterno').focus();
    });
}

function inicio(){
    $("#bb").prop("disabled", false);
    $("#btn-nuevo").prop("disabled", false);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", true);
    $("#codigo").prop("disabled", true);
    $("#paterno").prop("disabled", true);
    $("#materno").prop("disabled", true);
    $("#nombres").prop("disabled", true);
    $("#docente").prop("disabled", true);
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    $("#salon").prop("disabled", isNot);
    $("#turno").prop("disabled", isNot);
    $("#obs").prop("disabled", isNot);
}

function limpiar(){
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('select').val('');
}

function nuevo(){
    $("#bb").prop("disabled", true);
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", true);
    $("#btn-registrar").prop("disabled", false);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function modificar(){
    $("#bb").prop("disabled", true);
    $("#btn-nuevo").prop("disabled", true);
    $("#btn-modificar").prop("disabled", false);
    $("#btn-registrar").prop("disabled", true);
    $("#btn-cancelar").prop("disabled", false);
    controlAdd(true);
}

function cancelar(){
    inicio();
    lista(),
        $("#miModalMulti .close").click();
}

function modalMulti(des){
    var text = "";
    switch(des){
        case 1:
            text = "¿Deseas Registrarlo?";
            $("#eventoTotal").attr('onclick', 'registrarMatricula();');
            break;
        case 2:
            text = "¿Deseas Modificarlo?";
            $("#eventoTotal").attr('onclick', 'modificarMatricula();');
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
        case 5:
            text = "Este Alumno ya está Matriculado.";
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

function registrarMatricula(){
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(5);
    datosRegistro[0] = $("#codigo").val();
    datosRegistro[1] = $("#salon").val();
    datosRegistro[2] = $("#turno").val();
    datosRegistro[3] = $("#doc").val();
    datosRegistro[4] = 2019;
    datosRegistro[5] = $("#obs").val();

    if(datosRegistro[0] == "" || datosRegistro[1] == "" || datosRegistro[2] == "" ){

        modalOKI(1);

    }else{

        $.post("procesos/registrarMatricula.php", {valor: datosRegistro}, function(mensaje) {
            if(mensaje == "OK"){
                modalOKI(2);
                inicio();
                lista();
            }else if(mensaje == "NUL"){
                modalOKI(4);
            }else if(mensaje == "EXISTS"){
                modalOKI(5);
            }else{
                modalOKI(6);
            }
        });

    }

}

function modificarMatricula(){
    $("#miModalMulti .close").click();

    var datosRegistro = new Array(5);
    datosRegistro[0] = $("#id_mat").val();
    datosRegistro[1] = $("#codigo").val();
    datosRegistro[2] = $("#salon").val();
    datosRegistro[3] = $("#turno").val();
    datosRegistro[4] = $("#doc").val();
    datosRegistro[5] = $("#obs").val();

    if(datosRegistro[0] == "" || datosRegistro[2] == "" || datosRegistro[3] == "" ){

        modalOKI(1);

    }else{

        $.post("procesos/modificarMatricula.php", {valor: datosRegistro}, function(mensaje) {
            if(mensaje == "OK"){
                modalOKI(3);
                inicio();
                lista();
            }else if(mensaje == "NUL"){
                modalOKI(4);
            }else{
                modalOKI(6);
            }
        });

    }

}

function buscaralumno() {
    var x = {s1:"", s2:"", s3:""};
    if (document.getElementById("b_paterno").value != "0"){
        x["s1"] = document.getElementById("b_paterno").value;
    }
    if (document.getElementById("b_materno").value != "0"){
        x["s2"] = document.getElementById("b_materno").value;
    }

    if (document.getElementById("b_nombres").value != ""){
        x["s3"] = document.getElementById("b_nombres").value;
    }

    $.post("procesos/buscarAlumno.php", {valor: x}, function(mensaje) {
        $("#contenido").html(mensaje);
    });
};


function seleccionar(dato){
    $.post("procesos/mostrarDatos.php", {valor: dato}, function(mensaje) {
        var cadena = mensaje.split("|")

        document.getElementById("codigo").value = cadena[0];
        document.getElementById("paterno").value = cadena[1];
        document.getElementById("materno").value = cadena[2];
        document.getElementById("nombres").value = cadena[3];
        document.getElementById("salon").value = "";
        document.getElementById("turno").value = "";
        document.getElementById("obs").value = "";

        nuevo();
        $('#miModalBuscar').modal('hide');

    });

}

function buscardocente() {
    var x = {s1:"", s2:"", s3:""};
    if (document.getElementById("d_paterno").value != "0"){
        x["s1"] = document.getElementById("d_paterno").value;
    }
    if (document.getElementById("d_materno").value != "0"){
        x["s2"] = document.getElementById("d_materno").value;
    }

    if (document.getElementById("d_nombres").value != ""){
        x["s3"] = document.getElementById("d_nombres").value;
    }

    $.post("procesos/buscarDocente.php", {valor: x}, function(mensaje) {
        $("#contenidoDocente").html(mensaje);
    });
};

function seleccionarDocente(dato){
    $.post("procesos/mostrarDatosDocente.php", {valor: dato}, function(mensaje) {
        var cadena = mensaje.split("|")

        document.getElementById("doc").value = cadena[0];
        document.getElementById("docente").value = cadena[1];

        $('#miModalBuscarDocente').modal('hide');

    });

}

function lista(){
    $.post("procesos/listaMatricula.php", function(mensaje) {
        $("#contenidoMatricula").html(mensaje);
    });
}

function editar(dato){
    $.post("procesos/editarDatos.php", {valor: dato}, function(mensaje) {
        var cadena = mensaje.split("|")

        document.getElementById("id_mat").value = cadena[0];
        document.getElementById("codigo").value = cadena[1];
        document.getElementById("paterno").value = cadena[2];
        document.getElementById("materno").value = cadena[3];
        document.getElementById("nombres").value = cadena[4];
        document.getElementById("salon").value = cadena[5];
        document.getElementById("turno").value = cadena[6];
        document.getElementById("doc").value = cadena[7];
        document.getElementById("docente").value = cadena[8];
        document.getElementById("obs").value = cadena[9];

        modificar();

    });

}

function buscarlista() {
    var text = $("input#buscarlista").val();

    $.post("procesos/buscarLista.php", {valor: text}, function(mensaje) {
        $("#contenidoMatricula").html(mensaje);
    });
};
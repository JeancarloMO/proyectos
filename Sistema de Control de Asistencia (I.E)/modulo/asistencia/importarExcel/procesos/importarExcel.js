$(document).ready(function(){
    inicio();
    $("#boton_subir").on('click', function() {
        subirArchivos();
        controlAdd(true);
    });
});

function inicio(){
    $('select').val('');
    $("#btn-importar").prop("disabled", true);
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    /*$("#turno").prop("disabled", isNot);*/
}

function limpiar(){
    $('input[type="text"]').val('');
    $('input[type="file"]').val('');
    $('select').val('');
}

function subirArchivos() {
    $("#archivo").upload('procesos/excel.php',function(respuesta) {
        $("#contenidoExcel").html(respuesta);
    });
}

function bloquear(){
    $("#bloquear").addClass("bloquear");
}

function desbloquear(){
    $("#bloquear").removeClass("bloquear");
}

function asistenciaExcel(){
    $("#miModalMulti .close").click();
    bloquear();
    /*$('#miModalBarra').modal('show');*/

    var i = 1;
    var ce = $('#contenidoExcel tr').length;
    var cl = $('#contenidoLista tr').length;

    if(ce==0 || cl==0){
        desbloquear();
        alert("NO EXISTEN DATOS A REGISTRAR");

    }else{

        while (i<=cl){

            var datosLista = document.getElementById('LIST'+i).value;

            var ii = 1;

            while (ii<=ce){

                var datosAlumno = document.getElementById('ALU'+ii).value;
                var datosHora = document.getElementById('HOR'+ii).value;

                if(datosAlumno == datosLista){
                    $.post("procesos/registrarAsistencia.php", {codigo: datosAlumno, hora: datosHora});
                    break;
                }

                ii++;
            }

            /*var ss = 100 / cl;
            var o = ss*i
            $('#barra_de_progreso').val(o);*/

            if(i==cl){
                desbloquear();
                modalOKI(2);
                break;
            }

            i++;
        }

    }

}

function buscarLista() {
    var x = document.getElementById("turno").value;

    if(x != ""){
        $("#btn-importar").prop("disabled", false);

        $.post("procesos/buscarLista.php", {valor: x}, function(mensaje) {
            $("#contenidoLista").html(mensaje);
        });

    }else{
        $("#btn-importar").prop("disabled", true);
        $("#contenidoLista").html('');
    }

};

function modalMulti(des){
    var text = "";
    switch(des){
        case 1:
            text = "¿Deseas Registrarlo?";
            $("#eventoTotal").attr('onclick', 'asistenciaExcel();');
            break;
        case 2:
            text = "¿Deseas Modificarlo?";
            $("#eventoTotal").attr('onclick', 'modificarAlumno();');
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
$(document).ready(function(){
    inicio();
});

function inicio(){
    limpiar();
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    $("#btn-registrar").prop("disabled", isNot);
}

function limpiar(){
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('input[type="file"]').val('');
    $('select').val('');
}

function bloquear(){
    $("#bloquear").addClass("bloquear");
}

function desbloquear(){
    $("#bloquear").removeClass("bloquear");
}

function buscarFaltantes() {
    var x = {s1:"", s2:""};

    if (document.getElementById("turno").value != ""){
        x["s1"] = document.getElementById("turno").value;
    }
    if (document.getElementById("fecha").value != ""){
        x["s2"] = document.getElementById("fecha").value;
    }

    if (document.getElementById("turno").value != "" && document.getElementById("fecha").value != ""){
        controlAdd(true);

        $.post("procesos/buscarFaltantes.php", {valor: x}, function(mensaje) {
            $("#contenidoFaltantes").html(mensaje);
        });

    }else{
        controlAdd(false);
        $("#contenidoFaltantes").html('');
    }

};

function registrarFaltas(){
    $("#miModalMulti .close").click();
    bloquear();

    var i = 1;
    var cf = $('#contenidoFaltantes tr').length;

    if(cf==0){
        desbloquear();
        alert("NO EXISTEN DATOS A REGISTRAR");

    }else{

        while (i<=cf){
            var datosAlumno = document.getElementById('ALU'+i).value;
            var datosHora = document.getElementById("HOR").value;

            $.post("procesos/registrarFaltantes.php", {codigo: datosAlumno, hora: datosHora});

            if(i==cf){
                desbloquear();
                modalOKI(2);
                $("#contenidoFaltantes").html('');
                break;
            }

            i++;
        }

    }

}

function modalMulti(des){
    var text = "";
    switch(des){
        case 1:
            text = "¿Deseas Registrarlo?";
            $("#eventoTotal").attr('onclick', 'registrarFaltas();');
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
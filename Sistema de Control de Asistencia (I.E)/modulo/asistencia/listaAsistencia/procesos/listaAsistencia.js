$(document).ready(function(){
    inicio();
});

function inicio(){
    $('input[type="text"]').val('');
    $('input[type="date"]').val('');
    $('select').val('');
    controlAdd(false);
}

function controlAdd(isNot){
    isNot = !isNot;
    $("#btn-exportar").prop("disabled", isNot);
}

function buscarAsistencia() {
    var x = {s1:"", s2:"", s3:"", s4:""};

    if (document.getElementById("turno").value != ""){
        x["s1"] = document.getElementById("turno").value;
    }
    if (document.getElementById("salon").value != ""){
        x["s2"] = document.getElementById("salon").value;
    }
    if (document.getElementById("inicio").value != ""){
        x["s3"] = document.getElementById("inicio").value;
    }
    if (document.getElementById("fin").value != ""){
        x["s4"] = document.getElementById("fin").value;
    }

    if (document.getElementById("turno").value != "" && document.getElementById("salon").value != "" && document.getElementById("inicio").value != "" && document.getElementById("fin").value != ""){
        controlAdd(true);

        $.post("procesos/buscarAsistencia.php", {valor: x}, function(mensaje) {
            $("#contenidoAsistencia").html(mensaje);
        });

    }else{
        controlAdd(false)
        $("#contenidoAsistencia").html('');
    }


};

/*function exportarExcel(){
    var form = $(document.createElement('form'));
    $(form).attr("action", "procesos/exportarExcel.php");
    $(form).attr("method", "POST");
    $(form).css("display", "none");

    form.appendTo(document.body);
    $(form).submit();

    //DESTROY
    form.remove();
}*/
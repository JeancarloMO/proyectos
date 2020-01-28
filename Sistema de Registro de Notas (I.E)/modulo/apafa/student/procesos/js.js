function modalObs(dato){

    $.post("procesos/obs.php", {valor: dato}, function(mensaje){

        var cadena = mensaje.split("|")

        var codigo = cadena[0];
        var docente = "Docente: "+cadena[1]+" "+cadena[2]+", "+cadena[3];
        var obs = cadena[4];

        $("#obs_docente").html(docente);
        document.getElementById("obs_codigo").value = codigo;
        document.getElementById("obs").value = obs;

        $('#miModalObs').modal('show');
        $('#miModalObs').on('shown.bs.modal', function () {
            $('#obs').focus();
        });

    });

}
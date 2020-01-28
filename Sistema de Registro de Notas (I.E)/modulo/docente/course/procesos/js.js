function actualizarNotas(cod, dato, cc){

    var max = "2";
    var cadena = document.getElementById(dato).value;
    var texto = $("input#".concat(dato)).val();
    var longitud = cadena.length;
    if(longitud <= max){
        
        if(cadena <= 20){
            $.post("procesos/actualizarNota.php", {campo: cc, valor: cadena, codigo: cod});
        }else{
            cadena = "";
            $.post("procesos/actualizarNota.php", {campo: cc, valor: cadena, codigo: cod}, function(){
                alert("registrar un valor menor o igual a 20");
                document.getElementById(dato).value = "";
            });
        }
        
    }

}

function actualizarObs(){

    var cod = document.getElementById("obs_codigo").value;
    var obs = document.getElementById("obs").value;
    
    $.post("procesos/actualizarObs.php", {valor: obs, codigo: cod}, function(){
        $("#miModalObs .close").click();
    });
    
}

function modalObs(dato){

    $.post("procesos/obs.php", {valor: dato}, function(mensaje){

        var cadena = mensaje.split("|")

        var codigo = cadena[0];
        var alumno = "Alumno: "+cadena[1]+" "+cadena[2]+", "+cadena[3];
        var obs = cadena[4];

        $("#obs_alumno").html(alumno);
        document.getElementById("obs_codigo").value = codigo;
        document.getElementById("obs").value = obs;

        $('#miModalObs').modal('show');
        $('#miModalObs').on('shown.bs.modal', function () {
            $('#obs').focus();
        });

    });

}
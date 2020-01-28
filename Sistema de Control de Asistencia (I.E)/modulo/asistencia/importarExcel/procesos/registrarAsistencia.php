<?php
include ('../../../../assets/php/funciones.php');

$conectar = new Funciones();

$date = date_create($_POST['hora']);
$fecha = date_format($date, 'Y-m-d');

$consulta = $conectar -> Seleccionar("SELECT * FROM asistencia WHERE cod_persona = '".$_POST['codigo']."' AND CAST(entrada AS DATE) = '".$fecha."'");

if(mysqli_num_rows($consulta)>0){

    $conectar -> Actualizar("asistencia", "entrada = '".$_POST['hora']."', estado = 'A' ", "cod_persona = '".$_POST['codigo']."' ");

}else{

    $conectar -> Insertar("asistencia", "cod_persona, entrada, estado", " '".$_POST['codigo']."', '".$_POST['hora']."', 'A' ");

}

?>
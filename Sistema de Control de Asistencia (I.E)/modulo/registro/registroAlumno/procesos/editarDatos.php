<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$dato = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_alumno, paterno, materno, nombres, convalidacion, obs
            FROM alumno WHERE cod_alumno = '".$dato."' ");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4]. '|' .$fila[5];

}

$mensaje=$mensaje;
echo $mensaje;
?>
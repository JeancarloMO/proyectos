<?php

include('../../../../assets/php/funciones.php');

$dato = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_alumno, paterno, materno, nombres FROM alumno WHERE cod_alumno = '".$dato."' ");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3];
    
}

$mensaje=$mensaje;
echo $mensaje;

?>
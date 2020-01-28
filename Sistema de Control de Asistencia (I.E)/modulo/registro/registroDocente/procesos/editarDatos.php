<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$dato = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_docente, paterno, materno, nombres, obs
            FROM docente WHERE cod_docente = '".$dato."' ");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4];

}

$mensaje=$mensaje;
echo $mensaje;
?>
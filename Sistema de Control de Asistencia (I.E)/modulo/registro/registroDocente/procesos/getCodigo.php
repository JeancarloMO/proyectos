<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$mensaje = "10000001";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_docente FROM docente ORDER BY cod_docente DESC LIMIT 1");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]+1;
    
}

$mensaje=$mensaje;
echo $mensaje;
?>
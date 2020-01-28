<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$mensaje = "201900001";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_alumno FROM alumno ORDER BY cod_alumno DESC LIMIT 1");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]+1;
    
}

$mensaje=$mensaje;
echo $mensaje;
?>
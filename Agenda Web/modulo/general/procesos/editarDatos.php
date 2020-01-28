<?php 
session_start();

include('../../../assets/php/conexion.php');

$dato = $_POST['valor'];

$mensaje = "";

$conectar = new conexion('A');

$consulta = "SELECT * FROM actividades WHERE cod_actividad = '".$dato."' ";

$con = $conectar->abrirConexion();

$stmt = sqlsrv_query($con, $consulta);

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $inicio = $fila[3]->format('Y-m-d');
    $fin = $fila[4]->format('Y-m-d');
    
    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$inicio. '|' .$fin;

}

$conectar->cerrarConexion($stmt, $con);

$mensaje=$mensaje;
echo $mensaje;
?>
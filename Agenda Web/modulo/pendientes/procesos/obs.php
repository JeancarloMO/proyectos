<?php
session_start();

include('../../../assets/php/conexion.php');

$dato = $_POST['valor'];

$mensaje = "";

$conectar = new conexion('A');
$consulta = "SELECT cod_actividad, descripcion, obs FROM actividades WHERE estado = '1' AND responsable = '".$_SESSION["agd_USUARIO"]."' AND cod_actividad = '".$dato."' ";

$con = $conectar->abrirConexion();

$stmt = sqlsrv_query($con, $consulta);

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2];

}

$conectar->cerrarConexion($stmt, $con);

$mensaje = $mensaje;
echo $mensaje;

?>
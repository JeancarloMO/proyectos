<?php
session_start();

include('../../../assets/php/conexion.php');

$obs = NULL;
$codigo = NULL;

if(isset($_POST["valor"]) and isset($_POST["codigo"])){

    $obs = $_POST["valor"];
    $codigo = $_POST["codigo"];

    $conectar = new conexion('A');

    $consulta = "UPDATE actividades SET obs = '".$obs."' WHERE cod_actividad = '".$codigo."'";

    $con = $conectar->abrirConexion();

    $stmt = sqlsrv_query($con, $consulta);

    $conectar->cerrarConexion($stmt, $con);

}

?>
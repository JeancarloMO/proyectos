<?php 
session_start();

include('../../../assets/php/conexion.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar = new conexion('A');

    $consulta = "EXECUTE registrar_actividad '".$_SESSION["agd_USUARIO"]."', '".$datosR[0]."', '".$datosR[1]."', '".$datosR[2]."', '".$datosR[3]."', '".$_SESSION["agd_USUARIO"]."' ";

    $con = $conectar->abrirConexion();

    $stmt = sqlsrv_query($con, $consulta);

    if($stmt){
        $mensaje = "OK";
    }else{
        $mensaje = "NUL";
    }
    echo $mensaje;

    $conectar->cerrarConexion($stmt, $con);

}else{
    echo $mensaje;
}

?>
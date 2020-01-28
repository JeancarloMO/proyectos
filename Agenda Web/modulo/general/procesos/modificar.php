<?php 
session_start();

include('../../../assets/php/conexion.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar = new conexion('A');

    $consulta = "UPDATE actividades SET descripcion = '".$datosR[1]."', area = '".$datosR[2]."', inicio = '".$datosR[3]."', 
                fin = '".$datosR[4]."'
                WHERE cod_actividad = '".$datosR[0]."' ";

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
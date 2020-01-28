<?php 
session_start();

include('../../../assets/php/conexion.php');

$codigo = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $codigo = $_POST['valor'];

    $conectar = new conexion('A');

    $consulta = "UPDATE actividades SET finalizacion = '1'
                WHERE cod_actividad = '".$codigo."' ";

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
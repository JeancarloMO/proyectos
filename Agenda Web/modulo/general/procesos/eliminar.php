<?php 
session_start();

include('../../../assets/php/conexion.php');

$codigo = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $codigo = $_POST['valor'];
    
    $ahora = gmdate("Y-m-d",time() + 3600*(-5 + date("I")));

    $conectar = new conexion('A');

    $consulta = "UPDATE actividades SET estado = '0' , entrega = '".$ahora."'
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
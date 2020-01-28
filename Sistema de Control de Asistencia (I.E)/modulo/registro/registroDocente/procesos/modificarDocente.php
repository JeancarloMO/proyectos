<?php 
session_start();

include('../../../../assets/php/funciones.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar= new Funciones('A');

    $consulta = "UPDATE docente SET paterno = '".$datosR[1]."', materno = '".$datosR[2]."', nombres = '".$datosR[3]."',
                obs = '".$datosR[4]."'
                WHERE cod_docente = '".$datosR[0]."' ";

    $resultado = $conectar->Seleccionar($consulta);

    if($resultado == true){
        $mensaje = "OK";
    }else{
        $mensaje = "NUL";
    }
    echo $mensaje;

}else{
    echo $mensaje;
}

?>
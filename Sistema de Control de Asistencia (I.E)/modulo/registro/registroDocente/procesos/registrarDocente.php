<?php 
session_start();

include('../../../../assets/php/funciones.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar= new Funciones('A');

    $consulta = "INSERT INTO docente (cod_docente, paterno, materno, nombres, obs) VALUES ('".$datosR[0]."', '".$datosR[1]."', '".$datosR[2]."', '".$datosR[3]."', '".$datosR[4]."')";

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
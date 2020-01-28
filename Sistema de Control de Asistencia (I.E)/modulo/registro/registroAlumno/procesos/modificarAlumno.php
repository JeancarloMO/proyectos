<?php 
session_start();

include('../../../../assets/php/funciones.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar= new Funciones('A');

    $consulta = "UPDATE alumno SET paterno = '".$datosR[1]."', materno = '".$datosR[2]."', nombres = '".$datosR[3]."', convalidacion =                       '".$datosR[4]."', obs = '".$datosR[5]."'
                WHERE cod_alumno = '".$datosR[0]."' ";

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
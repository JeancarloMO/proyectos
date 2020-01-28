<?php 
session_start();

include('../../../../assets/php/funciones.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar= new Funciones('A');

    $consulta = "UPDATE matricula SET cod_alumno = '".$datosR[1]."', cod_salon = '".$datosR[2]."', 
                cod_turno = '".$datosR[3]."', cod_docente = '".$datosR[4]."', obs = '".$datosR[5]."'
                WHERE cod_matricula = '".$datosR[0]."' ";

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
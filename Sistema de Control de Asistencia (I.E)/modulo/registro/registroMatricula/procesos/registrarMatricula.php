<?php 
session_start();

include('../../../../assets/php/funciones.php');

$datosR = NULL;
$mensaje = "";

if(isset($_POST['valor'])){
    $datosR = $_POST['valor'];

    $conectar= new Funciones();

    $consultaExiste = $conectar -> Seleccionar("SELECT * FROM matricula WHERE cod_alumno = '".$datosR[0]."' AND semestre = '".$datosR[4]."'");

    if(mysqli_num_rows($consultaExiste)>0){

        $mensaje = "EXISTS";
        echo $mensaje;

    }else{

        $consulta = "INSERT INTO matricula (cod_alumno, cod_salon, cod_turno, cod_docente, semestre, obs) VALUES ('".$datosR[0]."', '".$datosR[1]."', '".$datosR[2]."', '".$datosR[3]."', '".$datosR[4]."', '".$datosR[5]."')";

        $resultado = $conectar->Seleccionar($consulta);

        if($resultado == true){
            $mensaje = "OK";
        }else{
            $mensaje = "NUL";
        }
        echo $mensaje;

    }

}else{
    echo $mensaje;
}

?>
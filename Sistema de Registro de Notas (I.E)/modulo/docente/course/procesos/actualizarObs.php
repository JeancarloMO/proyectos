<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$obs = NULL;
$codigo = NULL;

if(isset($_POST["valor"]) and isset($_POST["codigo"])){
    
    $obs = $_POST["valor"];
    $codigo = $_POST["codigo"];

    $conectar= new Funciones();

    $consulta = "UPDATE matricula SET obs = '".$obs."' WHERE cod_matricula = '".$codigo."' ";

    $resultado = $conectar->Seleccionar($consulta);

}

?>
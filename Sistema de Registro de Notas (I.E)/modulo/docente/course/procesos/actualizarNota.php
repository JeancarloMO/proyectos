<?php 
session_start();

include('../../../../assets/php/funciones.php');

$campo = NULL;
$nota = NULL;
$codigo = NULL;

if(isset($_POST["valor"]) and isset($_POST["codigo"])){
    
    $campo = $_POST["campo"];
    $nota = $_POST["valor"];
    $codigo = $_POST["codigo"];

    $conectar= new Funciones();

    $consulta = "UPDATE matricula SET ".$campo." = '".$nota."' WHERE cod_matricula = '".$codigo."' ";

    $resultado = $conectar->Seleccionar($consulta);

}

?>
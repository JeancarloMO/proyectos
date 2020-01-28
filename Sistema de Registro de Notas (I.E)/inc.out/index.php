<?php

session_start();

$usuario = NULL;
$clave = NULL;
$a=md5(uniqid(mt_rand(), true));
$b=(microtime(TRUE));
$r=$a."-".$b;

include ('../assets/php/funciones.php');

try{
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        if(!empty($_POST['usuario']) && !empty($_POST['clave'])){
            $tipo = $_POST['tipo'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            $conectar = new Funciones();
            $consulta = "SELECT P.paterno, P.materno, P.nombres, U.tipo_usuario, P.documento FROM usuario AS U INNER JOIN persona AS P ON U.documento = P.documento WHERE U.tipo_usuario = '".$tipo."' AND U.usuario = '".$usuario."' AND U.clave = '".$clave."' ";
            $resultado = $conectar->Seleccionar($consulta);

            $fila = $resultado->fetch_array();
            if ($fila != NULL){
                
                $_SESSION["fa_NOMBRES"] = $fila[2];
                $_SESSION["fa_APELLIDOS"] = $fila[0].' '.$fila[1];
                $_SESSION["fa_TIPO_USUARIO"] = $fila[3];
                $_SESSION["fa_DOCUMENTO"] = $fila[4];
                $_SESSION["fa_PERIODO"] = 2019;

                header('Location: ../modulo/?t='.$r);

            }else{
                $_SESSION['fallo']="falloClave";
                header("Location: ../?v=falloClave&t=".$r);
            }
        }else{
            $_SESSION['fallo']="falloClave";
            header("Location: ../?v=falloClave&t=".$r);
        }
    }else{
        $_SESSION['fallo']="fallo";
        header("Location: ../?v=fallo&t=".$r);
    }
}catch (Exception $e){
    $_SESSION['fallo']="fallo";
    header("Location: ../?v=fallo&t=".$r);
}
?>
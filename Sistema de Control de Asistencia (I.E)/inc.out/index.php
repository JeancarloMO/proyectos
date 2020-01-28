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
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            $conectar = new Funciones();
            $consulta = "SELECT usuario, clave FROM usuario WHERE usuario = '".$usuario."' AND clave = '".$clave."' ";
            $resultado = $conectar->Seleccionar($consulta);

            $fila = $resultado->fetch_array();
            if ($fila != NULL){

                $_SESSION['USUARIO'] = $fila[0];
                $_SESSION['PERIODO'] = '2019';
                
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
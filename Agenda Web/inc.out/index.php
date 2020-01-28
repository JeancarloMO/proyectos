<?php

session_start();

$usuario = NULL;
$clave = NULL;
session_start();

include ('../assets/php/conexion.php');

try{
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        if(!empty($_POST['usuario']) && !empty($_POST['clave'])){
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            $conectar = new conexion('A');
            $consulta = "SELECT usuario, clave, nombres, apellidos, estado, tipo FROM usuario WHERE usuario = '".$usuario."' AND clave = '".$clave."' ";
            $conx = $conectar->abrirConexion();
            $stmtx = sqlsrv_query($conx, $consulta, array(), array("Scrollable"=>"buffered"));
            $vs=sqlsrv_num_rows($stmtx);

            if($vs>0){

                while($fila = sqlsrv_fetch_array($stmtx, SQLSRV_FETCH_NUMERIC)){

                    if($fila[4] == '0'){
                        
                        header("Location: ../?v=fallo&t=".$r);
                        
                    }else{

                        $_SESSION["agd_USUARIO"] = $fila[0];
                        $_SESSION["agd_NOMBRES"] = $fila[2];
                        $_SESSION["agd_APELLIDOS"] = $fila[3];
                        $_SESSION['agd_TIPO'] = $fila[5];

                        if($_SESSION["agd_TIPO"] == "administrador"){

                            header("Location: ../modulo/");

                        }elseif($_SESSION["agd_TIPO"] == "user"){

                            header("Location: ../modulo/");

                        }
                        
                    }

                }

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
<?php

class Validar{
    
    #VALIDAR USUARIO
    #----------------------------------------------
    
    public function validarUsuarioController(){

        if(isset($_POST["usuario"])){

            $datosController = array("usuario" => $_POST["usuario"], "password" => $_POST["password"]);

            $respuesta = Datos::validarUsuarioModel($datosController, "USUARIO");

            if($respuesta == "OK"){
                
                $_SESSION["log_USUARIO"] = $_POST["usuario"];

                header("location:bienvenido");

            }else{
                
                header("location:falloClave");
                
            }

        }

    }
    
}
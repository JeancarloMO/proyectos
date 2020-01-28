<?php

class Datos extends conexion{

    # VALIDACION DE DATOS DE USUARIO
    #----------------------------------------------

    public function validarUsuarioModel($datosModel, $tabla){

        $usuario = $datosModel["usuario"];
        $password = $datosModel["password"];

        $conectar = new conexion('A');
        $consulta = "SELECT usuario, clave FROM ".$tabla." WHERE usuario = '".$usuario."' AND clave = '".$password."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if(sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)>0) {
            return "OK";
        }else{
            return "ERROR";
        }

    }

}
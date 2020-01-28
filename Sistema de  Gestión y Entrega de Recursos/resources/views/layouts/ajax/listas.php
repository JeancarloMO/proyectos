<?php

session_start();

require_once "../../../../database/conexion.php";
require_once "../../../../app/controllers/listas.php";
require_once "../../../../app/models/listas.php";

$mensaje = "";

if(isset($_POST["ajax"])){

    $funcion = $_POST["ajax"];

    switch ($funcion){

        #LISTA COMPRAS

        case "buscarlistaProductos":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendListas::buscarListaProductos_Controller($datos);
            break;

        case "buscarlistaComprobantes":
            $datos = array("comprobante" => $_POST["enviarComprobante"], 
                            "nro_comprobante" => $_POST["enviarNro_comprobante"],
                            "proveedor" => $_POST["enviarProveedor"], 
                            "fecha" => $_POST["enviarFecha"]);
            $mensaje = SendListas::buscarListaComprobantes_Controller($datos);
            break;

        #LISTA ENTREGAS

        case "buscarlistaProducto":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendListas::buscarListaProducto_Controller($datos);
            break;

        case "buscarlistaEntregas":
            $datos = array("area" => $_POST["enviarArea"], 
                            "fecha" => $_POST["enviarFecha"]);
            $mensaje = SendListas::buscarListaEntregas_Controller($datos);
            break;

    }

    echo $mensaje;

}
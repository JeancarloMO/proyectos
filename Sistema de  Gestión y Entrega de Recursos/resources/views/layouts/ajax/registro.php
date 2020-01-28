<?php

session_start();

require_once "../../../../database/conexion.php";
require_once "../../../../app/controllers/registro.php";
require_once "../../../../app/models/registro.php";

$mensaje = "";

if(isset($_POST["ajax"])){

    $funcion = $_POST["ajax"];

    switch ($funcion){

        #REGISTRO PERSONA

        case "generarCodigoPersona":
            $mensaje = SendRegistro::generarCodigoPersona_Controller();
            break;

        case "registrarPersona":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "apellidos" => $_POST["enviarApellidos"], 
                            "nombres" => $_POST["enviarNombres"], 
                            "documento" => $_POST["enviarDocumento"], 
                            "nro_documento" => $_POST["enviarNro_documento"], 
                            "obs" => $_POST["enviarObs"]);
            $mensaje = SendRegistro::registrarPersona_Controller($datos);
            break;
            
        case "buscarlistaPersona":
            $datos = array("persona" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaPersona_Controller($datos);
            break;

        case "seleccionarPersona":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosPersona_Controller($datos);
            break;

        case "modificarPersona":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "apellidos" => $_POST["enviarApellidos"], 
                            "nombres" => $_POST["enviarNombres"], 
                            "documento" => $_POST["enviarDocumento"], 
                            "nro_documento" => $_POST["enviarNro_documento"], 
                            "obs" => $_POST["enviarObs"]);
            $mensaje = SendRegistro::modificarPersona_Controller($datos);
            break;

        #REGISTRO AREA

        case "registrarArea":
            $datos = array("area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::registrarArea_Controller($datos);
            break;
            
        case "buscarlistaArea":
            $datos = array("area" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaArea_Controller($datos);
            break;

        case "seleccionarArea":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosArea_Controller($datos);
            break;

        case "modificarArea":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::modificarArea_Controller($datos);
            break;

        #REGISTRO CARGO

        case "registrarCargo":
            $datos = array("area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::registrarArea_Controller($datos);
            break;
            
        case "buscarlistaCargo":
            $datos = array("cargo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaCargo_Controller($datos);
            break;

        case "seleccionarCargo":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosCargo_Controller($datos);
            break;

        case "modificarCargo":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::modificarArea_Controller($datos);
            break;

        #REGISTRO PERSONAL

        case "generarCodigoPersonal":
            $mensaje = SendRegistro::generarCodigoPersonal_Controller();
            break;

        case "registrarPersonal":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_area" => $_POST["enviarCod_area"], 
                            "cod_cargo" => $_POST["enviarCod_cargo"], 
                            "cod_persona" => $_POST["enviarCod_persona"], 
                            "obs" => $_POST["enviarObs"]);
            $mensaje = SendRegistro::registrarPersonal_Controller($datos);
            break;
            
        case "buscarlistaPersonal":
            $datos = array("personal" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaPersonal_Controller($datos);
            break;

        case "seleccionarPersonal":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosPersonal_Controller($datos);
            break;

        case "modificarPersonal":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_area" => $_POST["enviarCod_area"], 
                            "cod_cargo" => $_POST["enviarCod_cargo"], 
                            "cod_persona" => $_POST["enviarCod_persona"], 
                            "obs" => $_POST["enviarObs"]);
            $mensaje = SendRegistro::modificarPersonal_Controller($datos);
            break;

        #REGISTRO CATEGORIA

        case "registrarCategoria":
            $datos = array("categoria" => $_POST["enviarCategoria"]);
            $mensaje = SendRegistro::registrarCategoria_Controller($datos);
            break;
            
        case "buscarlistaCategoria":
            $datos = array("categoria" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaCategoria_Controller($datos);
            break;

        case "seleccionarCategoria":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosCategoria_Controller($datos);
            break;

        case "modificarCategoria":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "categoria" => $_POST["enviarCategoria"]);
            $mensaje = SendRegistro::modificarCategoria_Controller($datos);
            break;

        #REGISTRO SUBCATEGORIA

        case "registrarSubcategoria":
            $datos = array("cod_categoria" => $_POST["enviarCod_categoria"], 
                            "subcategoria" => $_POST["enviarSubcategoria"]);
            $mensaje = SendRegistro::registrarSubcategoria_Controller($datos);
            break;
            
        case "buscarlistaSubcategoria":
            $datos = array("subcategoria" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaSubcategoria_Controller($datos);
            break;

        case "seleccionarSubcategoria":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosSubcategoria_Controller($datos);
            break;

        case "modificarSubcategoria":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_categoria" => $_POST["enviarCod_categoria"], 
                            "subcategoria" => $_POST["enviarSubcategoria"]);
            $mensaje = SendRegistro::modificarSubcategoria_Controller($datos);
            break;

        #REGISTRO FAMILIA

        case "registrarFamilia":
            $datos = array("area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::registrarArea_Controller($datos);
            break;
            
        case "buscarlistaFamilia":
            $datos = array("familia" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaArea_Controller($datos);
            break;

        case "seleccionarFamilia":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosFamilia_Controller($datos);
            break;

        case "modificarFamilia":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "area" => $_POST["enviarArea"]);
            $mensaje = SendRegistro::modificarArea_Controller($datos);
            break;

        #REGISTRO PRODUCTO

        case "generarCodigoProducto":
            $mensaje = SendRegistro::generarCodigoProducto_Controller();
            break;
            
        case "registrarProducto":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_familia" => $_POST["enviarCod_familia"], 
                            "producto" => $_POST["enviarProducto"], 
                            "descripcion" => $_POST["enviarDescripcion"],
                            "presentacion" => $_POST["enviarPresentacion"], 
                            "marca" => $_POST["enviarMarca"], 
                            "modelo" => $_POST["enviarModelo"],
                            "color" => $_POST["enviarColor"]);
            $mensaje = SendRegistro::registrarProducto_Controller($datos);
            break;

        case "buscarlistaProducto":
            $datos = array("producto" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaProducto_Controller($datos);
            break;
            
        case "seleccionarProducto":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosProducto_Controller($datos);
            break;
            
        case "modificarProducto":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_familia" => $_POST["enviarCod_familia"], 
                            "producto" => $_POST["enviarProducto"], 
                            "descripcion" => $_POST["enviarDescripcion"],
                            "presentacion" => $_POST["enviarPresentacion"], 
                            "marca" => $_POST["enviarMarca"], 
                            "modelo" => $_POST["enviarModelo"],
                            "color" => $_POST["enviarColor"]);
            $mensaje = SendRegistro::modificarProducto_Controller($datos);
            break;

        #REGISTRO PROVEEDOR

        case "registrarProveedor":
            $datos = array("ruc" => $_POST["enviarRuc"], 
                            "proveedor" => $_POST["enviarProveedor"], 
                            "contacto" => $_POST["enviarContacto"], 
                            "direccion" => $_POST["enviarDireccion"]);
            $mensaje = SendRegistro::registrarProveedor_Controller($datos);
            break;

        case "buscarlistaProveedor":
            $datos = array("proveedor" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaProveedor_Controller($datos);
            break;

        case "seleccionarProveedor":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosProveedor_Controller($datos);
            break;

        case "modificarProveedor":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "ruc" => $_POST["enviarRuc"],
                            "proveedor" => $_POST["enviarProveedor"], 
                            "contacto" => $_POST["enviarContacto"], 
                            "direccion" => $_POST["enviarDireccion"]);
            $mensaje = SendRegistro::modificarProveedor_Controller($datos);
            break;

        #REGISTRO COMPRAS

        case "generarCodigoCompra":
            $mensaje = SendRegistro::generarCodigoCompra_Controller();
            break;

        case "selectComprobante":
            $mensaje = SendRegistro::selectComprobante_Controller();
        break;

        case "registrarCompra":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "tipo_comprobante" => $_POST["enviarTipo_Comprobante"], 
                            "nro_comprobante" => $_POST["enviarNro_Comprobante"],
                            "proveedor" => $_POST["enviarProveedor"], 
                            "tipo_igv" => $_POST["enviarTipo_igv"], 
                            "porcentaje_igv" => $_POST["enviarPorcentaje_igv"],
                            "subtotal" => $_POST["enviarSubtotal"], 
                            "importe" => $_POST["enviarImporte"], 
                            "fecha" => $_POST["enviarFecha"], 
                            "tabla" => $_POST["enviarDatos"], 
                            "n" => $_POST["enviarN"]);
            $mensaje = SendRegistro::registrarCompra_Controller($datos);
            break;

        #REGISTRO ENTREGAS

        case "generarCodigoEntrega":
            $mensaje = SendRegistro::generarCodigoEntrega_Controller();
            break;

        case "buscarlistaStock":
            $datos = array("producto" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::buscarListaStock_Controller($datos);
            break;

        case "seleccionarStock":
            $datos = array("codigo" => $_POST["buscarDatos"]);
            $mensaje = SendRegistro::seleccionarDatosStock_Controller($datos);
            break;

        case "registrarEntrega":
            $datos = array("codigo" => $_POST["enviarCodigo"], 
                            "cod_subcategoria" => $_POST["enviarCod_subcategoria"], 
                            "cod_area" => $_POST["enviarCod_area"],
                            "cod_personal" => $_POST["enviarCod_personal"], 
                            "fecha" => $_POST["enviarFecha"], 
                            "tabla" => $_POST["enviarDatos"], 
                            "n" => $_POST["enviarN"]);
            $mensaje = SendRegistro::registrarEntrega_Controller($datos);
            break;

    }

    echo $mensaje;

}
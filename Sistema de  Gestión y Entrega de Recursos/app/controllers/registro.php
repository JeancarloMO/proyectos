<?php

class SendRegistro{

    # CODIGO PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function generarCodigoPersona_Controller(){

        $respuesta = ReceivesRegistro::generarCodigoPersona_Model();

        return $respuesta;

    }

    # REGISTRAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function registrarPersona_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarPersona_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function buscarListaPersona_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaPersona_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function seleccionarDatosPersona_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosPersona_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function modificarPersona_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarPersona_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function registrarArea_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarArea_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function buscarListaArea_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaArea_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS AREA (REGISTRO AREA)
    #----------------------------------------------

    public function seleccionarDatosArea_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosArea_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function modificarArea_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarArea_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function registrarCargo_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarCargo_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function buscarListaCargo_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaCargo_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function seleccionarDatosCargo_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosCargo_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function modificarCargo_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarCargo_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # CODIGO PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function generarCodigoPersonal_Controller(){

        $respuesta = ReceivesRegistro::generarCodigoPersonal_Model();

        return $respuesta;

    }

    # SELECT CARGO
    #----------------------------------------------

    public function selectCargo_Controller(){

        $respuesta = ReceivesRegistro::selectCargo_Model();

        return $respuesta;

    }

    # REGISTRAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function registrarPersonal_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarPersonal_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function buscarListaPersonal_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaPersonal_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function seleccionarDatosPersonal_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosPersonal_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function modificarPersonal_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarPersonal_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function registrarCategoria_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarCategoria_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function buscarListaCategoria_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaCategoria_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function seleccionarDatosCategoria_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosCategoria_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function modificarCategoria_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarCategoria_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function registrarSubcategoria_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarSubcategoria_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function buscarListaSubcategoria_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaSubcategoria_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function seleccionarDatosSubcategoria_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosSubcategoria_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function modificarSubcategoria_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarSubcategoria_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR FAMILA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function registrarFamilia_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarFamilia_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function buscarListaFamilia_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaFamilia_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function seleccionarDatosFamilia_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosFamilia_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function modificarFamilia_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarFamilia_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # CODIGO PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function generarCodigoProducto_Controller(){

        $respuesta = ReceivesRegistro::generarCodigoProducto_Model();

        return $respuesta;

    }

    # REGISTRAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function registrarProducto_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarProducto_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function buscarListaProducto_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaProducto_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function seleccionarDatosProducto_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosProducto_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function modificarProducto_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarProducto_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # REGISTRAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function registrarProveedor_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarProveedor_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

    # BUSCAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function buscarListaProveedor_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaProveedor_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function seleccionarDatosProveedor_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosProveedor_Model($datosController);

        return $respuesta;

    }

    # MODIFICAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function modificarProveedor_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::modificarProveedor_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # CODIGO COMPRA (REGISTRO COMPRAS)
    #----------------------------------------------

    public function generarCodigoCompra_Controller(){

        $respuesta = ReceivesRegistro::generarCodigoCompra_Model();

        return $respuesta;

    }

    # SELECT COMPROBANTE
    #----------------------------------------------

    public function selectComprobante_Controller(){

        $respuesta = ReceivesRegistro::selectComprobante_Model();

        return $respuesta;

    }

    # REGISTRAR COMPRAS (REGISTRO COMPRAS)
    #----------------------------------------------

    public function registrarCompra_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarCompra_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }


    # CODIGO ENTREGA (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function generarCodigoEntrega_Controller(){

        $respuesta = ReceivesRegistro::generarCodigoEntrega_Model();

        return $respuesta;

    }

    # BUSCAR STOCK (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function buscarListaStock_Controller($datosController){

        $respuesta = ReceivesRegistro::buscarListaStock_Model($datosController);

        return $respuesta;

    }

    # SELECCIONAR EDITAR DATOS STOCK (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function seleccionarDatosStock_Controller($datosController){

        $respuesta = ReceivesRegistro::seleccionarDatosStock_Model($datosController);

        return $respuesta;

    }

    # REGISTRAR ENTREGAS (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function registrarEntrega_Controller($datosController){

        if($datosController <> ""){

            $respuesta = ReceivesRegistro::registrarEntrega_Model($datosController);

            if($respuesta == true){
                return "OK";
            }else{
                return "NUL";
            }

        }else{
            return "";
        }

    }

}
<?php

class SendListas{

    # BUSCAR LISTA COMPROBANTES (LISTA COMPRAS)
    #----------------------------------------------

    public function buscarListaComprobantes_Controller($datosController){

        $respuesta = ReceivesListas::buscarListaComprobantes_Model($datosController);

        return $respuesta;

    }

    # BUSCAR LISTA PRODUCTOS (LISTA COMPRAS)
    #----------------------------------------------

    public function buscarListaProductos_Controller($datosController){

        $respuesta = ReceivesListas::buscarListaProductos_Model($datosController);

        return $respuesta;

    }


    # SELECT CATEGORIA
    #----------------------------------------------

    public function selectCategoria_Controller(){

        $respuesta = ReceivesListas::selectCategoria_Model();

        return $respuesta;

    }

    # SELECT SUBCATEGORIA
    #----------------------------------------------

    public function selectSubcategoria_Controller(){

        $respuesta = ReceivesListas::selectSubcategoria_Model();

        return $respuesta;

    }

    # SELECT AREA
    #----------------------------------------------

    public function selectArea_Controller(){

        $respuesta = ReceivesListas::selectArea_Model();

        return $respuesta;

    }


    # BUSCAR LISTA ENTREGAS (LISTA ENTREGAS)
    #----------------------------------------------

    public function buscarListaEntregas_Controller($datosController){

        $respuesta = ReceivesListas::buscarListaEntregas_Model($datosController);

        return $respuesta;

    }

    # BUSCAR LISTA PRODUCTOS (LISTA ENTREGAS)
    #----------------------------------------------

    public function buscarListaProducto_Controller($datosController){

        $respuesta = ReceivesListas::buscarListaProducto_Model($datosController);

        return $respuesta;

    }


    # SELECT FAMILIA
    #----------------------------------------------

    public function selectFamilia_Controller(){

        $respuesta = ReceivesListas::selectFamilia_Model();

        return $respuesta;

    }


    # PRODUCTOS EN STOCK (STOCK)
    #----------------------------------------------

    public function productosStock_Controller($datosController){

        $respuesta = ReceivesListas::productosStock_Model($datosController);

        return $respuesta;

    }

}
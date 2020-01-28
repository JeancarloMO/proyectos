<?php

class ReceivesListas extends conexion{

    # BUSCAR LISTA COMPROBANTE (LISTA COMPROBANTE)
    #----------------------------------------------

    public function buscarListaComprobantes_Model($datosModel){

        if(isset($datosModel["comprobante"])){

            $comprobante = $datosModel["comprobante"];
            $nro_comprobante = $datosModel["nro_comprobante"];
            $proveedor = $datosModel["proveedor"];
            $fecha = $datosModel["fecha"];

        }else{

            $comprobante = "";
            $nro_comprobante = "";
            $proveedor = "";
            $fecha = "";

        }

        $condicion1 = "";
        $condicion2 = "";
        $condicion3 = "";
        $condicion4 = "";

        if ($comprobante <> ""){
            $condicion1 = "AND TC.cod_tipo_comprobante LIKE '%".$comprobante."%'";
        }
        if ($nro_comprobante <> ""){
            $condicion2 = "AND C.nro_comprobante LIKE '%".$nro_comprobante."%'";
        }
        if ($proveedor <> ""){
            $condicion3 = "AND PROV.proveedor LIKE '%".$proveedor."%'";
        }
        if ($fecha <> ""){
            $condicion4 = "AND C.fecha_compra = '".$fecha."'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT C.cod_comprobante, TC.tipo_comprobante, C.nro_comprobante, PROV.proveedor, C.fecha_compra, C.tipo_igv, C.IGV, C.subtotal, C.importe  
        FROM COMPROBANTE AS C
        INNER JOIN TIPO_COMPROBANTE AS TC ON C.cod_tipo_comprobante = TC.cod_tipo_comprobante
        INNER JOIN PROVEEDORES AS PROV ON C.cod_proveedor = PROV.cod_proveedor
        WHERE C.estado = 1 ".$condicion1." ".$condicion2." ".$condicion3." ".$condicion4." ORDER BY C.fecha_compra DESC";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            $fecha_compra = date_format($fila[4], 'd/m/Y');

            echo '<tr onclick="seleccionarComprobante('."'".$fila[0]."'".', '."'".$fila[5]."'".', '."'".$fila[6]."'".', '."'".$fila[7]."'".', '."'".$fila[8]."'".'); paint(this);" style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td>'.$fila[2].'</td>
                    <td>'.$fila[3].'</td>
                    <td class="text-center">'.$fecha_compra.'</td>
                </tr>';
        }

    }

    # BUSCAR LISTA PRODUCTOS (LISTA COMPRAS)
    #----------------------------------------------

    public function buscarListaProductos_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT CP.cantidad, CP.cod_producto, P.producto +' '+ P.presentacion +' '+ P.marca +' '+ P.modelo +' '+ P.color +' '+ P.descripcion, 
        CP.precio_unitario, CONVERT(decimal(10,2),(CP.cantidad * CP.precio_unitario))
        FROM COMPROBANTE AS C
        INNER JOIN COMPRAS AS CP ON C.cod_comprobante = CP.cod_comprobante
        INNER JOIN PRODUCTOS AS P ON CP.cod_producto = P.cod_producto
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE CP.estado = 1 AND C.cod_comprobante = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr>
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[0].'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td>'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                    <td class="text-center">'.$fila[4].'</td>
                </tr>';
        }

    }


    # SELECT CATEGORIA
    #----------------------------------------------

    public function selectCategoria_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM CATEGORIA";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';

        }

    }

    # SELECT SUBCATEGORIA
    #----------------------------------------------

    public function selectSubcategoria_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM SUBCATEGORIA";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[2].'</option>';

        }

    }

    # SELECT AREA
    #----------------------------------------------

    public function selectArea_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM AREA";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';

        }

    }


    # BUSCAR LISTA ENTREGAS (LISTA ENTREGAS)
    #----------------------------------------------

    public function buscarListaEntregas_Model($datosModel){

        if(isset($datosModel["area"])){

            $area = $datosModel["area"];
            $fecha = $datosModel["fecha"];

        }else{

            $area = "";
            $fecha = "";

        }

        $condicion1 = "";
        $condicion2 = "";

        if ($area <> ""){
            $condicion1 = "AND E.cod_area LIKE '%".$area."%'";
        }
        if ($fecha <> ""){
            $condicion2 = "AND E.fecha_entrega = '".$fecha."'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT DISTINCT E.cod_entrega, A.area, PE.apellidos +', '+ PE.nombres, E.fecha_entrega FROM
        ENTREGAS AS E
        INNER JOIN AREA AS A ON E.cod_area = A.cod_area
        INNER JOIN PERSONAL AS P ON E.receptor = P.cod_personal
        INNER JOIN PERSONAS AS PE ON P.cod_persona = PE.cod_persona
        WHERE E.estado = 1 ".$condicion1." ".$condicion2." ORDER BY E.fecha_entrega DESC";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            $fecha_entrega = date_format($fila[3], 'd/m/Y');

            echo '<tr onclick="seleccionarEntrega('."'".$fila[0]."'".'); paint(this);" style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td>'.$fila[1].'</td>
                    <td>'.$fila[2].'</td>
                    <td class="text-center">'.$fecha_entrega.'</td>
                </tr>';
        }

    }

    # BUSCAR LISTA PRODUCTOS (LISTA ENTREGAS)
    #----------------------------------------------

    public function buscarListaProducto_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT E.cod_producto, P.producto +' '+ P.presentacion +' '+ P.marca +' '+ P.modelo +' '+ P.color +' '+ P.descripcion, E.cantidad
        FROM ENTREGAS AS E
        INNER JOIN PRODUCTOS AS P ON E.cod_producto = P.cod_producto
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE E.estado = 1 AND E.cod_entrega = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr>
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[0].'</td>
                    <td>'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                </tr>';
        }

    }

    # SELECT FAMILIA
    #----------------------------------------------

    public function selectFamilia_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM FAMILIA";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';

        }

    }


    # PRODUCTOS EN STOCK (STOCK)
    #----------------------------------------------

    public function productosStock_Model($datosModel){

        if(isset($datosModel["producto"])){

            $producto = $datosModel["producto"];

        }else{

            $producto = "";

        }

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_producto, P.producto, P.presentacion +' '+ P.marca +' '+ P.modelo +' '+ P.color +' '+ P.descripcion, P.cantidad
        FROM PRODUCTOS AS P
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE P.estado = 1";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr>
                    <td class="text-center">'.$cont.'</td>
                    <td class="">'.$fila[1].'</td>
                    <td>'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                </tr>';
        }

    }

}
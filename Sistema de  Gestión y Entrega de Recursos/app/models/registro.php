<?php

class ReceivesRegistro extends conexion{

    function __construct(){
    }

    # CODIGO PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function generarCodigoPersona_Model(){

        $conectar = new conexion('A');
        $consulta = "EXECUTE generarCodigo_Persona";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            return $fila[0];
        }

    }

    # REGISTRAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function registrarPersona_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $nombres = $datosModel["nombres"];
        $apellidos = $datosModel["apellidos"];
        $documento = $datosModel["documento"];
        $nro_documento = $datosModel["nro_documento"];
        $obs = $datosModel["obs"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO PERSONAS (cod_persona, apellidos, nombres, documento, nro_documento, obs, estado, usuario_modifica, fecha_modificacion) 
        VALUES ('".$codigo."', '".$apellidos."', '".$nombres."', '".$documento."', '".$nro_documento."', '".$obs."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function buscarListaPersona_Model($datosModel){

        if(isset($datosModel["persona"])){
            $persona = $datosModel["persona"];
        }else{
            $persona = "";
        }

        $condicion = "";

        if ($persona <> ""){
            $condicion = "WHERE apellidos LIKE '%".$persona."%' OR nombres LIKE '%".$persona."%' OR nro_documento LIKE '%".$persona."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_persona, apellidos, nombres, documento, nro_documento, obs 
        FROM PERSONAS ".$condicion." ORDER BY apellidos";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarPersona('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                    <td class="text-center">'.$fila[4].'</td>
                    <td class="text-center">'.$fila[5].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function seleccionarDatosPersona_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_persona, apellidos, nombres, documento, nro_documento, obs 
        FROM PERSONAS WHERE cod_persona = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4]. '|' .$fila[5];
        }

    }

    #MODIFICAR PERSONA (REGISTRO PERSONA)
    #----------------------------------------------

    public function modificarPersona_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $nombres = $datosModel["nombres"];
        $apellidos = $datosModel["apellidos"];
        $documento = $datosModel["documento"];
        $nro_documento = $datosModel["nro_documento"];
        $obs = $datosModel["obs"];

        $conectar = new conexion('A');
        $consulta = "UPDATE PERSONAS SET nombres = '".$nombres."', apellidos = '".$apellidos."', 
        documento = '".$documento."', nro_documento = '".$nro_documento."', obs = '".$obs."', 
        usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_persona = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function registrarArea_Model($datosModel){

        $area = $datosModel["area"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO AREA VALUES ('".$area."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function buscarListaArea_Model($datosModel){

        if(isset($datosModel["area"])){
            $area = $datosModel["area"];
        }else{
            $area = "";
        }

        $condicion = "";

        if ($area <> ""){
            $condicion = "WHERE area LIKE '%".$area."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_area, area FROM AREA ".$condicion." ORDER BY area";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarArea('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS AREA (REGISTRO AREA)
    #----------------------------------------------

    public function seleccionarDatosArea_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_area, area FROM AREA WHERE cod_area = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1];
        }

    }

    #MODIFICAR AREA (REGISTRO AREA)
    #----------------------------------------------

    public function modificarArea_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $area = $datosModel["area"];

        $conectar = new conexion('A');
        $consulta = "UPDATE AREA SET area = '".$area."', usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_area = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function registrarCargo_Model($datosModel){

        $area = $datosModel["area"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO AREA (area) VALUES ('".$area."')";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function buscarListaCargo_Model($datosModel){

        if(isset($datosModel["cargo"])){
            $cargo = $datosModel["cargo"];
        }else{
            $cargo = "";
        }

        $condicion = "";

        if ($cargo <> ""){
            $condicion = "WHERE cargo LIKE '%".$cargo."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_cargo, cargo FROM CARGO ".$condicion." ORDER BY cargo";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarCargo('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function seleccionarDatosCargo_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_cargo, cargo FROM CARGO WHERE cod_cargo = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1];
        }

    }

    #MODIFICAR CARGO (REGISTRO CARGO)
    #----------------------------------------------

    public function modificarCargo_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $area = $datosModel["area"];

        $conectar = new conexion('A');
        $consulta = "UPDATE AREA SET area = '".$area."' WHERE cod_area = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # CODIGO PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function generarCodigoPersonal_Model(){

        $conectar = new conexion('A');
        $consulta = "EXECUTE generarCodigo_Personal";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            return $fila[0];
        }

    }

    # SELECT CARGO
    #----------------------------------------------

    public function selectCargo_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM CARGO";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';

        }

    }

    # REGISTRAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function registrarPersonal_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $cod_area = $datosModel["cod_area"];
        $cod_cargo = $datosModel["cod_cargo"];
        $cod_persona = $datosModel["cod_persona"];
        $obs = $datosModel["obs"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO PERSONAL (cod_personal, cod_persona, cod_cargo, cod_area, obs, estado, usuario_modifica, fecha_modificacion) 
        VALUES ('".$codigo."', '".$cod_persona."', '".$cod_cargo."', '".$cod_area."', '".$obs."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function buscarListaPersonal_Model($datosModel){

        if(isset($datosModel["personal"])){
            $personal = $datosModel["personal"];
        }else{
            $personal = "";
        }

        $condicion = "";

        if ($personal <> ""){
            $condicion = "WHERE PE.nombres +' '+ PE.apellidos LIKE '%".$personal."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_personal, PE.apellidos +', '+ PE.nombres, A.area, C.cargo, P.obs
        FROM PERSONAL AS P
        INNER JOIN PERSONAS AS PE ON P.cod_persona = PE.cod_persona
        INNER JOIN AREA AS A ON P.cod_area = A.cod_area 
        INNER JOIN CARGO AS C ON P.cod_cargo = C.cod_cargo ".$condicion." ORDER BY PE.apellidos";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            $cont++;
    
            echo '<tr ondblclick="seleccionarPersonal('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                    <td class="text-center">'.$fila[4].'</td>
                </tr>';
    
        }

    }

    # SELECCIONAR EDITAR DATOS PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function seleccionarDatosPersonal_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_personal, P.cod_persona, PE.apellidos +', '+ PE.nombres, P.cod_area, A.area, P.cod_cargo, C.cargo, P.obs
        FROM PERSONAL AS P
        INNER JOIN PERSONAS AS PE ON P.cod_persona = PE.cod_persona
        INNER JOIN AREA AS A ON P.cod_area = A.cod_area
        INNER JOIN CARGO AS C ON P.cod_cargo = C.cod_cargo WHERE cod_personal = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4]. '|' .$fila[5]. '|' .$fila[6]. '|' .$fila[7];
        }

    }

    #MODIFICAR PERSONAL (REGISTRO PERSONAL)
    #----------------------------------------------

    public function modificarPersonal_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $cod_area = $datosModel["cod_area"];
        $cod_cargo = $datosModel["cod_cargo"];
        $cod_persona = $datosModel["cod_persona"];
        $obs = $datosModel["obs"];

        $conectar = new conexion('A');
        $consulta = "UPDATE PERSONAL SET cod_persona = '".$cod_persona."', cod_cargo = '".$cod_cargo."', 
        cod_area = '".$cod_area."', obs = '".$obs."', usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_personal = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function registrarCategoria_Model($datosModel){

        $categoria = $datosModel["categoria"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO CATEGORIA VALUES ('".$categoria."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function buscarListaCategoria_Model($datosModel){

        if(isset($datosModel["categoria"])){
            $categoria = $datosModel["categoria"];
        }else{
            $categoria = "";
        }

        $condicion = "";

        if ($categoria <> ""){
            $condicion = "WHERE categoria LIKE '%".$categoria."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_categoria, categoria FROM CATEGORIA ".$condicion." ORDER BY categoria";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarCategoria('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function seleccionarDatosCategoria_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_categoria, categoria FROM CATEGORIA WHERE cod_categoria = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1];
        }

    }

    #MODIFICAR CATEGORIA (REGISTRO CATEGORIA)
    #----------------------------------------------

    public function modificarCategoria_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $categoria = $datosModel["categoria"];

        $conectar = new conexion('A');
        $consulta = "UPDATE CATEGORIA SET categoria = '".$categoria."', usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_categoria = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function registrarSubcategoria_Model($datosModel){

        $cod_categoria = $datosModel["cod_categoria"];
        $subcategoria = $datosModel["subcategoria"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO SUBCATEGORIA VALUES ('".$cod_categoria."', '".$subcategoria."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function buscarListaSubcategoria_Model($datosModel){

        if(isset($datosModel["subcategoria"])){
            $subcategoria = $datosModel["subcategoria"];
        }else{
            $subcategoria = "";
        }

        $condicion = "";

        if ($subcategoria <> ""){
            $condicion = "WHERE S.subcategoria LIKE '%".$subcategoria."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT S.cod_subcategoria, C.categoria, S.subcategoria 
        FROM SUBCATEGORIA AS S
        INNER JOIN CATEGORIA AS C ON S.cod_categoria = C.cod_categoria ".$condicion." ORDER BY C.categoria, S.subcategoria";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarSubcategoria('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function seleccionarDatosSubcategoria_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT S.cod_subcategoria, S.cod_subcategoria, C.categoria, S.subcategoria 
        FROM SUBCATEGORIA AS S
        INNER JOIN CATEGORIA AS C ON S.cod_categoria = C.cod_categoria 
        WHERE S.cod_subcategoria = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3];
        }

    }

    #MODIFICAR SUBCATEGORIA (REGISTRO SUBCATEGORIA)
    #----------------------------------------------

    public function modificarSubcategoria_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $cod_categoria = $datosModel["cod_categoria"];
        $subcategoria = $datosModel["subcategoria"];

        $conectar = new conexion('A');
        $consulta = "UPDATE SUBCATEGORIA SET cod_categoria = '".$cod_categoria."', subcategoria = '".$subcategoria."', usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_subcategoria = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function registrarFamilia_Model($datosModel){

        $area = $datosModel["familia"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO FAMILIA (familia) VALUES ('".$area."')";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function buscarListaFamilia_Model($datosModel){

        if(isset($datosModel["familia"])){
            $familia = $datosModel["familia"];
        }else{
            $familia = "";
        }

        $condicion = "";

        if ($familia <> ""){
            $condicion = "WHERE familia LIKE '%".$familia."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_familia, familia FROM FAMILIA ".$condicion." ORDER BY familia";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarFamilia('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function seleccionarDatosFamilia_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_familia, familia FROM FAMILIA WHERE cod_familia = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1];
        }

    }

    #MODIFICAR FAMILIA (REGISTRO FAMILIA)
    #----------------------------------------------

    public function modificarFamilia_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $area = $datosModel["familia"];

        $conectar = new conexion('A');
        $consulta = "UPDATE FAMILIA SET familia = '".$area."' WHERE cod_familia = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # CODIGO PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function generarCodigoProducto_Model(){

        $conectar = new conexion('A');
        $consulta = "EXECUTE generarCodigo_Producto";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            return $fila[0];
        }

    }

    # REGISTRAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function registrarProducto_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $cod_familia = $datosModel["cod_familia"];
        $producto = $datosModel["producto"];
        $descripcion = $datosModel["descripcion"];
        $presentacion = $datosModel["presentacion"];
        $marca = $datosModel["marca"];
        $modelo = $datosModel["modelo"];
        $color = $datosModel["color"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO PRODUCTOS 
        VALUES ('".$codigo."', '".$cod_familia."', '".$producto."', '".$presentacion."', '".$marca."', '".$modelo."', '".$color."', '".$descripcion."', 0, 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function buscarListaProducto_Model($datosModel){

        if(isset($datosModel["producto"])){

            $producto = $datosModel["producto"];

        }else{

            $producto = "";

        }

        $condicion = "";

        if ($producto <> ""){
            $condicion = "WHERE P.producto LIKE '%".$producto."%' OR P.marca LIKE '%".$producto."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_producto, P.producto, P.presentacion, P.marca, P.modelo, P.color, P.descripcion 
        FROM PRODUCTOS AS P
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia ".$condicion." ORDER BY P.producto";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionar('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                    <td class="text-center">'.$fila[4].'</td>
                    <td class="text-center">'.$fila[5].'</td>
                    <td class="text-center">'.$fila[6].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function seleccionarDatosProducto_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_producto, P.cod_familia, F.familia, P.producto, P.presentacion, P.marca, P.modelo, P.color, P.descripcion 
        FROM PRODUCTOS AS P
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE P.cod_producto = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4]. '|' .$fila[5]. '|' .$fila[6]. '|' .$fila[7]. '|' .$fila[8];
        }

    }

    #MODIFICAR PRODUCTO (REGISTRO PRODUCTO)
    #----------------------------------------------

    public function modificarProducto_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $producto = $datosModel["producto"];
        $descripcion = $datosModel["descripcion"];
        $presentacion = $datosModel["presentacion"];
        $marca = $datosModel["marca"];
        $modelo = $datosModel["modelo"];
        $color = $datosModel["color"];

        $conectar = new conexion('A');
        $consulta = "UPDATE PRODUCTOS SET producto = '".$producto."', presentacion = '".$presentacion."', 
        marca = '".$marca."', modelo = '".$modelo."', color = '".$color."', descripcion = '".$descripcion."', 
        usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_producto = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # REGISTRAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function registrarProveedor_Model($datosModel){

        $ruc = $datosModel["ruc"];
        $proveedor = $datosModel["proveedor"];
        $contacto = $datosModel["contacto"];
        $direccion = $datosModel["direccion"];

        $conectar = new conexion('A');
        $consulta = "INSERT INTO PROVEEDORES VALUES ('".$ruc."', '".$proveedor."', '".$contacto."', '".$direccion."', 1, '".$_SESSION['log_USUARIO']."', getdate())";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }

    # BUSCAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function buscarListaProveedor_Model($datosModel){

        if(isset($datosModel["proveedor"])){

            $proveedor = $datosModel["proveedor"];

        }else{

            $proveedor = "";

        }

        $condicion = "";

        if ($proveedor <> ""){
            $condicion = "WHERE ruc LIKE '%".$proveedor."%' OR proveedor LIKE '%".$proveedor."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT cod_proveedor, ruc, proveedor, contacto, direccion FROM PROVEEDORES ".$condicion." ORDER BY proveedor";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionarProveedor('."'".$fila[0]."'".');" style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                    <td class="text-center">'.$fila[3].'</td>
                    <td class="text-center">'.$fila[4].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function seleccionarDatosProveedor_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT cod_proveedor, ruc, proveedor, contacto, direccion FROM PROVEEDORES WHERE cod_proveedor = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4];
        }

    }

    #MODIFICAR PROVEEDOR (REGISTRO PROVEEDOR)
    #----------------------------------------------

    public function modificarProveedor_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $ruc = $datosModel["ruc"];
        $proveedor = $datosModel["proveedor"];
        $contacto = $datosModel["contacto"];
        $direccion = $datosModel["direccion"];

        $conectar = new conexion('A');
        $consulta = "UPDATE PROVEEDORES SET ruc = '".$ruc."', proveedor = '".$proveedor."', contacto = '".$contacto."', direccion = '".$direccion."', usuario_modifica = '".$_SESSION['log_USUARIO']."', fecha_modificacion = getdate() 
        WHERE cod_proveedor = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){
            return true;
        }else{
            return false;
        }

    }


    # CODIGO COMPRA (REGISTRO COMPRAS)
    #----------------------------------------------

    public function generarCodigoCompra_Model(){

        $conectar = new conexion('A');
        $consulta = "EXECUTE generarCodigo_Compra";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            return $fila[0];
        }

    }

    # SELECT COMPROBANTE
    #----------------------------------------------

    public function selectComprobante_Model(){

        $conectar = new conexion('A');
        $consulta = "SELECT * FROM TIPO_COMPROBANTE";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';

        }

    }

    # REGISTRAR COMPRAS (REGISTRO COMPRAS)
    #----------------------------------------------

    public function registrarCompra_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $tipo_comprobante = $datosModel["tipo_comprobante"];
        $nro_comprobante = $datosModel["nro_comprobante"];
        $proveedor = $datosModel["proveedor"];
        $tipo_igv = $datosModel["tipo_igv"];
        $porcentaje_igv = $datosModel["porcentaje_igv"];
        $subtotal = $datosModel["subtotal"];
        $importe = $datosModel["importe"];
        $fecha = $datosModel["fecha"];
        $tabla = $datosModel["tabla"];
        $n = $datosModel["n"];

        $cod_producto = "";
        $cantidad = "";
        $precio = "";

        $valores1 = "";
        $valores2 = "";

        $conectar = new conexion('A');
        $consulta = "INSERT INTO COMPROBANTE (cod_tipo_comprobante, cod_comprobante, nro_comprobante, cod_proveedor, 
        tipo_igv, IGV, subtotal, importe, fecha_compra, estado, usuario_modifica, fecha_modificacion) 
        VALUES ('".$tipo_comprobante."', '".$codigo."', '".$nro_comprobante."', '".$proveedor."', '".$tipo_igv."', '".$porcentaje_igv."', 
        '".$subtotal."', '".$importe."', '".$fecha."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        if($stmt){

            $valores1 = explode(",|,", $tabla);

            for ($i = 0; $i < $n ; $i++) {
                $valores2 = explode(",", $valores1[$i]);

                $cod_producto = $valores2[0];
                $cantidad = $valores2[1];
                $precio = $valores2[2];

                $conectar = new conexion('B');
                $consulta = "INSERT INTO COMPRAS (cod_comprobante, cod_producto, cantidad, precio_unitario, estado, usuario_modifica, fecha_modificacion) 
                VALUES ('".$codigo."', '".$cod_producto."', '".$cantidad."', '".$precio."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
                $con = $conectar->abrirConexion();
                $stmt = sqlsrv_query($con, $consulta);

                if($stmt){

                    $conectar = new conexion('D');
                    $consulta = "UPDATE PRODUCTOS SET cantidad = (cantidad + '".$cantidad."') WHERE cod_producto = '".$cod_producto."'";
                    $con = $conectar->abrirConexion();
                    $stmt = sqlsrv_query($con, $consulta);

                }

            }

            return true;

        }else{
            return false;
        }

    }


    # CODIGO ENTREGA (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function generarCodigoEntrega_Model(){

        $conectar = new conexion('A');
        $consulta = "EXECUTE generarCodigo_Entrega";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            return $fila[0];
        }

    }

    # BUSCAR STOCK (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function buscarListaStock_Model($datosModel){

        if(isset($datosModel["producto"])){

            $producto = $datosModel["producto"];

        }else{

            $producto = "";

        }

        $condicion = "";

        if ($producto <> ""){
            $condicion = "AND F.familia LIKE '%".$producto."%' OR P.marca LIKE '%".$producto."%'";
        }

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_producto, P.producto+' '+P.presentacion+' '+P.marca+' '+P.modelo+' '+P.color+' '+P.descripcion, P.cantidad 
        FROM PRODUCTOS AS P
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE P.estado = 1 AND P.cantidad > 0 ".$condicion." ORDER BY F.familia";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        $cont = 0;

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            $cont++;

            echo '<tr ondblclick="seleccionar('."'".$fila[0]."'".');"  style="cursor:pointer;">
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center">'.$fila[0].'</td>
                    <td>'.$fila[1].'</td>
                    <td class="text-center">'.$fila[2].'</td>
                </tr>';
        }

    }

    # SELECCIONAR EDITAR DATOS STOCK (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function seleccionarDatosStock_Model($datosModel){

        $codigo = $datosModel["codigo"];

        $conectar = new conexion('A');
        $consulta = "SELECT P.cod_producto, P.producto+' '+P.presentacion+' '+P.marca+' '+P.modelo+' '+P.color+' '+P.descripcion, P.cantidad 
        FROM PRODUCTOS AS P
        INNER JOIN FAMILIA AS F ON P.cod_familia = F.cod_familia
        WHERE P.estado = 1 AND P.cod_producto = '".$codigo."' ";
        $con = $conectar->abrirConexion();
        $stmt = sqlsrv_query($con, $consulta);

        while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

            echo $fila[0]. '|' .$fila[1]. '|' .$fila[2];
        }

    }

    # REGISTRAR ENTREGAS (REGISTRO ENTREGAS)
    #----------------------------------------------

    public function registrarEntrega_Model($datosModel){

        $codigo = $datosModel["codigo"];
        $cod_subcategoria = $datosModel["cod_subcategoria"];
        $cod_area = $datosModel["cod_area"];
        $cod_personal = $datosModel["cod_personal"];
        $fecha = $datosModel["fecha"];
        $tabla = $datosModel["tabla"];
        $n = $datosModel["n"];

        $cod_producto = "";
        $cantidad = "";

        $valores1 = explode(",|,", $tabla);
        $valores2 = "";
        
        for ($i = 0; $i < $n ; $i++) {
            $valores2 = explode(",", $valores1[$i]);

            $cod_producto = $valores2[0];
            $cantidad = $valores2[1];

            $conectar = new conexion('A');
            $consulta = "INSERT INTO ENTREGAS (cod_entrega, cod_subcategoria, cod_area, receptor, cod_producto, cantidad, fecha_entrega, estado, usuario_modifica, fecha_modificacion) 
            VALUES ('".$codigo."', '".$cod_subcategoria."', '".$cod_area."', '".$cod_personal."', '".$cod_producto."', '".$cantidad."', '".$fecha."', 1, '".$_SESSION['log_USUARIO']."', getdate() )";
            $con = $conectar->abrirConexion();
            $stmt = sqlsrv_query($con, $consulta);

            if($stmt){

                $conectar = new conexion('B');
                $consulta = "UPDATE PRODUCTOS SET cantidad = (cantidad - '".$cantidad."') WHERE cod_producto = '".$cod_producto."'";
                $con = $conectar->abrirConexion();
                $stmt = sqlsrv_query($con, $consulta);

            }else{

                return false;

            }

        }

        return true;

    }

}
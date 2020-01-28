<?php
session_start();

include('../../../assets/php/conexion.php');

$usuario = $_POST["valor"];
$user = "";

if($usuario <> ""){
    $user = "AND responsable= '".$usuario."' " ;
}

$mensaje = "";

$conectar = new conexion('A');
$consulta = "SELECT * FROM actividades WHERE estado = '0'  ".$user." AND finalizacion = '0' ";

$con = $conectar->abrirConexion();

$stmt = sqlsrv_query($con, $consulta);

$cont = 0;

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $cont = $cont+1;

    $inicio = date_format($fila[3], 'd/m/Y');
    $termino = date_format($fila[4], 'd/m/Y');
    $entrega = date_format($fila[6], 'd/m/Y');

    if($entrega == '01/01/1900'){
        $entrega = "";
    }

    if($fila[9] == 0){
        $finalizacion = '
        <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-info btn-sm p-0 pr-2" onclick="modalEliminar(2, ' . $fila[0] . ');"><i class="fa fa-clone tam-icon px-2"></i>Habilitar</button></td>
        <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-danger btn-sm p-0 pr-2" onclick="modalEliminar(3, ' . $fila[0] . ');"><i class="fa fa-close tam-icon px-2"></i>Cerrar</button></td>
        ';
    }elseif($fila[9] == 1){
        $finalizacion = '
        <td class="text-center">Finalizado</td>
        <td class="text-center">Cerrado</td>
        ';
    }

    $mensaje = $mensaje. '
    <tr>
        <td class="text-center">'.$cont.'</td>
        <td class="text-center w-25">'.$fila[1].'</td>
        <td class="text-center w-25">'.$fila[2].'</td>
        <td class="text-center">'.$inicio.'</td>
        <td class="text-center">'.$termino.'</td>
        <td class="text-center">'.$entrega.'</td>
        <td class="text-center">'.$fila[8].'</td>
        <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-info btn-sm p-0" onclick="modalObs('.$fila[0].');"><i class="fa fa-external-link tam-icon px-2"></i></button></td>
        '.$finalizacion. '
    </tr>
    ';

}

$conectar->cerrarConexion($stmt, $con);

$mensaje = $mensaje;
echo $mensaje;

?>
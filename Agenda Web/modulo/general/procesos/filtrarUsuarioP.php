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
$consulta = "SELECT * FROM actividades WHERE estado = '1' ".$user." ";

$con = $conectar->abrirConexion();

$stmt = sqlsrv_query($con, $consulta);

$cont = 0;

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $cont = $cont+1;

    $inicio = date_format($fila[3], 'd/m/Y');
    $fin = date_format($fila[4], 'd/m/Y');

    if($fin == '01/01/1900'){
        $fin = "";
    }

    $mensaje = $mensaje. '
    <tr ondblclick="editar('."'".$fila[0]."'".');" style="cursor:pointer;">
        <td class="text-center">'.$cont.'</td>
        <td class="text-center w-25">'.$fila[1].'</td>
        <td class="text-center w-25">'.$fila[2].'</td>
        <td class="text-center">'.$inicio.'</td>
        <td class="text-center">'.$fin.'</td>
        <td class="text-center">' . $fila[8] . '</td>
        <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-info btn-sm p-0" onclick="modalObs('.$fila[0].');"><i class="fa fa-external-link tam-icon px-2"></i></button></td>
        <td class="text-center"><button type="button" id="" class="btn btn-danger btn-sm p-0 pr-2" onclick="modalEliminar(1, '.$fila[0].');"><i class="fa fa-clone tam-icon px-2"></i>Finalizar</button></td>
    </tr>
    ';

}

$conectar->cerrarConexion($stmt, $con);

$mensaje = $mensaje;
echo $mensaje;

?>
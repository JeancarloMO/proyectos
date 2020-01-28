<?php
session_start();

include('../../../assets/php/conexion.php');

$mensaje = "";

$conectar = new conexion('A');
$consulta = "SELECT * FROM actividades WHERE estado = '0' AND usuario = '".$_SESSION["agd_USUARIO"]."' ";

$con = $conectar->abrirConexion();

$stmt = sqlsrv_query($con, $consulta);

$cont = 0;

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $cont = $cont+1;

    $inicio = date_format($fila[3], 'd/m/Y');
    $entrega = date_format($fila[6], 'd/m/Y');

    if($entrega == '01/01/1900'){
        $entrega = "";
    }

    $mensaje = $mensaje. '
    <tr>
        <td class="text-center">'.$cont.'</td>
        <td class="text-center w-25">'.$fila[1].'</td>
        <td class="text-center w-25">'.$fila[2].'</td>
        <td class="text-center">'.$inicio.'</td>
        <td class="text-center">'.$entrega.'</td>
        <td class="text-center">Finalizado</td>
    </tr>
    ';

}

$conectar->cerrarConexion($stmt, $con);

$mensaje = $mensaje;
echo $mensaje;

?>
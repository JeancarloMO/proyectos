<?php
session_start();

include('../../../../assets/php/funciones.php');

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_docente, paterno, materno, nombres, obs FROM docente ORDER BY paterno, materno, nombres");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont = $cont+1;

    $mensaje = $mensaje. '
    <tr ondblclick="editar('."'".$fila[0]."'".');" style="cursor:pointer;">
        <td class="text-center">'.$cont.'</td>
        <td class="text-center">'.$fila[0].'</td>
        <td class="text-center">'.$fila[1].'</td>
        <td class="text-center">'.$fila[2].'</td>
        <td class="text-center">'.$fila[3].'</td>
        <td class="text-center">'.$fila[4].'</td>
    </tr>
    ';

}

$mensaje = $mensaje;
echo $mensaje;

?>
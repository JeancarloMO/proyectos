<?php

include('../../../../assets/php/funciones.php');

$lista = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$alu = "";

if ($lista <> ""){
    $alu = "WHERE paterno LIKE '%".$lista."%' OR materno LIKE '%".$lista."%' OR nombres LIKE '%".$lista."%' OR cod_alumno LIKE '%".$lista."%'";
}

$consulta = $funcion -> Seleccionar("SELECT cod_alumno, paterno, materno, nombres, convalidacion, obs FROM alumno ".$alu." 
            ORDER BY paterno, materno, nombres");

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
        <td class="text-center">'.$fila[5].'</td>
    </tr>
    ';

}

$mensaje = $mensaje;
echo $mensaje;

?>
<?php
session_start();

include('../../../../assets/php/funciones.php');

$lista = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$doc = "";

if ($lista <> ""){
    $doc = "WHERE paterno LIKE '%".$lista."%' OR materno LIKE '%".$lista."%' OR nombres LIKE '%".$lista."%' OR cod_docente LIKE '%".$lista."%'";
}

$consulta = $funcion -> Seleccionar("SELECT cod_docente, paterno, materno, nombres, obs FROM docente ".$doc." 
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
    </tr>
    ';

}

$mensaje = $mensaje;
echo $mensaje;

?>
<?php

include('../../../../assets/php/funciones.php');

$lista= $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_alumno, turno FROM matricula AS M INNER JOIN turno AS T ON M.cod_turno = T.cod_turno
                        WHERE M.cod_turno = '".$lista."' ");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont++;

    $mensaje = $mensaje. '
    <tr>
        <td class="text-center">'.$cont.'</td>
        <td class="text-center"><input id="LIST'.$cont.'" value="'.$fila[0].'" class="d-none">'.$fila[0].'</td>
        <td class="text-center">'.$fila[1].'</td>
    </tr>
    ';

}

$mensaje=$mensaje;
echo $mensaje;

?>
<?php

include('../../../../assets/php/funciones.php');

$lista = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT M.cod_alumno, ALU.paterno, ALU.materno, ALU.nombres, T.turno FROM matricula AS M INNER JOIN alumno as ALU ON M.cod_alumno = ALU.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno
WHERE M.cod_turno = '".$lista["s1"]."' AND M.cod_alumno NOT IN (SELECT A.cod_persona FROM asistencia AS A INNER JOIN matricula AS MT ON A.cod_persona = MT.cod_alumno WHERE A.cod_persona <> '' AND ( A.entrada between '".$lista["s2"]." 00:00:00' AND '".$lista["s2"]." 23:59:59' ) )");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont++;

    $mensaje = $mensaje. '
    <tr>
        <td class="text-center">'.$cont.'</td>
        <td class="text-center"><input id="ALU'.$cont.'" value="'.$fila[0].'" class="d-none">'.$fila[0].'</td>
        <td class="text-center">'.$fila[1].'</td>
        <td class="text-center">'.$fila[2].'</td>
        <td class="text-center">'.$fila[3].'</td>
        <td class="text-center">'.$fila[4].'</td>
        <td class="text-center d-none"><input id="HOR" value="'.$lista["s2"].' 00:00:00" class="d-none"></td>
    </tr>
    ';

}

$mensaje=$mensaje;
echo $mensaje;

?>
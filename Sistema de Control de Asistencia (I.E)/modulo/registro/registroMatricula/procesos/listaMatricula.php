<?php

include('../../../../assets/php/funciones.php');

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT M.cod_matricula, M.cod_alumno, A.paterno, A.materno, A.nombres, S.grado, S.seccion, T.abrev, D.paterno, D.materno, D.nombres, M.obs FROM matricula AS M INNER JOIN alumno as A ON M.cod_alumno = A.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno INNER JOIN docente AS D ON M.cod_docente = D.cod_docente WHERE M.semestre = '2019' ORDER BY A.paterno, A.materno, A.nombres");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont = $cont+1;

    $mensaje = $mensaje.'
        <tr ondblclick="editar('."'".$fila[0]."'".');" style="cursor:pointer;">
            <td class="text-center">'.$cont.'</td>
            <td class="text-center">'.$fila[1].'</td>
            <td>'.$fila[2].' '.$fila[3].', '.$fila[4].'</td>
            <td class="text-center">'.$fila[5].$fila[6].'</td>
            <td class="text-center">'.$fila[7].'</td>
            <td>'.$fila[8].' '.$fila[8].', '.$fila[10].'</td>
            <td class="text-center">'.$fila[11].'</td>
        </tr>
        ';

}

$mensaje=$mensaje;
echo $mensaje;
?>
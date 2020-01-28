<?php

include('../../../../assets/php/funciones.php');

$lista= $_POST['valor'];

$mensaje = "";

$la = "";

$funcion = new Funciones('A');


$consulta = $funcion -> Seleccionar("SELECT DISTINCT A.cod_persona, ALU.paterno, ALU.materno, ALU.nombres, S.grado, S.seccion, T.abrev, A.entrada FROM asistencia AS A INNER JOIN matricula AS M ON A.cod_persona = M.cod_alumno INNER JOIN alumno as ALU ON M.cod_alumno = ALU.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno WHERE M.cod_turno = '".$lista["s1"]."' AND M.cod_salon = '".$lista["s2"]."' AND ( A.entrada between '".$lista["s3"]." 00:00:00' AND '".$lista["s4"]." 23:59:59' ) ORDER BY CAST(A.entrada AS DATE), ALU.paterno, ALU.materno, ALU.nombres");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont++;

    $date = date_create($fila[7]);
    $datetime = date_format($date, 'd-m-Y H:i:s A');
    $fecha = date_format($date, 'd/m/Y');
    $hora = date_format($date, 'h:i:s a');
    $h = date_format($date, 'Hi');

    if((int)$h == 0){
        $estado = 'Faltó';
        $hora = "(vacío)";
    }else{
        if($fila[6] == 'M'){
            if((int)$h > 0 and (int)$h < 801){
                $estado = 'Asistió';
            }else{
                $estado = 'Tardanza';
            }
        }elseif($fila[6] == 'T'){
            if((int)$h > 0 and (int)$h < 1301){
                $estado = 'Asistió';
            }else{
                $estado = 'Tardanza';
            }
        }
    }

    $mensaje = $mensaje. '
    <tr>
        <td class="text-center">'.$cont.'</td>
        <td class="text-center">'.$fila[0].'</td>
        <td class="text-center">'.$fila[1].'</td>
        <td class="text-center">'.$fila[2].'</td>
        <td class="text-center">'.$fila[3].'</td>
        <td class="text-center">'.$fila[4].$fila[5].'</td>
        <td class="text-center">'.$fila[6].'</td>
        <td class="text-center">'.$fecha.'<span class="font-weight-bold">&nbsp;&nbsp;'.$hora.'</span></td>
        <td class="text-center">'.$estado.'</td>
    </tr>
    ';

}

$mensaje=$mensaje;
echo $mensaje;

?>
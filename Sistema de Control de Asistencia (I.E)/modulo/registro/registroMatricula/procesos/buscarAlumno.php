<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$alumno = $_POST['valor'];

$mensaje = "";

$a1 = "";
$a2 = "";
$a3 = "";

if ($alumno["s1"] <> ""){
    $a1 = "AND paterno LIKE '%".$alumno["s1"]."%' "; 
}
if ($alumno["s2"] <> ""){
    $a2 = "AND materno LIKE '%".$alumno["s2"]."%' "; 
}
if ($alumno["s3"] <> ""){
    $a3 = "AND nombres LIKE '%".$alumno["s3"]."%' ";
}

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT cod_alumno, paterno, materno, nombres FROM alumno WHERE cod_alumno <> ''                               ".$a1." ".$a2." ".$a3." ORDER BY paterno, materno, nombres");

$cont = 0;

while($fila = mysqli_fetch_array($consulta)){

    $cont = $cont+1;

    $mensaje = $mensaje.'
        <tr ondblclick="seleccionar('."'".$fila[0]."'".');" style="cursor:pointer;">
            <td class="text-center">'.$cont.'</td>
            <td class="text-center">'.$fila[0].'</td>
            <td>'.$fila[1].' '.$fila[2].', '.$fila[3].'</td>
        </tr>
        ';

}

$mensaje=$mensaje;
echo $mensaje;
?>
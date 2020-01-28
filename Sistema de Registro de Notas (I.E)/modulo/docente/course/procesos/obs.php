<?php 
//session_start();

include('../../../../assets/php/funciones.php');

$dato = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones();

$consulta = $funcion -> Seleccionar("SELECT cod_matricula, P.paterno, P.materno, P.nombres, M.obs FROM matricula AS M INNER JOIN persona AS P ON M.alumno = P.documento WHERE cod_matricula = '".$dato."' ");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4];

}

$mensaje=$mensaje;
echo $mensaje;
?>
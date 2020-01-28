<?php 

include('../../../../assets/php/funciones.php');

$dato = $_POST['valor'];

$mensaje = "";

$funcion = new Funciones('A');

$consulta = $funcion -> Seleccionar("SELECT M.cod_matricula, M.cod_alumno, A.paterno, A.materno, A.nombres, M.cod_salon, M.cod_turno, M.cod_docente, D.paterno, D.materno, D.nombres, M.obs FROM matricula AS M INNER JOIN alumno as A ON M.cod_alumno = A.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno INNER JOIN docente AS D ON M.cod_docente = D.cod_docente WHERE M.cod_matricula = '".$dato."' ");

while($fila = mysqli_fetch_array($consulta)){

    $mensaje = $fila[0]. '|' .$fila[1]. '|' .$fila[2]. '|' .$fila[3]. '|' .$fila[4]. '|' .$fila[5]. '|' .$fila[6]. '|' .$fila[7]. '|'                .$fila[8].' '.$fila[9].', '.$fila[10]. '|' .$fila[11];

}

$mensaje=$mensaje;
echo $mensaje;
?>
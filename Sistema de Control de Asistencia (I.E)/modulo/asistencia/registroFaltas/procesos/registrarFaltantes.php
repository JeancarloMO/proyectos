<?php
include ('../../../../assets/php/funciones.php');

$conectar = new Funciones();

$conectar -> Insertar("asistencia", "cod_persona, entrada, estado", " '".$_POST['codigo']."', '".$_POST['hora']."', 'F' ");

?>
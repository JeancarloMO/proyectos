<?php
if (isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	/*$time = time();
    $nombre = "{$_POST['nombre_archivo']}_$time.$extension";*/
    $nombre = "{$_POST['nombre_archivo']}.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "../archivos/$nombre")) {
        echo 1;
    } else {
        echo 0;
    }
}
?>

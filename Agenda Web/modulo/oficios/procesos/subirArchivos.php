<?php

session_start();

if (isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	/*$time = time();
    $nombre = "{$_POST['nombre_archivo']}_$time.$extension";*/
    /*$nombre = "{$_POST['nombre_archivo']}.$extension";*/
    $codigo = $_POST['codigo'];

    if($extension <> "sinextension"){

        /*Y:\20192\000001\201701\1SIS02NA\000354 */

        $carpeta = 'archivos/'.$codigo.'/';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
    
        $target_path = $carpeta;
        $target_path = $target_path . basename($archivo['name']);
    
        if (move_uploaded_file($archivo['tmp_name'], $target_path)) {
            echo 1;
        } else {
            echo 0;
        }

    }else{
        echo 3;
    }
    
}

?>
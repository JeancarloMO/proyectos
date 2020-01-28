<?php

session_start();

if (isset($_FILES['archivo'])) {

    foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
		//condicional si el fuchero existe
		if($_FILES["archivo"]["name"][$key]) {
			// Nombres de archivos de temporales
			$archivo = $_FILES["archivo"]["name"][$key]; 
            $fuente = $_FILES["archivo"]["tmp_name"][$key]; 
            
            $codigo = $_POST['codigo'];
			
			$carpeta = 'archivos/'.$codigo.'/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($carpeta)){
                mkdir($carpeta, 0777, true);
            }
			
			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$archivo; //indicamos la ruta de destino de los archivos
			
	
			if(move_uploaded_file($fuente, $target_path)) {	
				echo 1;
            } else {
                echo 0;
            }
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
    
}

?>
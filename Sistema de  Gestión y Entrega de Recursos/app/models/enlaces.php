<?php

class EnlacesModels{

	public function enlacesModel($enlacesModel){

		if($enlacesModel == "bienvenido"){

			$module = "resources/views/modules/bienvenido/".$enlacesModel.".php";

		}else if($enlacesModel == "registroProducto" ||
				   $enlacesModel == "registroCompras" || 
				   $enlacesModel == "registroEntregas" ||
				   $enlacesModel == "registroProveedor" ||
				   $enlacesModel == "registroArea" ||
				   $enlacesModel == "registroCategoria" ||
				   $enlacesModel == "registroSubcategoria" ||
				   $enlacesModel == "registroPersona" || 
				   $enlacesModel == "registroPersonal"){

			$module = "resources/views/modules/registro/".$enlacesModel.".php";

		}else if($enlacesModel == "listaCompras" || 
				   $enlacesModel == "listaEntregas" || 
				   $enlacesModel == "stock"){

			$module = "resources/views/modules/listas/".$enlacesModel.".php";

		}else if($enlacesModel == "index"){
            
            $module = "resources/views/modules/inicio.php";
            
		}else if($enlacesModel == "salir"){

			$module = "resources/views/modules/salir.php";

		}else{
            
            $module = "resources/views/modules/inicio.php";
            
        }
        
		return $module;

	}

}
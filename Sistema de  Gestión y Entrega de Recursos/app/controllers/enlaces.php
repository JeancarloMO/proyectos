<?php

class EnlacesControllers{

    public function Template(){

		include "resources/views/template.php";

    }

    public function EnlacesController(){

        if(isset($_GET["action"])){

            $enlaces = $_GET["action"];

        }else{

            $enlaces = "index";

        }

        $respuesta = EnlacesModels::enlacesModel($enlaces);

        include $respuesta;

    }

    public function my_header(){

        include "resources/views/layouts/header.php";

    }

    public function my_footer(){

        include "resources/views/layouts/footer.php";

    }

    public function my_navHeader(){

        include "resources/views/layouts/navHeader.php";

    }

    public function my_navLateral(){

        include "resources/views/layouts/navLateral.php";

    }

}
<?php

session_start();

if(isset($_SESSION["agd_TIPO"])){

    if($_SESSION["agd_TIPO"] == "administrador"){

        header("location:general/");

    }elseif($_SESSION["agd_TIPO"] == "user"){

        header("location:pendientes/");

    }else{

    }

}else{

    session_destroy();

    header("location:../");

}

?>
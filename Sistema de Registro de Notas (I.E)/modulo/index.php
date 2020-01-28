<?php

session_start();

if(isset($_SESSION["fa_TIPO_USUARIO"])){

    if($_SESSION["fa_TIPO_USUARIO"] == "DOCENTE"){

        header("location:docente/");

    }elseif($_SESSION["fa_TIPO_USUARIO"] == "APODERADO"){

        header("location:apafa/");

    }else{

    }

}else{

    session_destroy();

    header("location:../");

}

?>
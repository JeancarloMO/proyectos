<?php

if(!isset($_SESSION["log_USUARIO"])){

    header("location:iniciaSesion");

}

?>

<?php 
$bienvenido = new EnlacesControllers();
$bienvenido -> my_navHeader();
?>

<div class="bg-socendary" id="uMdi">

    <div id="uLateral" class="uLateral-lg uGreen">

        <?php 
        $bienvenido -> my_navLateral();
        ?>

    </div>

    <!-- INICIO DEL MAIN -->
    <div class="uMain-lg bg-light border-left border-warning" id="uMain">

    </div>

</div>
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Bienvenido</title>
        <?php
        session_start();
        $ruta='../';
        require($ruta.'assets/include/links.php');
        ?>
    </head>

    <body>
        <!-- navbar -->
        <?php include ($ruta.'assets/include/headerAdministrativo.php') ?>
        <!-- navbar -->
        <!-- content -->
        <div class="bg-socendary" id="uMdi">
            <!-- INICIO DEL LATERAL -->
            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralAdministrativo.php') ?>
            </div>
            <!-- INICIO DEL MAIN -->
            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

            </div>
        </div>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
    </body>
</html>
<?php

if(!isset($_SESSION["log_USUARIO"])){

    header("location:iniciaSesion");

}

?>

<?php 
$registro = new EnlacesControllers();
$datos = new SendRegistro();

$registro -> my_navHeader();
?>

<div class="bg-socendary" id="uMdi">

    <div id="uLateral" class="uLateral-lg uGreen">

        <?php 
        $registro -> my_navLateral();
        ?>

    </div>

    <!-- INICIO DEL MAIN -->
    <div class="uMain-lg bg-light border-left border-warning" id="uMain">

        <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
            <span>Registro Area</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-4 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">DATOS DEL AREA</span>
                        </div>

                        <div class="form-control form-control-sm centrar-custom my-1">
                            <img src="public/images/oficina.jpg" alt="" style="height:200px;" class="p-2 rounded-circle">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Area:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="codigo" id="codigo" class="form-control d-none">
                            <input type="text" name="area" id="area" class="form-control">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                            <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                            <button type="button" id="btn-registrar" class="btn btn-primary btn-sm my-1"
                                    onclick="registrarArea();" disabled>
                                <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                            <button type="button" id="btn-modificar" class="btn btn-success btn-sm my-1"
                                    onclick="modificarArea();" disabled>
                                <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                            <button type="button" id="btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="cancelar();" disabled>
                                <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                        </div>

                    </div>

                    <div class="col-lg-8 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">LISTA DE AREAS</span>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                            </div>
                            <input type="" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:415px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Area</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoArea" class="text-dark">

                                    <?php

                                    $datos -> buscarListaArea_Controller("withoutPOST");

                                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="resources/assets/js/js/registro_Area.js"></script>
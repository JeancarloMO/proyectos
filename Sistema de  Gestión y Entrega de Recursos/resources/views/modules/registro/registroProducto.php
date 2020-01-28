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
            <span>Registro Producto</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-4 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">DATOS DEL PRODUCTO</span>
                        </div>

                        <div class="form-control form-control-sm centrar-custom my-1">
                            <img src="public/images/producto.png" alt="" style="height:100px;" class="p-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Codigo N°</span>
                            </div>
                            <input type="" name="codigo" id="codigo" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Elegir Familia:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_familia" id="cod_familia" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="btn_buscarFamilia" onclick="modalbuscarFamilia();"><i class="fa fa-chevron-circle-right tam-icon px-2"></i>Elegir&nbsp;</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Familia:</span>
                            </div>
                            <input type="" name="familia" id="familia" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Producto:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="producto" id="producto" class="form-control">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Presentación:</span>
                            </div>
                            <input type="text" name="presentacion" id="presentacion" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Marca:</span>
                            </div>
                            <input type="text" name="marca" id="marca" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Modelo:</span>
                            </div>
                            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Color:</span>
                            </div>
                            <input type="text" name="color" id="color" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Otros:</span>
                            </div>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="(opcional)">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                            <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                            <button type="button" id="btn-registrar" class="btn btn-primary btn-sm my-1"
                                    onclick="registrarProducto();" disabled>
                                <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                            <button type="button" id="btn-modificar" class="btn btn-success btn-sm my-1"
                                    onclick="modificarProducto();" disabled>
                                <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                            <button type="button" id="btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="cancelar();" disabled>
                                <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                        </div>

                    </div>

                    <div class="col-lg-8 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">LISTA DE PRODUCTOS</span>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                            </div>
                            <input type="" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:438px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Presentacion</th>
                                        <th class="text-center">Marca</th>
                                        <th class="text-center">Modelo</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Otros</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoProducto" class="text-dark">

                                    <?php
                                    
                                    $datos -> buscarListaProducto_Controller("withoutPOST");

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

<!-- Modal Buscar Familia -->
<div class="modal fade" id="miModalBuscarFamilia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE FAMILIA DE PRODUCTOS</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="familia_buscarlista" onkeyup="familia_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Familia</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoFamilia" class="text-dark">

                            <?php

                            $datos -> buscarListaFamilia_Controller("withoutPOST");

                            ?>

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Familia -->

<script src="resources/assets/js/js/registro_Producto.js"></script>
<?php

if (!isset($_SESSION["log_USUARIO"])) {

    header("location:iniciaSesion");
}

?>

<?php
$registro = new EnlacesControllers();
$datos = new SendRegistro();

$registro->my_navHeader();
?>

<div class="bg-socendary" id="uMdi">

    <div id="uLateral" class="uLateral-lg uGreen">

        <?php
        $registro->my_navLateral();
        ?>

    </div>

    <!-- INICIO DEL MAIN -->
    <div class="uMain-lg bg-light border-left border-warning" id="uMain">

        <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
            <span>Registro Entregas</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-4 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">DATOS DE ENTREGA</span>
                        </div>

                        <div class="form-control form-control-sm centrar-custom my-1">
                            <img src="public/images/entregas.jpg" alt="" style="height:200px;" class="p-3">
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Codigo N°</span>
                            </div>
                            <input type="" name="codigo" id="codigo" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Destino de Entrega<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_subcategoria" id="cod_subcategoria" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="sub_btn_buscar" onclick="modalbuscarSubcategoria()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Categoría:</span>
                            </div>
                            <input type="text" name="categoria" id="categoria" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Sub-Categoría:</span>
                            </div>
                            <input type="text" name="subcategoria" id="subcategoria" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Elegir Area<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_area" id="cod_area" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="area_btn_buscar" onclick="modalbuscarArea()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Area:</span>
                            </div>
                            <input type="text" name="area" id="area" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Personal Receptor<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_personal" id="cod_personal" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="pers_btn_buscar" onclick="modalbuscarPersonal()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Nombre:</span>
                            </div>
                            <input type="text" name="personal" id="personal" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                            <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                            <button type="button" id="btn-registrar" class="btn btn-primary btn-sm my-1" onclick="registrarEntrega();" disabled>
                                <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                            <button type="button" id="btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="cancelar();" disabled>
                                <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                        </div>

                    </div>

                    <div class="col-lg-8 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">LISTA DE PRODUCTOS</span>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend form-control">
                                            <span class="font-weight-bold">Elegir Productos<span class="text-danger">&nbsp;*</span></span>
                                        </div>
                                        <button class="btn btn-info btn-sm font-weight-bold" id="btn_seleccionar" onclick="modalbuscarStock();"><i class="fa fa-chevron-circle-right tam-icon px-2"></i>Seleccionar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold">Fecha de Entrega:<span class="text-danger">&nbsp;*</span></span>
                                        </div>
                                        <input type="date" name="fecha" id="fecha" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="min-height:442px;max-height:442px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center"><i class="fa fa-trash-o tam-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoEntregas" class="text-dark">

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal Buscar Subcategoria -->
<div class="modal fade" id="miModalBuscarSubcategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE SUB-CATEGORIAS</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="sub_buscarlista" onkeyup="sub_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Sub-Categoria</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoSubcategoria" class="text-dark">

                            <?php

                            $datos -> buscarListaSubcategoria_Controller("withoutPOST");

                            ?>

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm font-weight-bold" onclick="modalnuevoSubcategoria();">Nuevo Proveedor</button>
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Subcategoria -->

<!-- Modal Buscar Area -->
<div class="modal fade" id="miModalBuscarArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE AREAS</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="area_buscarlista" onkeyup="area_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

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
            <div class="modal-footer">
                <button class="btn btn-success btn-sm font-weight-bold" onclick="modalnuevoProveedor();">Nuevo Proveedor</button>
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Area -->

<!-- Modal Buscar Personal -->
<div class="modal fade" id="miModalBuscarPersonal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE PERSONAL</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="pers_buscarlista" onkeyup="pers_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Personal</th>
                                <th class="text-center">Area</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">Obs.</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoPersonal" class="text-dark">

                            <?php

                            $datos -> buscarListaPersonal_Controller("withoutPOST");

                            ?>

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm font-weight-bold" onclick="modalnuevoPersonal();">Nuevo Proveedor</button>
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Personal -->

<!-- Modal Buscar STOCK -->
<div class="modal fade" id="miModalBuscarStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px !important;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE PRODUCTOS EN STOCK</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="prod_buscarlista" onkeyup="prod_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoProducto" class="text-dark">

                            <?php

                            $datos -> buscarListaStock_Controller("withoutPOST");

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
<!-- Fin Modal Buscar STOCK -->

<script src="resources/assets/js/js/registro_Entregas.js"></script>
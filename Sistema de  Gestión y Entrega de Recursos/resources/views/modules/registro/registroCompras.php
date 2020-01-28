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
            <span>Registro Compras</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-4 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">DATOS DE COMPRA</span>
                        </div>

                        <div class="form-control form-control-sm centrar-custom my-1">
                            <img src="public/images/compras.jpg" alt="" style="height:161px;" class="p-2">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1 d-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">Codigo N°</span>
                            </div>
                            <input type="" name="codigo" id="codigo" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">Comprobante:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <select name="comprobante" id="comprobante" class="form-control" required>
                                <option value="">[NONE]</option>

                                <?php
;
                                $datos -> selectComprobante_Controller();

                                ?>

                            </select>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">N° Comprobante:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="nro_comprobante" id="nro_comprobante" class="form-control">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold">Porcentaje IGV</span>
                            </div>
                            <select name="igv" id="igv" class="form-control">
                                <option value="">[NONE]</option>
                                <option value="igv">(%) :</option>
                                <option value="incluido">Incluido (%) :</option>
                            </select>
                            <input id ="val_igv" type="text" class="text-center" style="width:60px;">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha de Compra:<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold" id="basic-addon1">Elegir Proveedor<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_proveedor" id="cod_proveedor" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="btn_buscar" onclick="modalbuscarProveedor()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">R.U.C:</span>
                            </div>
                            <input type="" name="ruc" id="ruc" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon1">Proveedor:</span>
                            </div>
                            <input type="" name="proveedor" id="proveedor" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                            <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                            <button type="button" id="btn-registrar" class="btn btn-primary btn-sm my-1" onclick="registrarCompra();" disabled>
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
                                <div class="col-lg-7">
                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend form-control">
                                            <span class="font-weight-bold" id="basic-addon1">Elegir Productos<span class="text-danger">&nbsp;*</span></span>
                                        </div>
                                        <button class="btn btn-info btn-sm font-weight-bold" id="btn_seleccionar" onclick="modalbuscarProducto();"><i class="fa fa-chevron-circle-right tam-icon px-2"></i>Seleccionar</button>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group input-group-sm my-1">
                                        <button class="btn btn-success btn-sm font-weight-bold form-control" id="btn_calcular" onclick="calcularTotal();"><i class="fa fa-calculator  tam-icon px-2"></i>Calcular</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="min-height:372px;max-height:372px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">P. Unitario</th>
                                        <th class="text-center">TOTAL</th>
                                        <th class="text-center"><i class="fa fa-trash-o tam-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoCompras" class="text-dark">

                                </tbody>
                            </table>

                        </div>

                        <div class="my-2" style="float: right;">
                            <table border="1" class="text-center">
                                <thead>
                                    <tr>
                                        <th class="pr-2 px-2">Sub-Total</th>
                                        <th class="pr-2 px-2">I.G.V (%)</th>
                                        <th class="pr-2 px-2">Importe Total</th>
                                    </tr>
                                </thead>
                                <tbody id="importe">
                                    <tr>
                                        <td id="subTotal" style="padding:2px;">---</td>
                                        <td id="igvTotal" style="padding:2px;">---</td>
                                        <td id="importeTotal" style="padding:2px;">---</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Modal Buscar Proveedor -->
<div class="modal fade" id="miModalBuscarProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE PROVEEDORES</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="prov_buscarlista" onkeyup="prov_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">RUC</th>
                                <th class="text-center">Proveedor</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoProveedor" class="text-dark">

                            <?php

                            $datos -> buscarListaProveedor_Controller("withoutPOST");

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
<!-- Fin Modal Buscar Proveedor -->

<!-- Modal Nuevo Proveedor -->
<div class="modal fade" id="miModalNuevoProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px !important;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">DATOS DEL PROVEEDOR</span>
                </div>

                <div class="form-control form-control-sm centrar-custom my-1">
                    <img src="public/images/proveedor.png" alt="" style="height:200px;" class="p-3">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">R.U.C:<span class="text-danger">&nbsp;*</span></span>
                    </div>
                    <input type="text" name="ruc" id="prov_ruc" class="form-control">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Proveedor:<span class="text-danger">&nbsp;*</span></span>
                    </div>
                    <input type="text" name="proveedor" id="prov_proveedor" class="form-control">
                </div>

                <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                    <button type="button" id="prov_btn-registrar" class="btn btn-primary btn-sm my-1" onclick="prov_registrarProveedor();">
                        <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                    <button type="button" id="prov_btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="prov_cancelar();">
                        <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                </div>

            </div>
            <div class="modal-footer p-0">
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Nuevo Proveedor -->

<!-- Modal Buscar Producto -->
<div class="modal fade" id="miModalBuscarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:900px !important;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE PRODUCTOS</span>
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
            <div class="modal-footer">
                <button class="btn btn-success btn-sm font-weight-bold" onclick="modalnuevoProducto();">Nuevo Producto</button>
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Producto -->

<!-- Modal Nuevo Producto -->
<div class="modal fade" id="miModalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:400px !important;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">DATOS DEL PRODUCTO</span>
                </div>

                <div class="form-control form-control-sm centrar-custom my-1">
                    <img src="public/images/producto.jpg" alt="" style="height:161px;" class="p-1 rounded-circle">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Codigo N°</span>
                    </div>
                    <input type="text" name="codigo" id="prod_codigo" class="form-control">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Producto:<span class="text-danger">&nbsp;*</span></span>
                    </div>
                    <input type="text" name="producto" id="prod_producto" class="form-control">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Presentación:</span>
                    </div>
                    <input type="text" name="presentacion" id="prod_presentacion" class="form-control" placeholder="(opcional)">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Marca:</span>
                    </div>
                    <input type="text" name="marca" id="prod_marca" class="form-control" placeholder="(opcional)">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Modelo:</span>
                    </div>
                    <input type="text" name="modelo" id="prod_modelo" class="form-control" placeholder="(opcional)">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Color:</span>
                    </div>
                    <input type="text" name="color" id="prod_color" class="form-control" placeholder="(opcional)">
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="basic-addon1">Otros:</span>
                    </div>
                    <input type="text" name="descripcion" id="prod_descripcion" class="form-control" placeholder="(opcional)">
                </div>

                <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                    <button type="button" id="prod_btn-registrar" class="btn btn-primary btn-sm my-1" onclick="prod_registrarProducto();">
                        <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                    <button type="button" id="prod_btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="prod_cancelar();">
                        <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                </div>

            </div>
            <div class="modal-footer p-0">
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Nuevo Producto -->

<script src="resources/assets/js/js/registro_Compras.js"></script>
<?php

if (!isset($_SESSION["log_USUARIO"])) {

    header("location:iniciaSesion");
}

?>

<?php
$listas = new EnlacesControllers();
$datos = new SendListas();
$registro = new SendRegistro();

$listas->my_navHeader();
?>

<div class="bg-socendary" id="uMdi">

    <div id="uLateral" class="uLateral-lg uGreen">

        <?php
        $listas->my_navLateral();
        ?>

    </div>

    <!-- INICIO DEL MAIN -->
    <div class="uMain-lg bg-light border-left border-warning" id="uMain">

        <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
            <span>Lista de Compras</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-5 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1 text-center">
                            <span class="font-weight-bold">LISTA DE COMPROBANTES</span>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Tipo de Comprobante:</span>
                            </div>
                            <select name="comprobante" id="comprobante" class="form-control" onchange="buscarlistaComprobantes();">
                                <option value="">[TODOS]</option>

                                <?php

                                $registro -> selectComprobante_Controller();

                                ?>

                            </select>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">N° Comprobante:</span>
                            </div>
                            <input type="text" id="nro_comprobante" class="form-control" onkeyup="buscarlistaComprobantes();">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Proveedor:</span>
                            </div>
                            <input type="text" id="proveedor" class="form-control" onkeyup="buscarlistaComprobantes();">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Fecha de Compra:</span>
                            </div>
                            <input type="date" name="fecha" id="fecha" class="form-control" onchange="buscarlistaComprobantes();">
                        </div>

                        <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded" style="min-height:340px;max-height:340px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Comprobante</th>
                                        <th class="text-center">N° Comprobante</th>
                                        <th class="text-center">Proveedor</th>
                                        <th class="text-center">Fecha de Compra</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoComprobantes" class="text-dark">

                                <?php

                                $datos -> buscarListaComprobantes_Controller("withoutPOST");

                                ?>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="col-lg-7 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">LISTA DE PRODUCTOS</span>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8 px-0">
                                    <div class="input-group input-group-sm my-1">
                                        <button class="btn btn-success btn-sm font-weight-bold" onclick="imprimir();"><i class="fa fa-print"></i> Imprimir Comprobante</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 pr-0">
                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold">IGV</span>
                                        </div>
                                        <span id ="igv" class="text-center form-control"></span>
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
                                    </tr>
                                </thead>
                                <tbody id="contenidoProductos" class="text-dark">

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

<script src="resources/assets/js/js/lista_Compras.js"></script>
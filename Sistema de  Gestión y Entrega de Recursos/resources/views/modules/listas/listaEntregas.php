<?php

if (!isset($_SESSION["log_USUARIO"])) {

    header("location:iniciaSesion");
}

?>

<?php
$listas = new EnlacesControllers();
$datos = new SendListas();

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
            <span>Lista de Entregas</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-5 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1 text-center">
                            <span class="font-weight-bold">FILTROS DE BÚSQUEDA</span>
                        </div>

                        <div class="input-group input-group-sm my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Area:</span>
                            </div>
                            <select name="area" id="area" class="form-control" onchange="buscarlistaEntregas();">
                                <option value="">[TODOS]</option>

                                <?php

                                $datos -> selectArea_Controller();

                                ?>

                            </select>
                        </div>

                        <div class="input-group input-group-sm my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Fecha de Entrega:</span>
                            </div>
                            <input type="date" name="fecha" id="fecha" class="form-control" onchange="buscarlistaEntregas();">
                        </div>

                        <div class="input-group input-group-sm my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Hasta Fecha:</span>
                            </div>
                            <input type="date" name="fechaH" id="fechaH" class="form-control" onchange="buscarlistaEntregas();">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">

                            <span class="font-weight-bold">Reportes:</span><br>

                            <button class="btn btn-success btn-sm my-1 font-weight-bold" onclick="imprimirFiltro();"
                                <i class="fa fa-print px-2"></i>Imprimir Reporte</button><br>

                        </div>

                    </div>

                    <div class="col-lg-7 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1 text-center">
                            <span class="font-weight-bold">LISTA DE ENTREGAS</span>
                        </div>

                        <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded" style="min-height:200px;max-height:200px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center">Personal Receptor</th>
                                        <th class="text-center">Fecha de Entrega</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoEntregas" class="text-dark">

                                <?php

                                $datos -> buscarListaEntregas_Controller("withoutPOST");

                                ?>

                                </tbody>
                            </table>

                        </div>
                        
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-9 form-control form-control-sm my-1">
                                    <span class="font-weight-bold">LISTA DE PRODUCTOS</span>
                                    <input id="cod" class="d-none">
                                </div>
                                <div class="col-lg-3 my-1 text-center">
                                    <button class="btn btn-success btn-sm font-weight-bold pr-3 px-2" onclick="imprimir();"><i class="fa fa-print px-1"></i> Imprimir Entrega</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="min-height:235px;max-height:235px;">

                            <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                <thead class="btn-secondary">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoProductos" class="text-dark">

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="resources/assets/js/js/lista_Entregas.js"></script>
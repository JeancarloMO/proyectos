<?php

if(!isset($_SESSION["log_USUARIO"])){

    header("location:iniciaSesion");

}

?>

<?php 
$lista = new EnlacesControllers();
$datos = new SendListas();

$lista -> my_navHeader();
?>

<div class="bg-socendary" id="uMdi">

    <div id="uLateral" class="uLateral-lg uGreen">

        <?php 
        $lista -> my_navLateral();
        ?>

    </div>

    <!-- INICIO DEL MAIN -->
    <div class="uMain-lg bg-light border-left border-warning" id="uMain">

        <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
            <span>Stock</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-3 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1 text-center">
                            <span class="font-weight-bold">FILTROS DE BÚSQUEDA</span>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <span class="font-weight-bold">Producto:</span>

                        <select name="" id="" class="form-control form-control-sm my-1">
                            <option value="">[TODOS]</option>

                            <?php

                            $datos -> selectFamilia_Controller("withoutPOST");

                            ?>

                        </select>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <span class="font-weight-bold">Estado:</span>

                        <select name="" id="" class="form-control form-control-sm my-1">
                            <option value="">[TODOS]</option>
                            <option value="">Estable</option>
                            <option value="">Agotado</option>
                            <option value="">Casi Agotados</option>
                        </select>

                    </div>

                    <div class="col-lg-9 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">PRODUCTOS EN STOCK</span>
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
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="contenidoStock" class="text-dark">

                                    <?php
                                    
                                    $datos -> productosStock_Controller("withoutPOST");

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

<script src="resources/assets/js/js/registro_Producto.js"></script>
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
            <span>Registro Personal</span>
        </div>

        <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

            <div class="px-3">

                <div class="row">

                    <div class="col-lg-4 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">DATOS DEL PERSONAL</span>
                        </div>

                        <div class="form-control form-control-sm centrar-custom my-1">
                            <img src="public/images/personal.png" alt="" style="height:130px;" class="p-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Elegir Persona<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_persona" id="cod_persona" class="form-control d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="btn_buscarPersona" onclick="modalbuscarPersona()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Persona:</span>
                            </div>
                            <input type="" name="persona" id="persona" class="form-control" disabled>
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
                                <span class="font-weight-bold">Elegir Area<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_area" id="cod_area" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="btn_buscarArea" onclick="modalbuscarArea()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Area:</span>
                            </div>
                            <input type="" name="area" id="area" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend form-control">
                                <span class="font-weight-bold">Elegir Cargo<span class="text-danger">&nbsp;*</span></span>
                            </div>
                            <input type="text" name="cod_cargo" id="cod_cargo" class="d-none">
                            <button class="btn btn-info btn-sm font-weight-bold" id="btn_buscarCargo" onclick="modalbuscarCargo()"><i class="fa fa-search tam-icon px-2"></i>Buscar</button>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Cargo:</span>
                            </div>
                            <input type="" name="cargo" id="cargo" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Obs:</span>
                            </div>
                            <input type="text" name="obs" id="obs" class="form-control" disabled>
                        </div>

                        <div class="input-group input-group-sm my-1">
                        </div>

                        <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                            <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                            <button type="button" id="btn-registrar" class="btn btn-primary btn-sm my-1"
                                    onclick="registrarPersonal();" disabled>
                                <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                            <button type="button" id="btn-modificar" class="btn btn-success btn-sm my-1"
                                    onclick="modificarPersonal();" disabled>
                                <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                            <button type="button" id="btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="cancelar();" disabled>
                                <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                        </div>

                    </div>

                    <div class="col-lg-8 form-control form-control-sm">

                        <div class="form-control form-control-sm my-1">
                            <span class="font-weight-bold">LISTA DE PERSONAL</span>
                        </div>

                        <div class="input-group input-group-sm my-1">
                            <div class="input-group-prepend">
                                <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                            </div>
                            <input type="" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                        </div>

                        <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:415px;">

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

                </div>

            </div>

        </div>

    </div>

</div>

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
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Area -->

<!-- Modal Buscar Cargo -->
<div class="modal fade" id="miModalBuscarCargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE CARGOS</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="cargo_buscarlista" onkeyup="cargo_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Cargo</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoCargo" class="text-dark">

                            <?php

                            $datos -> buscarListaCargo_Controller("withoutPOST");

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
<!-- Fin Modal Buscar Cargo -->

<!-- Modal Buscar Persona -->
<div class="modal fade" id="miModalBuscarPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px !important;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE PERSONAS</span>
                </div>

                <div class="input-group input-group-sm my-1">
                    <div class="input-group-prepend">
                        <button class="btn btn-info"><i class="fa fa-search tam-icon px-2"></i></button>
                    </div>
                    <input type="" id="per_buscarlista" onkeyup="per_buscarlista();" class="form-control">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:350px;min-height:350px;">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-secondary">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Apellidos</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Documento</th>
                                <th class="text-center">N° Documento</th>
                                <th class="text-center">Obs.</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoPersona" class="text-dark">

                            <?php

                            $datos -> buscarListaPersona_Controller("withoutPOST");

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
<!-- Fin Modal Buscar Persona -->

<script src="resources/assets/js/js/registro_Personal.js"></script>
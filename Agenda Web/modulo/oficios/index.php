<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agenda Web</title>
    <?php
    session_start();

    if(!isset($_SESSION["agd_USUARIO"])){

        session_destroy();

        header("location:../");

    }

    $ruta = '../../';
    include($ruta . 'assets/include/links.php');
    require($ruta . 'assets/php/conexion.php');
    ?>
    <link rel="stylesheet" href="procesos/css.css">
    <script src="procesos/js.js"></script>
    <script src="../../assets/js/upload.js"></script>

</head>

<body>

    <?php include($ruta . 'assets/include/headerAdministrativo.php') ?>

    <div class="bg-socendary" id="uMdi">

        <div id="uLateral" class="uLateral-lg uGreen">
            <?php include($ruta . 'assets/include/navLateralAdministrativo.php') ?>
        </div>

        <div class="uMain-lg bg-light border-left border-warning" id="uMain">

            <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                <span>Oficios</span>
            </div>

            <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

                <div class="px-3">

                    <div class="row">

                        <div class="col-lg-3 form-control form-control-sm">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">REGISTRO DE OFICIOS</span>
                            </div>

                            <input type="text" name="codigo" id="codigo" class="">

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <span class="font-weight-bold">Asunto: <span style="color:red;">*</span></span>
                            <textarea class="p-1" name="asunto" id="asunto" rows="5" style="max-width:100%;min-width:100%;max-height:100px;min-height:100px;font-size:13px;" maxlength="1000" placeholder="Descripción del asunto"></textarea>

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <span class="font-weight-bold">Area Remitente: <span style="color:red;">*</span></span>
                            <input type="text" name="area_remitente" id="area_remitente" class="form-control form-control-sm">

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <span class="font-weight-bold">Area Recepciona: <span style="color:red;">*</span></span>
                            <input type="text" name="area_recepciona" id="area_recepciona" class="form-control form-control-sm">

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <span class="font-weight-bold">Fecha: <span style="color:red;">*</span></span>
                            <input type="date" name="fecha" id="fecha" class="form-control form-control-sm">

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                                <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                    <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                                <button type="button" id="btn-registrar" class="btn btn-info btn-sm my-1" onclick="modalMulti(1);" disabled>
                                    <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                                <button type="button" id="btn-modificar" class="btn btn-success btn-sm my-1" onclick="modalMulti(2);" disabled>
                                    <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                                <button type="button" id="btn-cancelar" class="btn btn-danger btn-sm my-1" onclick="modalMulti(3);" disabled>
                                    <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                            </div>

                            <a href="../general/" class="btn btn-primary btn-sm my-1 form-control font-weight-bold">
                                <i class="fa fa-calendar-check-o tam-icon px-2"></i>Actividades</a>

                        </div>

                        <div class="col-lg-9 form-control form-control-sm">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">LISTA DE OFICIOS</span>
                            </div>

                            <div class="input-group input-group-sm my-2">
                                <div class="input-group-prepend">
                                    <span class="font-weight-bold">Filtros de Búsqueda:</span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold">A. Remitente</span>
                                            </div>
                                            <input type="text" name="filtro_remitente" id="filtro_remitente" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold">A. Recepciona</span>
                                            </div>
                                            <input type="text" name="filtro_recepciona" id="filtro_recepciona" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold">Fecha</span>
                                            </div>
                                            <input type="date" name="filtro_fecha" id="filtro_fecha" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-sm my-1">
                            </div>

                            <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:461px;">

                                <table class="table table-light table-sm table-hover table-bordered table-striped m-0" style="font-size:13px;">
                                    <thead class="btn-outline-dark">
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">Codigo</th>
                                            <th class="text-center">Asunto</th>
                                            <th class="text-center">A. Remitente</th>
                                            <th class="text-center">A. Recepciona</th>
                                            <th class="text-center">Documentos</th>
                                            <th class="text-center">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenidoOficios" class="text-dark">

                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">OF00000001</td>
                                            <td>Prueba de asunto de oficio</td>
                                            <td class="text-center">CALIDAD</td>
                                            <td class="text-center">SISTEMAS</td>
                                            <td class="text-center">
                                            <button id="btn-documentos" class="btn btn-sm p-0" onclick="modalDocumentos();"><i class="fa fa-file-archive-o tam-icon px-2 fa-lg"></i></button>
                                            </td>
                                            <td class="text-center">12-10-19</td>
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

    <?php include('procesos/modals.php'); ?>
    <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
</body>

</html>
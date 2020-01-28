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

</head>

<body>

    <?php include($ruta . 'assets/include/headerAdministrativo.php') ?>

    <div class="bg-socendary" id="uMdi">

        <div id="uLateral" class="uLateral-lg uGreen">
            <?php include($ruta . 'assets/include/navLateralAdministrativo.php') ?>
        </div>

        <div class="uMain-lg bg-light border-left border-warning" id="uMain">

            <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                <span>Actividades</span>
            </div>

            <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

                <div class="px-3">

                    <div class="row">

                        <div class="col-lg-3 form-control form-control-sm">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">REGISTRO DE ACTIVIDADES</span>
                            </div>

                            <input type="text" name="codigo" id="codigo" class="d-none">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">Descripción</span>
                            </div>
                            <textarea class="p-1" name="descripcion" id="descripcion" rows="5" style="max-width:100%;min-width:100%;max-height:240px;min-height:240px;font-size:13px;" maxlength="1000" placeholder="Descripción de la actividad"></textarea>

                            <div class="input-group input-group-sm my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold" id="basic-addon1">Area</span>
                                </div>
                                <input type="text" name="area" id="area" class="form-control">
                            </div>

                            <div class="input-group input-group-sm my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha Inicio</span>
                                </div>
                                <input type="date" name="inicio" id="inicio" class="form-control">
                            </div>

                            <div class="input-group input-group-sm my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha Termino</span>
                                </div>
                                <input type="date" name="fin" id="fin" class="form-control">
                            </div>

                            <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                                <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                    <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                                <button type="button" id="btn-registrar" class="btn btn-warning btn-sm my-1" onclick="modalMulti(1);" disabled>
                                    <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                                <button type="button" id="btn-modificar" class="btn btn-warning btn-sm my-1" onclick="modalMulti(2);" disabled>
                                    <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                                <button type="button" id="btn-cancelar" class="btn btn-warning btn-sm my-1" onclick="modalMulti(3);" disabled>
                                    <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                            </div>

                        </div>

                        <div class="col-lg-9 form-control form-control-sm">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">LISTA DE ACTIVIDADES</span>
                            </div>

                            <div class="input-group input-group-sm my-1 d-none">
                                <div class="input-group-prepend">
                                    <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                                </div>
                                <input type="text" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                            </div>

                            <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:473px;">

                                <table class="table table-light table-sm table-hover table-bordered table-striped m-0" style="font-size:13px;">
                                    <thead class="btn-warning">
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">Actividad</th>
                                            <th class="text-center">Area</th>
                                            <th class="text-center">Fecha Inicio</th>
                                            <th class="text-center">Fecha Termino</th>
                                            <th class="text-center">OBS.</th>
                                            <th class="text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenido" class="text-dark">

                                        <?php

                                        $conectar = new conexion('A');
                                        $consulta = "SELECT * FROM actividades WHERE estado = '1' AND responsable = '" . $_SESSION["agd_USUARIO"] . "' ";

                                        $con = $conectar->abrirConexion();

                                        $stmt = sqlsrv_query($con, $consulta);

                                        $cont = 0;

                                        while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {

                                            $cont = $cont + 1;

                                            $inicio = date_format($fila[3], 'd/m/Y');
                                            $fin = date_format($fila[4], 'd/m/Y');

                                            if ($fin == '01/01/1900') {
                                                $fin = "";
                                            }

                                            echo '
                                                <tr ondblclick="editar(' . "'" . $fila[0] . "'" . ');" style="cursor:pointer;">
                                                    <td class="text-center">' . $cont . '</td>
                                                    <td class="text-center w-25">' . $fila[1] . '</td>
                                                    <td class="text-center w-25">' . $fila[2] . '</td>
                                                    <td class="text-center">' . $inicio . '</td>
                                                    <td class="text-center">' . $fin . '</td>
                                                    <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-info btn-sm p-0" onclick="modalObs('.$fila[0].');"><i class="fa fa-external-link tam-icon px-2"></i></button></td>
                                                    <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-danger btn-sm p-0 pr-2" onclick="modalEliminar(1, ' . $fila[0] . ');"><i class="fa fa-clone tam-icon px-2"></i>Finalizar</button></td>
                                                </tr>
                                                ';
                                        }

                                        $conectar->cerrarConexion($stmt, $con);

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

    <?php include('procesos/modals.php'); ?>
    <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
</body>

</html>
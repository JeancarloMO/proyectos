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
                            <textarea class="p-1" name="descripcion" id="descripcion" rows="5" style="max-width:100%;min-width:100%;max-height:110px;min-height:110px;font-size:13px;" maxlength="1000" placeholder="Descripción de la actividad"></textarea>

                            <div class="input-group input-group-sm my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold" id="basic-addon1">Responsable</span>
                                </div>
                                <select name="" id="responsable" class="form-control">
                                    <option value="">[SELECCIONAR]</option>
                                    <?php

                                    $conectar = new conexion('A');
                                    $consulta = "SELECT usuario FROM usuario WHERE estado = '1' ";

                                    $con = $conectar->abrirConexion();

                                    $stmt = sqlsrv_query($con, $consulta);

                                    $cont = 0;

                                    while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
                                        echo '<option value="' . $fila[0] . '">' . $fila[0] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>

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

                            <button type="button" id="btn-dh" class="btn btn-success btn-sm my-1 form-control" onclick="finalizados();">
                                <i class="fa fa-list tam-icon px-2"></i>Ver Finalizados</button>

                            <button type="button" id="btn-hb" class="btn btn-info btn-sm my-1 form-control" onclick="lista();" disabled>
                                <i class="fa fa-list-alt tam-icon px-2"></i>Ver Pendientes</button>

                            <a href="../oficios/" class="btn btn-primary btn-sm my-1 form-control font-weight-bold">
                                <i class="fa fa-file tam-icon px-2"></i>Oficios</a>

                        </div>

                        <div class="col-lg-9 form-control form-control-sm">

                            <div class="form-control form-control-sm my-1">
                                <span class="font-weight-bold">LISTA DE ACTIVIDADES</span>
                            </div>

                            <div class="input-group input-group-sm my-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold" id="basic-addon1">Filtrar por usuario</span>
                                </div>

                                <select name="" id="filtrarUsuarioP" class="form-control" onchange="filtrarUsuarioP();">
                                    <option value="">[ TODOS ]</option>
                                    <?php

                                    $conectar = new conexion('A');
                                    $consulta = "SELECT usuario, apellidos+', '+nombres FROM usuario WHERE estado = '1' ";

                                    $con = $conectar->abrirConexion();

                                    $stmt = sqlsrv_query($con, $consulta);

                                    $cont = 0;

                                    while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
                                        echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                                    }

                                    ?>
                                </select>

                                <select name="" id="filtrarUsuarioF" class="form-control d-none" onchange="filtrarUsuarioF();">
                                    <option value="">[ TODOS ]</option>
                                    <?php

                                    $conectar = new conexion('A');
                                    $consulta = "SELECT usuario, apellidos+', '+nombres FROM usuario WHERE estado = '1' ";

                                    $con = $conectar->abrirConexion();

                                    $stmt = sqlsrv_query($con, $consulta);

                                    $cont = 0;

                                    while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
                                        echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                                    }

                                    ?>
                                </select>

                            </div>

                            <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:461px;">

                                <table class="table table-light table-sm table-hover table-bordered table-striped m-0" style="font-size:13px;">
                                    <thead class="btn-warning">
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">Descripcion</th>
                                            <th class="text-center">Area</th>
                                            <th class="text-center">Fecha Inicio</th>
                                            <th class="text-center">Fecha Termino</th>
                                            <th id="th_entrega" class="text-center d-none">Fecha Entrega</th>
                                            <th class="text-center">Responsable</th>
                                            <th class="text-center">OBS.</th>
                                            <th class="text-center">Estado</th>
                                            <th id="th_adm" class="text-center d-none">Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenido" class="text-dark">

                                        <?php

                                        $conectar = new conexion('A');
                                        $consulta = "SELECT * FROM actividades WHERE estado = '1' ";

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
                                                    <td class="text-center">' . $fila[8] . '</td>
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
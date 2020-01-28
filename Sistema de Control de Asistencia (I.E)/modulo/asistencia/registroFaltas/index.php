<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Asistencia</title>
        <?php
        session_start();
        $ruta='../../../';
        require($ruta.'assets/include/links.php');
        require ($ruta.'assets/php/funciones.php');
        ?>
        <script src="procesos/registroFaltas.js"></script>

        <style>

            .bloquear{
                background-color: rgba(0,0,0,0.5);
                pointer-events: none;
                opacity: 0.4;
                min-height: 100%;
                height: 100%;
                background-repeat: no-repeat;
            }

        </style>

    </head>

    <body id="bloquear">
        <!-- navbar -->
        <?php include ($ruta.'assets/include/headerAdministrativo.php') ?>
        <!-- navbar -->
        <!-- content -->
        <div class="bg-socendary" id="uMdi">
            <!-- INICIO DEL LATERAL -->
            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralAdministrativo.php') ?>
            </div>
            <!-- INICIO DEL MAIN -->
            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

                <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                    <span>Registro de Faltas</span>
                </div>

                <div class="container-fluid p-1">

                    <div class="form-control form-control-sm px-3">

                        <div class="row">

                            <div class="col-lg-3">    

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Turno:</span>
                                    </div>
                                    <select name="turno" id="turno" onchange="buscarFaltantes();" class="form-control">
                                        <option value="">[NONE]</option>
                                        <?php

                                        $funcion = new Funciones('A');

                                        $consulta = $funcion -> Seleccionar("SELECT cod_turno, turno FROM turno");

                                        while($fila = mysqli_fetch_array($consulta)){

                                            echo '
                                            <option value="'.$fila[0].'">'.$fila[1].'</option>
                                            ';

                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha:</span>
                                    </div>
                                    <input type="date" id="fecha" onchange="buscarFaltantes();" class="form-control" value="">
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <button id="btn-registrar" class="btn btn-danger btn-sm form-control my-1" onclick="modalMulti(1);">
                                    <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar Faltas</button>

                            </div>

                        </div>

                    </div>

                    <div class="input-group input-group-sm my-1 d-none">
                        <div class="input-group-prepend">
                            <a  class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></a>
                        </div>
                        <input type="text" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                    </div>

                    <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded">

                        <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                            <thead class="btn-warning">
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Ap. Paterno</th>
                                    <th class="text-center">Ap. Materno</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Turno</th>
                                </tr>
                            </thead>
                            <tbody id="contenidoFaltantes">

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>

        <?php include ('procesos/modals.php'); ?>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
    </body>
</html>
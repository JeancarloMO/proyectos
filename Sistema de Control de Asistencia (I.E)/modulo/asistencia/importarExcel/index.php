<!DOCTYPE html>
<html>
    <head>
        <title>Asistencia</title>
        <?php 
        session_start();
        $ruta='../../../';
        include ($ruta.'assets/php/funciones.php');
        require ($ruta.'assets/include/links.php');
        ?>
        <script src="procesos/importarExcel.js"></script>
        <script src="../../../assets/js/upload.js"></script>

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

        <?php include ($ruta.'assets/include/headerAdministrativo.php') ?>

        <div class="bg-socendary" id="uMdi">

            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralAdministrativo.php') ?>
            </div>

            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

                <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                    <span>Importar Excel</span>
                </div>

                <div class="container-fluid p-2">

                    <div class="form-control form-control-sm">

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="my-1">
                                    <h4 class="font-weight-bold text-center">LISTA DE DATOS EXCEL</h4>
                                </div>

                                <form action="javascript:void(0);">
                                    <div class="input-group input-group-sm">
                                        <input type="file" name="archivo" id="archivo" accept="application/vnd.ms-excel" class="form-control">
                                        <div class="input-group-prepend">
                                            <input type="submit" name="submit" id="boton_subir" value="Cargar" class="btn btn-info btn-sm">
                                        </div>
                                    </div>
                                </form>

                                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="height:445px">

                                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                        <thead class="btn-warning">
                                            <tr>
                                                <th class="text-center">N°</th>
                                                <th class="text-center">Codigo Alumno</th>
                                                <th class="text-center">Tiempo</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenidoExcel" class="text-dark">

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="my-1">
                                    <h4 class="font-weight-bold text-center">LISTA DE ALUMNOS</h4>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text font-weight-bold" id="basic-addon1">Turno:</span>
                                            </div>
                                            <select name="turno" id="turno" class="form-control" onchange="buscarLista();">
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

                                    <div class="col-lg-6">

                                        <button id="btn-importar" class="btn btn-success btn-sm form-control" onclick="modalMulti(1);">
                                            <i class="fa fa-upload tam-icon px-2"></i>Importar Excel</button>

                                    </div>

                                </div>

                                <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded" style="height:443px">

                                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                        <thead class="btn-warning">
                                            <tr>
                                                <th class="text-center">N°</th>
                                                <th class="text-center">Codigo Alumno</th>
                                                <th class="text-center">Turno</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenidoLista" class="text-dark">

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <?php include ('procesos/modals.php'); ?>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
    </body>
</html>

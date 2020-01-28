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
        <script src="procesos/listaAsistencia.js"></script>
    </head>

    <body>
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
                    <span>Lista de Asistencia</span>
                </div>

                <div class="container-fluid p-1">

                    <div class="form-control form-control-sm px-3">

                        <form action="procesos/exportarExcel.php" method="post" autocomplete="off" onKeypress="if(event.keyCode == 13) event.returnValue = false;">

                            <div class="row">

                                <div class="col-lg-2">    

                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold" id="basic-addon1">Turno:</span>
                                        </div>
                                        <select name="turno" id="turno" onchange="buscarAsistencia();" class="form-control">
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

                                <div class="col-lg-2">    

                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold" id="basic-addon1">Salón:</span>
                                        </div>
                                        <select name="salon" id="salon" onchange="buscarAsistencia();" class="form-control">
                                            <option value="">[NONE]</option>
                                            <?php

                                            $funcion = new Funciones('A');

                                            $consulta = $funcion -> Seleccionar("SELECT cod_salon, grado, seccion FROM salon");

                                            while($fila = mysqli_fetch_array($consulta)){

                                                echo '
                                            <option value="'.$fila[0].'">'.$fila[1].$fila[2].'</option>
                                            ';

                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha Inicio:</span>
                                        </div>
                                        <input type="date" name="inicio" id="inicio" onchange="buscarAsistencia();" class="form-control" value="">
                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="input-group input-group-sm my-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold" id="basic-addon1">Fecha Fin:</span>
                                        </div>
                                        <input type="date" name="fin" id="fin" onchange="buscarAsistencia();" class="form-control" value="">
                                    </div>

                                </div>

                                <div class="col-lg-2">

                                    <button id="btn-exportar" class="btn btn-success btn-sm form-control my-1 font-weight-bold" onclick="exportarExcel();" title="Exportar a Excel"><i class="fa fa-file-excel-o tam-icon px-2"></i>Exportar</button>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="input-group input-group-sm my-1 d-none">
                        <div class="input-group-prepend">
                            <buttton class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></buttton>
                        </div>
                        <input type="text" id="buscar" onkeyup="buscarAsistencia();" class="form-control">
                    </div>

                    <div class="form-control form-control-sm my-1 d-none">
                        <span class="font-weight-bold">FILTRAR ALUMNO :</span>
                    </div>

                    <div class="form-control px-3 my-1 d-none">

                        <div class="row">
                            
                            <div class="col-lg-3">

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Codigo :</span>
                                    </div>
                                    <input type="text" id="buscar" onkeyup="buscarAsistencia();" class="form-control">
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Ap. Paterno :</span>
                                    </div>
                                    <input type="text" id="buscar" onkeyup="buscarAsistencia();" class="form-control">
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Ap. Materno :</span>
                                    </div>
                                    <input type="text" id="buscar" onkeyup="buscarAsistencia();" class="form-control">
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Nombres :</span>
                                    </div>
                                    <input type="text" id="buscar" onkeyup="buscarAsistencia();" class="form-control">
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded">

                        <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                            <thead class="btn-warning">
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Ap. Paterno</th>
                                    <th class="text-center">Ap. Materno</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Aula</th>
                                    <th class="text-center">Turno</th>
                                    <th class="text-center">Entrada</th>
                                    <th class="text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="contenidoAsistencia">

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
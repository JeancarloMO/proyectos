<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Registro</title>
        <?php 
        session_start();
        $ruta = '../../../';
        include ($ruta.'assets/include/links.php');
        require ($ruta.'assets/php/funciones.php');
        ?>
        <link rel="stylesheet" href="procesos/alumno.css">
        <script src="procesos/alumno.js"></script>

    </head>

    <body>

        <?php include ($ruta.'assets/include/headerAdministrativo.php') ?>

        <div class="bg-socendary" id="uMdi">

            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralAdministrativo.php') ?>
            </div>

            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

                <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                    <span>Registro Alumno</span>
                </div>

                <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

                    <div class="px-3">

                        <div class="row">

                            <div class="col-lg-4 form-control form-control-sm">

                                <div class="form-control form-control-sm my-1">
                                    <span class="font-weight-bold">DATOS DEL ALUMNO</span>
                                </div>

                                <div class="form-control form-control-sm centrar-custom my-1">
                                    <img src="<?php echo $ruta; ?>assets/img/alumno.png" alt="" style="height:161px;">
                                </div>
                                
                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Codigo N°</span>
                                    </div>
                                    <input type="text" name="codigo" id="codigo" class="form-control" required>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Apellido Paterno:<span class="text-danger">&nbsp;(*)</span></span>
                                    </div>
                                    <input type="text" name="paterno" id="paterno" class="form-control" required>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Apellido Materno:<span class="text-danger">&nbsp;(*)</span></span>
                                    </div>
                                    <input type="text" name="materno" id="materno" class="form-control" required>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Nombres:<span class="text-danger">&nbsp;(*)</span></span>
                                    </div>
                                    <input type="text" name="nombres" id="nombres" class="form-control" required>
                                </div>
                                
                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Convalidación:</span>
                                    </div>
                                    <input type="text" name="convalidacion" id="convalidacion" class="form-control">
                                </div>
                                
                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Obs:</span>
                                    </div>
                                    <input type="text" name="obs" id="obs" class="form-control">
                                </div>

                                <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                                    <button type="button" id="btn-nuevo" class="btn btn-warning btn-sm my-1" onclick="nuevo();">
                                        <i class="fa fa-sticky-note tam-icon px-2"></i>Nuevo</button>
                                    <button type="button" id="btn-registrar" class="btn btn-warning btn-sm my-1"
                                            onclick="modalMulti(1);" disabled>
                                        <i class="fa fa-floppy-o tam-icon px-2"></i>Registrar</button>
                                    <button type="button" id="btn-modificar" class="btn btn-warning btn-sm my-1"
                                            onclick="modalMulti(2);" disabled>
                                        <i class="fa fa-pencil-square-o tam-icon px-2"></i>Modificar</button>
                                    <button type="button" id="btn-cancelar" class="btn btn-warning btn-sm my-1" onclick="modalMulti(3);" disabled>
                                        <i class="fa fa-ban tam-icon px-2"></i>Cancelar</button>
                                </div>

                            </div>

                            <div class="col-lg-8 form-control form-control-sm">

                                <div class="form-control form-control-sm my-1">
                                    <span class="font-weight-bold">LISTA DE ALUMNOS</span>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                                    </div>
                                    <input type="text" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                                </div>

                                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:438px;">

                                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                        <thead class="btn-warning">
                                            <tr>
                                                <th class="text-center">N°</th>
                                                <th class="text-center">Codigo</th>
                                                <th class="text-center">Ap. Paterno</th>
                                                <th class="text-center">Ap. Materno</th>
                                                <th class="text-center">Nombres</th>
                                                <th class="text-center">Convalidacion</th>
                                                <th class="text-center">Obs.</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenidoAlumno" class="text-dark">

                                            <?php
                                            
                                            $cont = 0;

                                            $funcion = new Funciones('A');

                                            $consulta = $funcion -> Seleccionar("SELECT cod_alumno, paterno, materno, nombres, convalidacion, obs FROM alumno ORDER BY paterno, materno, nombres");

                                            while($fila = mysqli_fetch_array($consulta)){

                                                $cont = $cont+1;

                                                echo '
                                                <tr ondblclick="editar('."'".$fila[0]."'".');" style="cursor:pointer;">
                                                    <td class="text-center">'.$cont.'</td>
                                                    <td class="text-center">'.$fila[0].'</td>
                                                    <td class="text-center">'.$fila[1].'</td>
                                                    <td class="text-center">'.$fila[2].'</td>
                                                    <td class="text-center">'.$fila[3].'</td>
                                                    <td class="text-center">'.$fila[4].'</td>
                                                    <td class="text-center">'.$fila[5].'</td>
                                                </tr>
                                                ';

                                            }

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

        <?php include ('procesos/modals.php'); ?>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
    </body>

</html>
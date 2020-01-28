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
        <link rel="stylesheet" href="procesos/matricula.css">
        <script src="procesos/matricula.js"></script>

    </head>

    <body>

        <?php include ($ruta.'assets/include/headerAdministrativo.php') ?>

        <div class="bg-socendary" id="uMdi">

            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralAdministrativo.php') ?>
            </div>

            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

                <div class="form-control form-control-sm text-center uGreen text-white font-weight-bold">
                    <span>Registro Matrícula</span>
                </div>

                <div class="container-fluid p-1" style="background-color: rgb(232, 232, 227);">

                    <div class="px-3">

                        <div class="row">

                            <div class="col-lg-4 form-control form-control-sm">

                                <div class="form-control form-control-sm my-1">
                                    <span class="font-weight-bold">DATOS DE MATRICULA</span>
                                </div>

                                <div class="form-control form-control-sm centrar-custom my-1">
                                    <img src="<?php echo $ruta; ?>assets/img/uruguay.png" alt="" style="height:150px;" class="p-2">
                                </div>

                                <input type="text" name="id_mat" id="id_mat" class="d-none">

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
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Salón:<span class="text-danger">&nbsp;(*)</span></span>
                                    </div>
                                    <select name="salon" id="salon" class="form-control" required>
                                        <option value="">[NONE]</option>
                                        <?php  include("procesos/getSalon.php");?>
                                    </select>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Turno:<span class="text-danger">&nbsp;(*)</span></span>
                                    </div>
                                    <select name="turno" id="turno" class="form-control" required>
                                        <option value="">[NONE]</option>
                                        <?php  include("procesos/getTurno.php");?>
                                    </select>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Docente:</span>
                                    </div>
                                    <input type="text" name="doc" id="doc" class="d-none">
                                    <input type="text" name="docente" id="docente" class="form-control" placeholder="seleccionar docente" required>
                                    <button class="btn btn-success btn-sm" onclick="modalbuscarDocente();"><i class="fa fa-search tam-icon px-2"></i></button>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">Obs:</span>
                                    </div>
                                    <input type="text" name="obs" id="obs" class="form-control">
                                </div>

                                <div class="col-lg-12 border rounded text-center py-1 form-control my-1">
                                    <button type="button" id="bb" class="btn btn-warning btn-sm mr-1" onclick="modalbuscar();">
                                        <i class="fa fa-search tam-icon px-2"></i>Buscar</button>
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
                                    <span class="font-weight-bold">LISTA DE MATRICULADOS</span>
                                </div>

                                <div class="input-group input-group-sm my-1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-info" id="basic-addon1"><i class="fa fa-search tam-icon px-2"></i></button>
                                    </div>
                                    <input type="text" id="buscarlista" onkeyup="buscarlista();" class="form-control">
                                </div>

                                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-success rounded" style="max-height:462px">

                                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                                        <thead class="btn-warning">
                                            <tr>
                                                <th class="text-center">N°</th>
                                                <th class="text-center">Codigo</th>
                                                <th class="text-center">Alumno</th>
                                                <th class="text-center">Salon</th>
                                                <th class="text-center">Turno</th>
                                                <th class="text-center">Docente</th>
                                                <th class="text-center">Obs.</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenidoMatricula" class="text-dark">

                                            <?php

                                            $cont = 0;

                                            $funcion = new Funciones('A');

                                            $consulta = $funcion -> Seleccionar("SELECT M.cod_matricula, M.cod_alumno, A.paterno, A.materno, A.nombres, S.grado, S.seccion, T.abrev, D.paterno, D.materno, D.nombres, M.obs FROM matricula AS M INNER JOIN alumno as A ON M.cod_alumno = A.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno INNER JOIN docente AS D ON M.cod_docente = D.cod_docente WHERE M.semestre = '2019' ORDER BY A.paterno");

                                            while($fila = mysqli_fetch_array($consulta)){

                                                $cont = $cont+1;

                                                echo '
                                                <tr ondblclick="editar('."'".$fila[0]."'".');" style="cursor:pointer;">
                                                    <td class="text-center">'.$cont.'</td>
                                                    <td class="text-center">'.$fila[1].'</td>
                                                    <td>'.$fila[2].' '.$fila[3].', '.$fila[4].'</td>
                                                    <td class="text-center">'.$fila[5].$fila[6].'</td>
                                                    <td class="text-center">'.$fila[7].'</td>
                                                    <td>'.$fila[8].' '.$fila[8].', '.$fila[10].'</td>
                                                    <td class="text-center">'.$fila[11].'</td>
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
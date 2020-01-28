<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Repositorio</title>
        <?php 
        session_start();
        $ruta='../../';
        require($ruta.'assets/include/links.php');
        require ($ruta.'assets/php/funciones.php');
        ?>
        <script src="procesos/repositorio.js"></script>
        <script src="../../assets/js/upload.js"></script>
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
                    <span>Archivos de Repositorio</span>
                </div>

                <div class="container-fluid p-1">

                    <div class="form-control form-control-sm px-3">

                        <form action="javascript:void(0);">

                            <div class="row">

                                <div class="col-lg-5">

                                    <div class="input-group input-group-sm my-1 px-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold" id="basic-addon1">Nombre del archivo:</span>
                                        </div>
                                        <input type="text" name="nombre_archivo" id="nombre_archivo" class="form-control" placeholder="ejemplo: nombre_archivo">
                                    </div>

                                </div>

                                <div class="col-lg-5">

                                    <div class="input-group input-group-sm my-1">
                                        <input type="file" name="archivo" id="archivo" class="form-control">
                                    </div>

                                </div>

                                <div class="col-lg-2">

                                    <button type="submit" id="boton_subir" class="btn btn-success btn-sm form-control my-1 font-weight-bold"><i class="fa fa-upload tam-icon px-2"></i>Subir Archivo</button>

                                </div>

                            </div>

                        </form>

                    </div>

                    <div id="respuesta" class="alert d-none"></div>

                    <div class="input-group input-group-sm my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold bg-info text-white" id="basic-addon1">Progreso de Subida de Archivo:</span>
                        </div>
                        <div class="form-control p-1">
                        <progress id="barra_de_progreso" value="0" max="100" class="w-100 h-100"></progress>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold bg-info text-white" id="basic-addon1">Tamaño max. del archivo (30mb)</span>
                        </div>
                    </div>
                    
                    <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded">

                        <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                            <thead class="btn-warning">
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Nombre del Archivo</th>
                                    <th class="text-center">Vista Previa</th>
                                    <th class="text-center">Eliminar Archivo</th>
                                </tr>
                            </thead>
                            <tbody id="archivos_subidos">

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
<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Bienvenido</title>
        <?php
        
        session_start();

        if(!isset($_SESSION["fa_TIPO_USUARIO"])){

            session_destroy();

            header("location:../");

        }

        $ruta='../../';
        require($ruta.'assets/include/links.php');
        require($ruta.'assets/php/funciones.php');
        
        ?>

        <style>

            .centrar{

                display: flex;
                justify-content: center;

            }

        </style>

    </head>

    <body>
        <!-- navbar -->
        <?php include ($ruta.'assets/include/headerDocente.php') ?>
        <!-- navbar -->
        <!-- content -->
        <div class="bg-socendary" id="uMdi">
            <!-- INICIO DEL LATERAL -->
            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralDocente.php') ?>
            </div>
            <!-- INICIO DEL MAIN -->
            <div class="uMain-lg bg-light border-left border-warning" id="uMain">

                <div class="container-fluid">

                    <div class="form-control form-control-sm my-1 text-center border border-info">
                        <span class="font-weight-bold">CURSOS ASIGNADOS</span>
                    </div>

                    <div class="row text-center centrar">

                        <?php

                        $conectar = new Funciones();

                        $consulta = "SELECT DC.cod_doc_curso, DC.aula, DC.nivel, DC.turno, C.descripcion FROM docente_curso AS DC INNER JOIN cursos AS C ON DC.cod_curso = C.cod_curso WHERE DC.docente = '".$_SESSION["fa_DOCUMENTO"]."' AND DC.periodo = '".$_SESSION["fa_PERIODO"]."'";

                        $resultado = $conectar->Seleccionar($consulta);

                        $cont=0;
                        $turno = "";

                        while($fila = mysqli_fetch_array($resultado)){

                            $cont++;

                            if($fila[3] == "M"){
                                $turno = "Mañana";
                            }elseif($fila[3] == "T"){
                                $turno = "Tarde";
                            }

                            echo '
                            <div class="col-sm-6 my-1">
                                <div class="card border border-info">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size:16px;">Grado y Sección: &nbsp;<strong>'.$fila[1].' '.$fila[2].'</strong></h5>
                                        <h5 class="card-title" style="font-size:16px;">Turno: &nbsp;<strong>'.$turno.'</strong></h5>
                                        <p class="card-text font-weight-bold" style="color:#626060;">'.$fila[4].'</p>
                                        <a href="course/?course='.$fila[0].'" class="btn btn-info font-weight-bold">Ingresar al Curso</a>
                                    </div>
                                </div>
                            </div>';

                        }

                        ?>

                    </div>

                </div>

            </div>
        </div>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
    </body>
</html>
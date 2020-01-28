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
    </head>

    <body>
        <!-- navbar -->
        <?php include ($ruta.'assets/include/headerApafa.php') ?>
        <!-- navbar -->
        <!-- content -->
        <div class="bg-socendary" id="uMdi">
            <!-- INICIO DEL LATERAL -->
            <div id="uLateral" class="uLateral-lg uGreen">
                <?php include ($ruta.'assets/include/navLateralApafa.php') ?>
            </div>
            <!-- INICIO DEL MAIN -->
            <div class="uMain-lg bg-light border-left border-warning" id="uMain">
            
                <div class="container-fluid">

                    <div class="form-control form-control-sm my-1 text-center border border-info">
                        <span class="font-weight-bold">ALUMNOS ASIGNADOS</span>
                    </div>

                    <div class="row text-center centrar">

                        <?php

                        $conectar = new Funciones();

                        $consulta = "SELECT DISTINCT A.alumno, P.paterno, P.materno, P.nombres, M.aula, M.nivel, M.turno FROM apafa AS A INNER JOIN matricula AS M ON A.alumno = M.alumno INNER JOIN persona AS P ON A.alumno = P.documento WHERE A.apoderado = '".$_SESSION["fa_DOCUMENTO"]."' and M.periodo = '".$_SESSION["fa_PERIODO"]."'";

                        $resultado = $conectar->Seleccionar($consulta);

                        $cont=0;
                        $turno = "";

                        while($fila = mysqli_fetch_array($resultado)){

                            $cont++;

                            if($fila[6] == "M"){
                                $turno = "Mañana";
                            }elseif($fila[6] == "T"){
                                $turno = "Tarde";
                            }

                            echo '
                            <div class="col-sm-6 my-1">
                                <div class="card border border-info">
                                    <div class="card-body">
                                        <p class="card-text font-weight-bold" style="color:#626060;">'.$fila[1].' '.$fila[2].', '.$fila[3].'</p>
                                        <h5 class="card-title" style="font-size:16px;">Grado y Sección: &nbsp;<strong>'.$fila[4].' '.$fila[5].'</strong></h5>
                                        <h5 class="card-title" style="font-size:16px;">Turno: &nbsp;<strong>'.$turno.'</strong></h5>
                                        <a href="student/?student='.$fila[0].'" class="btn btn-info font-weight-bold">Ver Notas del Alumno</a>
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
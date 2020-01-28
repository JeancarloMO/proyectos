<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Bienvenido</title>
        <?php

        session_start();
        
        if(!isset($_SESSION["fa_TIPO_USUARIO"])){

            session_destroy();

            header("location:../../");

        }
        
        if(!isset($_GET["student"])){

            header("location:../");

        }

        $ruta='../../../';
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
                        <span class="font-weight-bold">CURSOS DEL ALUMNO</span>
                    </div>

                    <!--<div class="">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-control form-control-sm my-1 text-center">
                                    <span class="font-weight-bold">REGISTRO DE NOTAS</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a href="../../docente/" class="btn btn-sm form-control text-white bg-info my-1 font-weight-bold"><i class="fa fa-arrow-left tam-icon px-2"></i>Regresar</a>
                            </div>
                        </div>
                    </div>-->

                    <?php

                    $conectar = new Funciones();

                    $consulta = "SELECT DISTINCT A.alumno, P.paterno, P.materno, P.nombres, M.aula, M.nivel, M.turno FROM apafa AS A INNER JOIN matricula AS M ON A.alumno = M.alumno INNER JOIN cursos AS C ON M.cod_curso = C.cod_curso INNER JOIN persona AS P ON A.alumno = P.documento WHERE A.apoderado = '".$_SESSION["fa_DOCUMENTO"]."' and M.periodo = '".$_SESSION["fa_PERIODO"]."' AND A.alumno = '".$_GET["student"]."'";

                    $resultado = $conectar->Seleccionar($consulta);

                    while($fila = $resultado->fetch_array()){
                        
                        if($fila[6] == "M"){
                            $turno = "MAÑAMA";
                        }elseif($fila[6] == "T"){
                            $turno = "TARDE";
                        }

                        echo '
                        <div class="form-control form-control-sm my-2 border border-info">
                            <span class="font-weight-bold">Alumno: &nbsp;<span>'.$fila[1].' '.$fila[2].', '.$fila[3].'</span></span><br>
                            <span class="font-weight-bold">Grado y Sección: &nbsp;<span>'.$fila[4].' '.$fila[5].'</span></span><br>
                            <span class="font-weight-bold">Turno: &nbsp;<span>'.$turno.'</span></span>
                            <a href="../../apafa/" class="btn btn-sm form-control text-white bg-info my-1 font-weight-bold"><i class="fa fa-arrow-left tam-icon px-2"></i>Regresar</a>
                        </div>
                        ';

                    }

                    ?>

                    <div class="form-control form-control-sm table-responsive my-1 p-1 border border-info rounded" style="max-height:438px;">

                        <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                            <thead class="btn-warning">
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Curso</th>
                                    <th class="text-center">Docente</th>
                                    <th class="text-center">1° Trim.</th>
                                    <th class="text-center">2° Trim.</th>
                                    <th class="text-center">3° Trim.</th>
                                    <th class="text-center">Promedio</th>
                                    <th class="text-center">OBS.</th>
                                </tr>
                            </thead>
                            <tbody id="contenidoAlumno" class="text-dark">

                                <?php

                                $conectar = new Funciones();

                                $consulta = "SELECT M.cod_matricula, M.cod_curso, C.descripcion, P.paterno, P.materno, P.nombres, M.T1, M.T2, M.T3, M.promedio FROM apafa AS A INNER JOIN matricula AS M ON A.alumno = M.alumno INNER JOIN cursos AS C ON M.cod_curso = C.cod_curso INNER JOIN docente_curso AS DC ON DC.aula = M.aula AND DC.nivel = M.nivel AND DC.turno = M.turno AND DC.cod_curso = M.cod_curso AND DC.periodo = M.periodo INNER JOIN persona AS P ON DC.docente = P.documento WHERE A.apoderado = '".$_SESSION["fa_DOCUMENTO"]."' and M.periodo = '".$_SESSION["fa_PERIODO"]."' AND A.alumno = '".$_GET["student"]."'";

                                $resultado = $conectar->Seleccionar($consulta);

                                $cont=0;

                                while($fila = $resultado->fetch_array()){

                                    $cont++;

                                    echo '
                                    <tr>
                                        <td class="text-center">'.$cont.'</td>
                                        <td class="text-center">'.$fila[1].'</td>
                                        <td class="text-center">'.$fila[2].'</td>
                                        <td class="text-center">'.$fila[3].' '.$fila[4].', '.$fila[5].'</td>
                                        <td class="text-center">'.$fila[6].'</td>
                                        <td class="text-center">'.$fila[7].'</td>
                                        <td class="text-center">'.$fila[8].'</td>
                                        <td class="text-center">'.$fila[9].'</td>
                                        <td class="text-center"><button type="button" id="btn-nuevo" class="btn btn-info btn-sm p-0" onclick="modalObs('."'".$fila[0]."'".');"><i class="fa fa-external-link tam-icon px-2"></i></button></td>
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
        <?php include "procesos/modals.php"; ?>
        <script src="<?php echo $ruta; ?>assets/js/newjs.js"></script>
        <script src="procesos/js.js"></script>
    </body>
</html>
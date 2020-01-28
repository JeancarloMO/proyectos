<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Repositorio IE R.O.U 1014</title>
        <?php 
        session_start();
        $ruta = '../../../';
        require($ruta.'assets/include/links.php');
        ?>

        <script>

            $(document).ready(function() {
                mostrarArchivos();
            });

            function mostrarArchivos() {
                $.ajax({
                    url: '../procesos/mostrar_archivos.php',
                    dataType: 'JSON',
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            var cont = 0;
                            for (var i = 0; i < respuesta.length; i++) {
                                if (respuesta[i] != undefined) {
                                    cont = cont+1;
                                    html += '<tr><td class="text-center font-weight-bold">'+ cont +'</td><td class="arc text-center font-weight-bold">' + respuesta[i] + '</td><td class="text-center"><< <a href="../archivos/' + respuesta[i] + '" target="_blank" class="font-weight-bold">Link del archivo</a> >></td></tr>';
                                }
                            }
                            $("#archivos_subidos").html(html);
                        }
                    }
                });
            }

        </script>

        <style>
            .bg-log {
                background-image: url('../../../assets/img/portada.png');
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
                background-color: #476f93;
            }
            img[alt]{
                color: white;
                font-weight: bold;
            }
            .tm-log{
                height: 180px;
                padding: 10px;
            }

            .centrar {
                display: flex;
                justify-content: center;
                align-items: center;
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body class="bg-log" style="overflow: auto;">

        <div class="container">

            <div class="form-control my-1 text-center">

                <span class="font-weight-bold" style="font-size:25px;">REPOSITORIO INSTITUCIONAL</span>

            </div>

            <div class="form-control">

                <div class="form-control form-control-sm table-responsive my-2 p-1 border border-success rounded">

                    <table class="table table-light table-sm table-hover table-bordered m-0" style="font-size:13px;">
                        <thead class="btn-info">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Nombre del Archivo</th>
                                <th class="text-center">Vista Previa</th>
                            </tr>
                        </thead>
                        <tbody id="archivos_subidos">

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </body>
</html>
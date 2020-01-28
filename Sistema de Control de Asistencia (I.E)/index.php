<!DOCTYPE html>
<html lang="es">
    <head>
        <title>IE R.O.U 1014</title>
        <?php 
        session_start();
        $ruta = './';
        require($ruta.'assets/include/links.php');
        ?>
        <style>
            .bg-log {
                background-image: url('./assets/img/portada.jpg');
            }
            img[alt]{
                color: white;
                font-weight: bold;
            }
            .tm-log{
                height: 180px;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <div class="alturaClass bg-log">
            <div class="wl-50p alturaClass">
                <div class="log-color log-line">

                </div>
                <div class="log-color log-line">

                </div>

            </div>
            <div class="wr-50p alturaClass centrar-custom log-color">
                <div class="text-center" style="width:280px;">
                    <img src="./assets/img/uruguay.png" class="img-fluid tm-log p-3" alt="">
                    <!--<div class="centrar-custom">
                    <div class="rounded-circle cirPri bg-white centrar-custom p-0">
                    <div class="rounded-circle cirSec shadow-lg bg-custom-mine-vm centrar-custom p-0">
                    <div class="rounded-circle cirTer centrar-custom">
                    <h6 class="font-weight-bold m-0 p-0 text-white">IE R.O.U 1014</h6>
                    </div>
                    </div>
                    </div>
                    </div>
                    <br>-->
                    <h6 class="font-weight-bold m-0 p-0 mb-4 text-white">BIENVENIDO (A)<br>SISTEMA DE INFORMACIÓN</h6>
                    <?php
                    if (!empty($_GET['v']) && !empty($_GET['t']))
                    {
                        if ($_GET['v']=='fallo') 
                        {
                            echo '<div class="alert alert-danger p-2 alert-dismissible fade show" role="alert">
                            Falta Ingresar <strong>Datos</strong>.
                          </div>';
                        }
                        elseif ($_GET['v']=='falloClave')
                        {
                            echo '<div class="alert alert-danger p-2 alert-dismissible fade show" role="alert">
                            Usuario o Contraseña <strong>Incorrecta</strong>.
                          </div>';
                        }
                    }
                    ?>
                    <form action="./inc.out/index.php" method="post" autocomplete="off">
                        <div class="px-4">
                            <input name="usuario" class="form-control form-control-sm my-2 " type="text" placeholder="Nombre de usuario">
                            <input name="clave" class="form-control form-control-sm my-2 " type="password" placeholder="Contraseña">
                        </div>

                        <input type="submit" class="btn btn-block bg-custom-mine-button text-white font-weight-bold mt-2" value="INGRESAR">
                        <h6 class="text-white mt-2">Comuniquese al correo
                            <strong>1014rou@uruguay1014.edu.pe</strong> si no ha podido acceder.</h6>
                    </form>
                </div>
            </div>

            <div class="fixed-bottom centrar-custom">
                <div class="alert alert-info alert-dismissible fade show mb-0 text-center">
                    <strong>Copyright © 2019. uruguay1014.edu.pe.
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

        </div>
    </body>
</html>
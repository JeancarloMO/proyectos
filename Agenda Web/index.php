<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Agenda Web</title>
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
               <!--<div class="centrar-custom alturaClass log-contLogo">-->
                <!--<div class="alturaClass log-contLogo">
                   <img src="./assets/img/univSdg.png" class="img-fluid tm-log" alt="">
                </div>-->
                <div class="log-color log-line">
                    
                </div>
                <div class="log-color log-line">

                </div>
                
            </div>
            <div class="wr-50p alturaClass centrar-custom log-color">
                <div class="text-center" style="width:280px;">
                    <div class="centrar-custom">
                        <div class="rounded-circle cirPri bg-white centrar-custom p-0">
                            <div class="rounded-circle cirSec shadow-lg bg-custom-mine-vm centrar-custom p-0">
                                <div class="rounded-circle cirTer centrar-custom">
                                    <h6 class="font-weight-bold m-0 p-0 text-white">Agenda Web</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 class="font-weight-bold m-0 p-0 mb-4 text-white">INICIAR SESIÓN</h6>
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
                            <input name="usuario" class="form-control form-control-sm my-2 " type="text" placeholder="Nombre de usuario" autofocus>
                            <input name="clave" class="form-control form-control-sm my-2 " type="password" placeholder="Contraseña">
                        </div>

                        <input type="submit" class="btn btn-block bg-custom-mine-button text-white font-weight-bold mt-2" value="INGRESAR">
                        <a href="" class="text-white font-weight-bold">¿No tiene una cuenta? Regístrese</a><br>
                        <a href="" class="text-white font-weight-bold">¿Haz olvidado tu contraseña?</a>
                    </form>
                </div>
            </div>

            <div class="fixed-bottom centrar-custom">
                <div class="alert alert-info alert-dismissible fade show mb-0 text-center">
                    <strong>Copyright © . Derechos reservados
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

        </div>
    </body>
</html>
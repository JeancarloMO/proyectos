<div class="login-body">

    <form class="login-form" method="post" autocomplete="off">
        <div class="rounded-circle p-1" style="border: 3px solid orange;">
            <img id="" src="public/images/usdg.png" height="150" class="p-3 rounded-circle" style="border: 3px solid orange;">
        </div>
        <!--<img id="" src="public/images/usdg.png" height="150" class="p-3 rounded-circle" style="border: 3px solid orange;">-->
        <div class="form-field">
            <i class="fa fa-user fa-lg"></i>
            <input type="text" name="usuario" id="username" class="form-field" pattern="^[a-zA-Z0-9_-]{1,16}$" placeholder=" ">
            <label for="username">Username</label>
        </div>
        <div class="form-field">
            <i class="fa fa-lock fa-lg"></i>
            <input type="password" name="password" id="password" class="form-field" placeholder=" ">
            <label for="password">Password</label>
        </div>
        <button type="submit" value="Login" class="btn">Sing In</button>

        <?php
        if (!empty($_GET['action'])) {
            if ($_GET['action'] == 'fallo') {
                echo '<div class="alert alert-danger p-3 alert-dismissible fade show" role="alert">
                            Falta Ingresar <strong>Datos</strong>.
                          </div>';
            } elseif ($_GET['action'] == 'falloClave') {
                echo '<span class="text-danger">Clave Incorrecta</span>';
            }
        }
        ?>

    </form>

    <?php

    $validar = new Validar();
    $validar->validarUsuarioController();

    ?>

</div>
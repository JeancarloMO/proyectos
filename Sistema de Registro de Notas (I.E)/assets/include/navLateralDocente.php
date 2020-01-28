<div class="contensMenuLat">
    <div class="uCentrarCustom p-1">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text font-weight-bold" id="basic-addon1">Periodo:</span>
            </div>
            <form action="<?php echo $ruta; ?>inc.out/pdo.php" method="post" class="form-control p-0">
                <select name="pdo" id="pdo" class="form-control form-control-sm" onchange="this.form.submit()">
                    <option value="<?php echo $_SESSION["fa_PERIODO"]; ?>"><?php echo $_SESSION["fa_PERIODO"]; ?></option>

                    <?php

                    $conectar = new Funciones();

                    $consulta = "SELECT DISTINCT periodo FROM docente_curso WHERE docente = '".$_SESSION["fa_DOCUMENTO"]."' and periodo <> '".$_SESSION["fa_PERIODO"]."' ";

                    $resultado = $conectar->Seleccionar($consulta);

                    while($fila = mysqli_fetch_array($resultado)){

                        echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';

                    }

                    ?>

                </select>
            </form>
        </div>
    </div>

    <div class="centrar-custom border-top border-warning pt-3 mb-2">
        <img src="<?php echo $ruta; ?>assets/img/alumno.png" alt="" style="height:161px;border-radius: 50%;" class="bg-white">
    </div>

    <div class="border-warning pt-1 mb-2 mr-1 text-center">
        <span class="text-white" style="font-size:14px;">Nombres:</span><br><h6 class="text-warning font-weight-bold"><?php echo $_SESSION['fa_NOMBRES']; ?></h6>
        <span class="text-white" style="font-size:14px;">Apellidos:</span><br><h6 class="text-warning font-weight-bold"><?php echo $_SESSION['fa_APELLIDOS']; ?></h6>
    </div>

    <div class="my-4 text-center">

        <div id="datetimepicker12"></div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker12').datetimepicker({
                    timepicker:false,
                    inline:true,
                    lang:'es'
                });
            });
        </script>

    </div>

</div>
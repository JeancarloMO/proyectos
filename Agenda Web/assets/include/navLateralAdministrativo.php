<style>
    .uTreen{
        background-image: url('<?php echo $ruta ?>assets/img/Imagen1.png');
        background-repeat: repeat;
    }
</style>
<div class="contensMenuLat">
    <div class="uCentrarCustom p-1">
        <input class="form-control form-control-sm border-0" style="background-color:;color:#333 !important;"
               placeholder="NAVEGACIÓN (deshabilitado)" id="" disabled>
        <input type="checkbox" id="uCheck" onclick="check();" autocomplete="off" class="d-none">
        <label for="uCheck" class="uCentrarCustom my-0" id="uLabel" onclick="clickLabel();">
            <i class="fa fa-angle-double-left border text-white rounded p-1 px-2 m-1" style="cursor:pointer"></i>
        </label>
    </div>

    <div class="centrar-custom border-top border-warning pt-3 mb-2">
        <img src="<?php echo $ruta; ?>assets/img/alumno.png" alt="" style="height:161px;border-radius: 50%;" class="bg-white">
    </div>

    <div class="border-warning pt-1 mb-2 mr-1 text-center">
        <span class="text-white" style="font-size:14px;">Nombres:</span><br><h6 class="text-warning font-weight-bold"><?php echo $_SESSION['agd_NOMBRES']; ?></h6>
        <span class="text-white" style="font-size:14px;">Apellidos:</span><br><h6 class="text-warning font-weight-bold"><?php echo $_SESSION['agd_APELLIDOS']; ?></h6>
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
<div class="border-bottom border-warning uGreen" id="uHeader">
    <div class="uCentrarCustom" style="height:100%;">
        <input type="checkbox" id="uCheck" onclick="check();" autocomplete="off" class="d-none">
        <label for="uCheck" class="uCentrarCustom mx-3 my-0" id="uLabel" onclick="clickLabel();">
            <i class="material-icons border text-white rounded p-1" style="cursor:pointer">menu</i>
        </label>
        <img src="<?php echo $ruta; ?>assets/img/univSdg.png" width="auto" height="100%" alt="" class="my-2 p-1">
        <div class="uCentrarCustom text-center">
            <div class="text-warning">
                UNIVERSIDAD
                <br>
                <h6 class="font-weight-bold text-white m-0">SANTO DOMINGO DE GUZMÁN</h6>
            </div>
        </div>
        <!--<div class="text-white centrar-custom" style="margin: 0px 25px 0px auto">
            <small class="mr-2">Periodo:</small>
            <select name="" id="pdo" class="form-control form-control-sm">
                <option value="201802">2018-II</option>
                <option value="201801">2018-I</option>
                <option value="201702">2017-II</option>
            </select>
        </div>-->
        <div class="centrar-custom" style="margin: 0px 20px 0px auto">
            <div>
                <span style="color: white"><strong class="text-warning">Cerrar Sesión</strong></span>
            </div>
            <div class="col-lg-2">
                <a href="<?php echo $ruta; ?>modulo/nologin/index.php" class="text-white"><i class="fa fa-power-off fa-lg"></i></a>
            </div>
        </div>
    </div>
</div>
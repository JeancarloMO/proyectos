<div class="border-bottom border-warning uGreen" id="uHeader">
    <div class="uCentrarCustom" style="height:100%;">
        <input type="checkbox" id="uCheck" onclick="check();" autocomplete="off" class="d-none">
        <label for="uCheck" class="uCentrarCustom mx-3 my-0" id="uLabel" onclick="clickLabel();">
            <i class="material-icons border text-white rounded p-1" style="cursor:pointer">menu</i>
        </label>
        <img id="" src="<?php echo $ruta; ?>assets/img/uruguay.png" width="auto" height="100%" alt="" class="my-2 p-2">
        <div id="inst-menu" class="uCentrarCustom text-center">
            <div class="text-warning">
                INSTITUCIÓN EDUCATIVA 1014
                <br>
                <h6 class="font-weight-bold text-white m-0">REPÚBLICA ORIENTAL DEL URUGUAY</h6>
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
        <div class="centrar-custom" style="margin: 0px 10px 0px auto">
            <div>
                <span style="color: white"><strong class="text-warning">Usuario: </strong><?php echo strtoupper($_SESSION['USUARIO']);?></span>
            </div>
            <div class="col-lg-2 text-right">
                <a href="#" class="text-white" data-toggle="modal" data-target="#miModalCerrarSesion"><i class="fa fa-power-off fa-lg"></i></a>
            </div>
        </div>

        <!-- Modal Multi-->
        <div class="modal fade" id="miModalCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header py-1 box-s bg-info">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Alerta</h5>
                        <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="col-lg-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4 pt-0 pb-0 pl-1 pr-0 centrar-custom">
                                        <i class="fa fa-exclamation text-warning" style="font-size:50px;" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-lg-6 p-0 centrar-custom">
                                        <h6 id="">¿Cerrar Sesión?</h6>
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-1 border-0 align-self-center">
                        <a href="<?php echo $ruta; ?>modulo/nologin/index.php" class="btn btn-primary p-1 m-1" style="width:65px;">Si</a>
                        <button class="btn btn-danger p-1 m-1" id="" data-dismiss="modal" aria-label="Close" style="width:65px;">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal Multi-->

    </div>
</div>
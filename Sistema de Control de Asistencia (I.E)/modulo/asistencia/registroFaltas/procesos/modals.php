<!-- Modal Multi-->
<div class="modal fade" id="miModalMulti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 box-s bg-info">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <div class="col-lg-8 p-0 centrar-custom">
                                <h6 id="modalConcepto">--</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-1 border-0 align-self-center">
                <button type="button" id="eventoTotal" class="btn btn-primary p-1 m-1" style="width:65px;">Si</button>
                <button class="btn btn-danger p-1 m-1" id="cerrarMulti" data-dismiss="modal" aria-label="Close" style="width:65px;">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Multi-->

<!-- Modal OKI-->
<div class="modal fade" id="miModalOKI" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 box-s bg-info">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 pt-0 pb-0 pl-1 pr-0 centrar-custom">
                                <i class="fa fa-check text-success" style="font-size:50px;" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-8 p-0 centrar-custom">
                                <h6 id="OKIconcepto">--</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-1 border-0 align-self-center">
                <button class="btn btn-success p-1 m-1" id="cerrarOKI" data-dismiss="modal" aria-label="Close" style="width:65px;">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal OKI-->
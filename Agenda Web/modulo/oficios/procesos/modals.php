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

<!-- Modal Buscar Documentos -->
<div class="modal fade" id="miModalBuscarDocumentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document" style="min-width:800px;max-width:800px;">
        <div class="modal-content">
            <div class="modal-body" style="overflow:hidden;">

                <div class="form-control form-control-sm my-1">
                    <span class="font-weight-bold">LISTA DE DOCUMENTOS</span>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-group input-group-sm my-1">
                                <input type="file" id="archivo" name="archivo" class="form-control form-control-sm" multiple="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" id="boton_subir" class="btn btn-info btn-sm form-control my-1 font-weight-bold"><i class="fa fa-upload tam-icon px-2"></i>Subir Archivo</button>
                        </div>
                    </div>
                </div>

                <div class="input-group input-group-sm my-1">
                </div>

                <div class="form-control form-control-sm table-responsive my-1 p-1 border border-info rounded" style="min-height:200px;;max-height:200px;">

                    <table class="table table-light table-sm table-hover table-bordered table-striped m-0" style="font-size:13px;">
                        <thead class="btn-warning">
                            <tr>
                                <th class="text-center">N°</th>
                                <th class="text-center">Documentos</th>
                                <th class="text-center">Vista Previa</th>
                                <th class="text-center">Eliminar Archivo</th>
                            </tr>
                        </thead>
                        <tbody id="archivos_subidos" class="text-dark">

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="modal-footer p-2">
                <button class="btn btn-danger btn-sm font-weight-bold" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal Buscar Documentos -->
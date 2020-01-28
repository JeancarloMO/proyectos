<div class="modal fade" id="miModalObs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 box-s bg-info">
                <span class="modal-title text-white font-weight-bold" id="exampleModalCenterTitle">OBSERVACIÓN</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="col-lg-12">
                    <div class="text-center">
                        
                        <input id="obs_codigo" type="text" class="d-none">

                        <span id="obs_alumno" style="font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;font-size: 15px;line-height: 15.4px;"></span>

                        <textarea name="" id="obs" cols="" rows="" class="w-100 p-2 border border-info rounded" style="max-height:185px;min-height:185px;font-family: Comic Sans MS, cursive, sans-serif;"></textarea>

                    </div>
                </div>
            </div>
            <div class="modal-footer p-1 border-0 align-self-center">
                <button class="btn btn-info p-1 m-1 font-weight-bold" style="width:100px;" onclick="actualizarObs();">Guardar</button>
                <button class="btn btn-danger p-1 m-1 font-weight-bold" data-dismiss="modal" aria-label="Close" style="width:100px;">Cancelar</button>
            </div>
        </div>
    </div>
</div>
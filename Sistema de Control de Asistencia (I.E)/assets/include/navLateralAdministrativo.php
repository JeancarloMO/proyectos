<style>
    .uTreen{
        background-image: url('<?php echo $ruta ?>assets/img/Imagen1.png');
        background-repeat: repeat;
    }
</style>
<div class="contensMenuLat">
    <div class="uCentrarCustom p-1">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text font-weight-bold" id="basic-addon1">Periodo</span>
            </div>
            <form action="<?php echo $ruta; ?>inc.out/pdo.php" method="post" class="form-control p-0">
                <select name="" id="pdo" class="form-control form-control-sm" onchange="this.form.submit()">
                </select>
            </form>
        </div>
        <!--<input class="form-control form-control-sm border-0" style="background-color:;color:#333 !important;"
        placeholder="NAVEGACIÓN (deshabilitado)" id="" disabled>-->
        <input type="checkbox" id="uCheck" onclick="check();" autocomplete="off" class="d-none">
        <label for="uCheck" class="uCentrarCustom my-0 " id="uLabel" onclick="clickLabel();">
            <i class="fa fa-angle-double-left border text-white rounded p-1 px-2 m-1" style="cursor:pointer"></i>
        </label>
    </div>
    <ul class="border-top border-warning pt-2 mb-4">
        <li class="fiList">
            <a class="btnList" onclick="desplega('uListRegistro');">
                <div class="d-flex">
                    <i class="text-warning material-icons iconMenu mr-1">person_add</i>
                    <h5 class="text-warning m-0 textMenu">REGISTRO</h5>
                </div>
            </a>
            <ul class="ulistMenu noneCustom" id="uListRegistro">
                <a href="<?php echo $ruta; ?>modulo/registro/registroMatricula" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Registro Matrícula</h6>
                    </li>
                </a>
                <a href="<?php echo $ruta; ?>modulo/registro/registroAlumno" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Registro Alumno</h6>
                    </li>
                </a>
                <a href="<?php echo $ruta; ?>modulo/registro/registroDocente" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Registro Docente</h6>
                    </li>
                </a>
            </ul>
        </li>
        <li class="fiList">
            <a class="btnList" onclick="desplega('uListAdmision');">
                <div class="d-flex">
                    <i class="text-warning material-icons iconMenu mr-1">location_city</i>
                    <h5 class="text-warning m-0 textMenu">ASISTENCIA</h5>
                </div>
            </a>
            <ul class="ulistMenu noneCustom" id="uListAdmision">
                <a href="<?php echo $ruta; ?>modulo/asistencia/listaAsistencia" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Lista Asistencia</h6>
                    </li>
                </a>
                <a href="<?php echo $ruta; ?>modulo/asistencia/importarExcel" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Importar Excel</h6>
                    </li>
                </a>
                <a href="<?php echo $ruta; ?>modulo/asistencia/registroFaltas" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Registro Faltas</h6>
                    </li>
                </a>
            </ul>
        </li>
        <li class="fiList">
            <a class="btnList" onclick="desplega('uListPersonal');">
                <div class="d-flex">
                    <i class="text-warning material-icons iconMenu mr-1">style</i>
                    <h5 class="text-warning m-0 textMenu">REPOSITORIO</h5>
                </div>
            </a>
            <ul class="ulistMenu noneCustom" id="uListPersonal">
                <a href="<?php echo $ruta; ?>modulo/repositorio" style="text-decoration:none">
                    <li class="listMenu">
                        <h6 class="text-white m-0 textMenu">Archivos Repositorio</h6>
                    </li>
                </a>
            </ul>

        </li>
    </ul>
</div>
<?php

require ('../../../PHPExcel/Classes/PHPExcel/IOFactory.php'); //Agregamos la librería

//Check valid spreadsheet has been uploaded
if(isset($_FILES['archivo'])){
    if($_FILES['archivo']['tmp_name']){
        if(!$_FILES['archivo']['error'])
        {

            $nombreArchivo = $_FILES['archivo']['tmp_name'];

            // Cargo la hoja de cálculo
            $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

            //Asigno la hoja de calculo activa
            $objPHPExcel->setActiveSheetIndex(0);
            //Obtengo el numero de filas del archivo
            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            $cont = 0;

            for ($i = 2; $i <= $numRows; $i++) {

                $cont++;

                $cod_persona = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                $tiempo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                $estado = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();

                $fch = explode("/",$tiempo);
                $dia = $fch[0];
                $mes = $fch[1];
                $xx = $fch[2];

                $date = date_create($dia.'-'.$mes.'-'.$xx);
                $fecha = date_format($date, 'Y-m-d H:i:s');
                
                echo '
                <tr>
                    <td class="text-center">'.$cont.'</td>
                    <td class="text-center"><input id="ALU'.$cont.'" value="'.$cod_persona.'" class="d-none">'.$cod_persona.'</td>
                    <td class="text-center"><input id="HOR'.$cont.'" value="'.$fecha.'" class="d-none">'.$fecha.'</td>
                    <td class="text-center">'.$estado.'</td>
                </tr>
                ';

            }
        }
        else{
            echo $_FILES['archivo']['error'];
        }
    }
}

?>
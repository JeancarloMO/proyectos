<?php
session_start();
/** Incluir la libreria PHPExcel */
error_reporting(0);

require_once('../../../PHPExcel/Classes/PHPExcel.php');

//Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

//Establecer propiedades
$objPHPExcel->getProperties()
    ->setCreator("BUMH")
    ->setLastModifiedBy("BUMH")
    ->setTitle("Documento Excel")
    ->setSubject("Documento Excel de Reporte")
    ->setDescription("Reporte desde PHP.")
    ->setKeywords("Excel Office 2007 openxml php")
    ->setCategory("Reportes de Excel");

//Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'N°')
    ->setCellValue('B1', 'Codigo')
    ->setCellValue('C1', 'Alumno')
    ->setCellValue('D1', 'Salon')
    ->setCellValue('E1', 'Turno')
    ->setCellValue('F1', 'Fecha')
    ->setCellValue('G1', 'Entrada')
    ->setCellValue('H1', 'Estado');

require_once('../../../../assets/php/funciones.php');
$conectar = new Funciones();
$consulta = "SELECT DISTINCT A.cod_persona, ALU.paterno, ALU.materno, ALU.nombres, S.grado, S.seccion, T.abrev, A.entrada FROM asistencia AS A INNER JOIN matricula AS M ON A.cod_persona = M.cod_alumno INNER JOIN alumno as ALU ON M.cod_alumno = ALU.cod_alumno INNER JOIN salon AS S ON M.cod_salon = S.cod_salon INNER JOIN turno AS T ON M.cod_turno = T.cod_turno WHERe M.cod_turno = '".$_POST["turno"]."' AND M.cod_salon = '".$_POST["salon"]."' AND ( A.entrada between '".$_POST["inicio"]." 00:00:00' AND '".$_POST["fin"]." 23:59:59' ) ORDER BY CAST(A.entrada AS DATE), ALU.paterno, ALU.materno, ALU.nombres";

$resultado = $conectar->Seleccionar($consulta);
$myFilas = 1;

if(mysqli_num_rows($resultado)>0){
    
    $cont = 1;
    $i = 2;
    
    while($fila=$resultado->fetch_array()){

        $date = date_create($fila[7]);
        $datetime = date_format($date, 'd/m/Y H:i:s A');
        $fecha = date_format($date, 'd/m/Y');
        $hora = date_format($date, 'h:i:s a');
        $h = date_format($date, 'H');

        if((int)$h == 0){
            $estado = 'Faltó';
            $hora = "(vacío)";
        }else{
            if($fila[6] == 'M'){
                if((int)$h > 0 and (int)$h < 8){
                    $estado = 'Asistió';
                }else{
                    $estado = 'Tardanza';
                }
            }elseif($fila[6] == 'T'){
                if((int)$h > 0 and (int)$h < 13){
                    $estado = 'Asistió';
                }else{
                    $estado = 'Tardanza';
                }
            }
        }

        $objPHPExcel->getActiveSheet()
            ->SetCellValue('A'.$i, $cont)
            ->SetCellValue('B'.$i, $fila[0])
            ->SetCellValue('C'.$i, $fila[1].' '.$fila[2].', '.$fila[3])
            ->SetCellValue('D'.$i, $fila[4].$fila[5])
            ->SetCellValue('E'.$i, $fila[6])
            ->SetCellValue('F'.$i, $fecha)
            ->SetCellValue('G'.$i, $hora)
            ->SetCellValue('H'.$i, $estado);
        $i += 1;
        $cont += 1;
        $myFilas += 1;
    }
}

$resultado->free();

//Estilo pre definido
$styleArrayBorder = array(
    'borders' => array(
    'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THIN
)
)
);

$styleArrayBgm = array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array(
    'rgb' => 'F6EB06'
));

//Set Bordes
$objPHPExcel->getActiveSheet()->getStyle('A1:A'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('B1:B'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('D1:D'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('E1:E'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('F1:F'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('G1:G'.$myFilas)->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('H1:H'.$myFilas)->applyFromArray($styleArrayBorder);

//Set Color de fondo
$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->applyFromArray($styleArrayBgm);

//Eliminando Variables
unset($styleArrayBorder);
unset($styleArrayBgm);

//Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Reporte de Asistencia');

//Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

//Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Asistencia '.$_POST["inicio"].' al '.$_POST["fin"].'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

ob_end_clean();
$objWriter->save('php://output');
exit;
?>
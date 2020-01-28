<?php 
require_once "../../../assets/html2pdf/html2pdf.class.php";
header("Content-Type: text/html;charset=utf-8");
try {

    ob_start();

    if(isset($_POST["report_enviar"])){
        
        if($_POST["report_enviar"] == "entrega"){
            include ('design/entrega.php');
        }else if($_POST["report_enviar"] == "filtros"){
            include ('design/filtroEntrega.php');
        }

    }

    $content = ob_get_clean();
    $pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8');
    $pdf->writeHTML($content);
    $pdf->Output('Reporte de Entregas.pdf');

} catch (Html2PdfException $e) {

    $pdf->clean();

    $formatter = new ExceptionFormatter($e);
    
    echo $formatter->getHtmlMessage();
}
?>
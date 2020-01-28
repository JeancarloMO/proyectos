<style>
table {
  border-collapse: collapse;
}

/*table, th, td {
  border: 1px solid black;
}*/

th{
    padding: 6px 3px;
    font-weight: bold;
}

td {
    padding: 6px 3px;
    box-sizing: border-box;
    font-size: 11px;
    margin: 0px;
    font-weight: bold;
    color: #2E2D2D; 
}

span{
    color: #2E2D2D; 
    margin: 0px 10px;
}

</style>

<?php

require_once "../../../../database/conexion.php";

$conectar = new conexion('A');
$consulta = "EXEC reporte_Entrega '".$_POST["enviarDatos"]."' ";
$con = $conectar->abrirConexion();
$stmt = sqlsrv_query($con, $consulta, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

$count = sqlsrv_num_rows( $stmt ); 

$cont = 0;
$n = 0;
$codigo = "";

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
    $n++;

    $fecha = date_format($fila[5], 'd/m/Y');

    if($codigo <> $fila[0]){
        $cont = 0;
        
        echo '
        <page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
        <div>

            <table style="text-align:center;">
                <tr>
                    <td style="text-align:center;><img src="../../../../public/images/usdg.png" alt="" style="height:65px;"></td>
                    <td style="text-align:center;padding:12px;width:530px;"><h2 >FICHA DE ENTREGA</h2></td>
                </tr>
            </table>

            <br><br>

            <table>
                <tr>
                    <td style="padding: 4px;color:dark;">Código de Entrega</td>
                    <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                    <td style="padding: 4px;"><span>'.$fila[0].'</span></td>
                </tr>
                <tr>
                    <td style="padding: 4px;color:dark;">Area</td>
                    <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                    <td style="padding: 4px;"><span>'.$fila[1].'</span></td>
                </tr>
                <tr>
                    <td style="padding: 4px;color:dark;">Jefe de Area</td>
                    <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                    <td style="padding: 4px;"><span>'.$fila[2].'</span></td>
                </tr>
                <tr>
                    <td style="padding: 4px;color:dark;">Fecha de Entrega</td>
                    <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                    <td style="padding: 4px;"><span>'.$fecha.'</span></td>
                </tr>
            </table>

            <br>

            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid black;width:40px;text-align:center;">N°</th>
                        <th style="border: 1px solid black;width:510px;text-align:center;">PRODUCTO</th>    
                        <th style="border: 1px solid black;width:120px;text-align:center;">CANTIDAD</th>        
                    </tr>
                </thead>
        ';
    }

    $cont++;

    echo '<tr style="font-size:12px;">
        <td style="border: 1px solid black;text-align:center;font-weight:normal;">'.$cont.'</td>
        <td style="border: 1px solid black;padding:5px 15px;font-weight:normal;">'.$fila[6].'</td>
        <td style="border: 1px solid black;text-align:center;font-weight:normal;">'.$fila[7].'</td>
    </tr>';

    if($n == $count){

        echo '
            </table>

            <br><br><br><br><br><br><br><br><br><br>

            <table align="right">
                <tr>
                    <td style="width:250px;text-align:center;padding: 2px;">___________________________</td>
                </tr>
                <tr>
                    <td style="width:250px;text-align:center;padding: 2px;">Firma del Receptor</td>
                </tr>
                <tr>
                    <td style="width:250px;text-align:center;padding: 2px;">'.$fila[3].'</td>
                </tr>
                <tr>
                    <td style="width:250px;text-align:center;padding: 2px;">'.$fila[4].'</td>
                </tr>
            </table>

            </div>
        </page>';
        
    }

    $codigo = $fila[0];

}

?>
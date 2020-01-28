<style>
table {
  border-collapse: collapse;
}

/*table, th, td {
  border: 1px solid black;
}*/

td, th {
    padding: 6px 3px;
    box-sizing: border-box;
    font-size: 11px;
    margin: 0px;
    font-weight: bold;
}

span{
    margin:0px 10px;
    color: #2E2D2D; 
}

label{
    /*margin:0px 10px;*/
    color: #B91212;
}

</style>

<?php

require_once "../../../../database/conexion.php";

if(isset($_POST["enviarArea"])){

    $area = $_POST["enviarArea"];
    $fecha = $_POST["enviarFecha"];

}else{

    $area = "";
    $fecha = "";

}

$condicion1 = "";
$condicion2 = "";

if ($area <> ""){
    $condicion1 = "AND E.cod_area LIKE '%".$area."%'";
}
if ($fecha <> ""){
    $condicion2 = "AND E.fecha_entrega = '".$fecha."'";
}

$conectar = new conexion('A');
$consulta = "SELECT E.cod_entrega AS 'CODIGO', 
A.area AS 'AREA', 
PE2.apellidos +', '+ PE2.nombres AS 'JEFE', 
PE.apellidos +', '+ PE.nombres AS 'RECEPTOR', 
C.cargo AS 'CARGO',
E.fecha_entrega AS 'FECHA DE ENTREGA',
PD.producto +' '+ PD.presentacion +' '+ PD.marca +' '+ PD.modelo +' '+ PD.color +' '+ PD.descripcion AS 'PRODUCTOS',
E.cantidad AS 'CANTIDAD'
FROM ENTREGAS AS E
INNER JOIN AREA AS A ON E.cod_area = A.cod_area
INNER JOIN PERSONAL AS P ON E.receptor = P.cod_personal
INNER JOIN PERSONAS AS PE ON P.cod_persona = PE.cod_persona
INNER JOIN CARGO AS C ON P.cod_cargo = C.cod_cargo
INNER JOIN PERSONAL AS P2 ON P2.cod_area = A.cod_area AND P2.cod_cargo = 1
INNER JOIN PERSONAS AS PE2 ON P2.cod_persona = PE2.cod_persona
INNER JOIN PRODUCTOS AS PD ON E.cod_producto = PD.cod_producto
WHERE E.estado = 1 ".$condicion1." ".$condicion2." ORDER BY E.fecha_entrega DESC, A.area ASC";
$con = $conectar->abrirConexion();
$stmt = sqlsrv_query($con, $consulta, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

$count = sqlsrv_num_rows( $stmt ); 

$cont = 0;
$n = 0;
$codigo = "";
$ar = "";
$cod = "";

while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){

    $codigo = $fila[0];

    $n++;

    $fecha = date_format($fila[5], 'd/m/Y');

    if($codigo <> $cod){

        if($cont > 0){
            $cont=0;

            if($ar <> $fila[1]){

            echo '
                        </tbody>
                    </table>
                </div>
            </page>
            ';

            }else{

                echo '
                        </tbody>
                    </table>
                ';

            }
            
        }

        if($cont == 0){
            $cont++;
            $cod = $fila[0];

            if($ar <> $fila[1]){
                $ar = $fila[1];

                echo '
                <page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
                    <div> 

                        <table style="text-align:center;">
                            <tr>
                                <td style="text-align:center;><img src="../../../../public/images/usdg.png" alt="" style="height:65px;"></td>
                                <td style="text-align:center;padding:12px;width:530px;"><h2 >REPORTE DE ENTREGA</h2></td>
                            </tr>
                        </table>

                        <br><br>

                        <table>
                            <tr>
                                <td style="padding: 4px;color:dark;">AREA</td>
                                <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                                <td style="padding: 4px;"><span>'.$fila[1].'</span></td>
                            </tr>
                            <tr>
                                <td style="padding: 4px;color:dark;">JEFE(A) DE AREA</td>
                                <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                                <td style="padding: 4px;"><span>'.$fila[2].'</span></td>
                            </tr>
                        </table>
            
                        <br>
                ';
        
            }
    
            echo '     
                    <table>
                        <tr>
                            <td style="padding: 4px;color:dark;"><label>Fecha de Entrega</label></td>
                            <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                            <td style="padding: 4px;"><span>'.$fecha.'</span></td>
                        </tr>
                        <tr>
                            <td style="padding: 4px;color:dark;"><label>Personal Receptor</label></td>
                            <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                            <td style="padding: 4px;"><span>'.$fila[3].'</span></td>
                        </tr>
                        <tr>
                            <td style="padding: 4px;color:dark;"><label>Cargo</label></td>
                            <td style="widht:60px;padding: 4px;color:dark;"><span style:"text-align:right;">:</span></td>
                            <td style="padding: 4px;"><span>'.$fila[4].'</span></td>
                        </tr>
                    </table>
        
                    <table style="padding: 0px 0px 20px;">
                        <thead>
                            <tr>
                                <td style="border: 1px solid black;width:40px;text-align:center;">N°</td>
                                <td style="border: 1px solid black;width:510px;text-align:center;">PRODUCTO</td>    
                                <td style="border: 1px solid black;width:120px;text-align:center;">CANTIDAD</td>        
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="border: 1px solid black;text-align:center;font-weight:normal;">'.$cont.'</td>
                            <td style="border: 1px solid black;padding:5px 15px;font-weight:normal;">'.$fila[6].'</td>
                            <td style="border: 1px solid black;text-align:center;font-weight:normal;;">'.$fila[7].'</td>
                        </tr>
            ';
    
        }

    }else{

        $cont++;

        if($cont > 0){

            echo '
            <tr>
                <td style="border: 1px solid black;text-align:center;font-weight:normal;">'.$cont.'</td>
                <td style="border: 1px solid black;padding:5px 15px;font-weight:normal;">'.$fila[6].'</td>
                <td style="border: 1px solid black;text-align:center;font-weight:normal;">'.$fila[7].'</td>
            </tr>
            ';

        }

    }

    if($n == $count){

        echo '
                    </tbody>
                </table>
            </div>
        </page>
        ';
        
    }

}

?>
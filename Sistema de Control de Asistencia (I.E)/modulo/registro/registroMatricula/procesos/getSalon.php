<?php

$mensaje = "";
$conectar = new Funciones();
$consulta = "SELECT * FROM salon";
$resultado = $conectar->Seleccionar($consulta);

if(mysqli_num_rows($resultado)>0){
    while($fila=$resultado->fetch_array()){
        $mensaje.='<option value="'.$fila[0].'">'.$fila[1].$fila[2].'</option>';
    }
}
$resultado->free();
echo $mensaje;

?>
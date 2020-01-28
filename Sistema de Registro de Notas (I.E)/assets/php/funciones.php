<?php

include('conexion.php');

class Funciones extends conexion{

    #Listo el seleccionar generico:
    public function __construct() {

    }

    #Para Procedimientos Almacenados (Registrar o Actualizar)
    public function Ejecutar($Consulta){
        $resultado = $this->Consulta($Consulta);
    }

    public function Seleccionar($Consulta){
        $resultado = $this->Consulta($Consulta);
        return $resultado;
    }

    #Listo el insertar generico:
    public function Insertar($tabla, $campos, $valores){
        $insertar = "INSERT INTO $tabla ($campos) VALUES($valores)";
        $this->Consulta($insertar);
        #echo 'Agregado perfectamente';
    }

    #Listo el modificar generico:
    public function Actualizar($tabla, $campos, $condicion){
        $actualizar= "UPDATE $tabla SET $campos WHERE $condicion";
        $this->Consulta($actualizar);
        #echo 'Modificado perfectamente';
    }

    #Listo el eliminar generico:
    public function Eliminar($tabla, $condicion){
        $eliminar = "DELETE FROM $tabla WHERE $condicion";
        $this->Consulta($eliminar);
        #echo 'Eliminado perfectamente';
    }

}
?>
<?php 
class conexion
{
    #Variables para efectuar la conexion con la BD.
	private static $servidor="localhost";
	private static $usuario="root";
	private static $contrasenia="";
    /*private static $usuario="feb01urd_prb";
	private static $contrasenia="Eliud123456*";*/
	private static $basedatos="bd_test";

	protected function Consulta($crud)
    {
		try 
        {
			#Realizamos la conexion
			$mysqlicon = new mysqli(self::$servidor,self::$usuario,self::$contrasenia,self::$basedatos);


			#Cambiamos el idioma a Español para visualizar las ñ, acentos y otros.
			mysqli_set_charset($mysqlicon, 'utf8');

			#Ejecutamos Consulta
			$resultado=$mysqlicon->query($crud);

			#Cerramos conexion
			$mysqlicon->close();

			#Devolvemos el resultado
			return $resultado;

		}
        catch (Exception $e) 
        {
			echo "Fallo al conectar a MySQL: " . mysqli_connect_error()."<br>";
			echo "Tipo de fallo: ".$e."<br>"; 
		}
	}
}
?>
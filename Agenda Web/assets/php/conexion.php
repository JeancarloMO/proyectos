<?php 
class conexion
{
	private static $servidor="10.2.20.36";
	private static $uid="sa";
	private static $pwd="1234";
	private static $databaseName="actividades";

	private $keyX = NULL;

	public function __construct($clave) {
    	$this->keyX = $clave;
    }
	
	public function abrirConexion()
    {
		try 
        {
        	if (!empty($this->keyX)){
	        	$connectionInfo = array( "UID"=>self::$uid,
				                         "PWD"=>self::$pwd,
				                         "Database"=> self::$databaseName,
				                     	 "Characterset" => "UTF-8");
	        	
				$con = sqlsrv_connect(self::$servidor, $connectionInfo); 

				if($con){
					return $con;
				}else{
					return "nop";
				}
			}else{
				return "nop";
			}
		}
        catch (Exception $e) 
        {
			echo "<center>Fallo al conectar a SqlServer: ".sqlsrv_errors()."</center><br>";
			echo "<center>Tipo de fallo: ".$e."</center><br>";
		}
	}

	public function cerrarConexion($stmtx, $conx){
		sqlsrv_free_stmt($stmtx);  
		sqlsrv_close($conx); 
	}
}
?>
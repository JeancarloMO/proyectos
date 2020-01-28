<?php

require_once "database/conexion.php";

require_once "app/controllers/enlaces.php";
require_once "app/controllers/validar.php";

require_once "app/models/enlaces.php";
require_once "app/models/login.php";

require_once "app/controllers/registro.php";
require_once "app/models/registro.php";

require_once "app/controllers/listas.php";
require_once "app/models/listas.php"; 


$inicio = new EnlacesControllers();
$inicio -> Template();
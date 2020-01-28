<?php

session_start();

$usuario = NULL;
$clave = NULL;
$a=md5(uniqid(mt_rand(), true));
$b=(microtime(TRUE));
$r=$a."-".$b;

$_SESSION['PERIODO'] = $_POST['pdo'];

header('Location: ../modulo/?t='.$r);

?>
<?php

session_start();

$_SESSION["fa_PERIODO"] = $_POST["pdo"];

header("location:../modulo/");

?>
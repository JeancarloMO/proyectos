<?php
if (isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
    if (file_exists("../archivos/$archivo")) {
        unlink("../archivos/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
?>

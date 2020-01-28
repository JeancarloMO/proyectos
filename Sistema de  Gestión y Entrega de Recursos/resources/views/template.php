<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logística</title>

    <?php
    session_start();
    
    $header = new EnlacesControllers();
    $header->my_header();
    ?>

</head>

<body>

    <?php
    $menu = new EnlacesControllers();
    $menu->EnlacesController();
    ?>

    <?php
    $footer = new EnlacesControllers();
    $footer->my_footer();
    ?>

</body>

</html>
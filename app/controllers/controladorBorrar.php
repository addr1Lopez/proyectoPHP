<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include("../models/clasetarea.php");
    include("../models/bd.php");

    $id = $_GET['id'];

    Tarea::borrar($id);

    header('location:procesarlistaTareas.php');
    ?>

</body>

</html>
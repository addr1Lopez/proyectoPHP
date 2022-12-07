<?php

    include('../controllers/varios.php');

    $id = $_GET['id'];

    echo $blade->render('confirmacion_borrar', [
        'id' => $id,
    ]);

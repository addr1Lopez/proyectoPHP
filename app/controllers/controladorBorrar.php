<?php
    include('../controllers/varios.php');
    
    session_start();
    
    $id = $_GET['id'];

    echo $blade->render('confirmacion_borrar', [
        'id' => $id,
    ]);

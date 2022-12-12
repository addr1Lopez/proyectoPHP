<?php

/**
 * controladorBorrar
 * @param  string $id es el id de la tarea
 */

    include('../controllers/varios.php');
    
    session_start();
    
    $id = $_GET['id'];

    echo $blade->render('confirmacion_borrar', [
        'id' => $id,
    ]);

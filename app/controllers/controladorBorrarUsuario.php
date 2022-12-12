<?php

/**
 * controladorBorrarUsuario
 * @param  string $nif es el nif del usuario
 */
    include('../controllers/varios.php');
    
    session_start();
    
    $nif = $_GET['nif'];

    echo $blade->render('confirmarBorrarUsuario', [
        'nif' => $nif,
    ]);

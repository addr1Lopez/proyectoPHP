<?php
    include('../controllers/varios.php');
    
    session_start();
    
    $nif = $_GET['nif'];

    echo $blade->render('confirmarBorrarUsuario', [
        'nif' => $nif,
    ]);

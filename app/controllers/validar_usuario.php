<?php
include("utilsforms.php");
include("../models/bd.php");
include("../models/claseusuarios.php");
include('../controllers/varios.php');

if (isset($_SESSION)) {
    session_destroy();
}

$bd = BD::getInstance();

if (!$_POST) { 
    echo $blade->render('login');
} else {

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $usuario = $bd->getUsuario($correo, $contraseña);

    if (isset($usuario['nif'])) {

        session_start();

        $fechaHora = date('H:i:s');
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['fecha'] = $fechaHora;
        $_SESSION['nif'] = $usuario['nif'];

        if ($usuario['esAdmin'] == 1) {
            $_SESSION['rol'] = "Administrador";
        } else {
            $_SESSION['rol'] = "Operario";
        }
        
       echo $blade->render('nada');   

    } else {
        echo $blade->render('login');
    }
}
<?php
include("utilsforms.php");
include("../models/bd.php");
include("../models/claseusuarios.php");
include('../controllers/varios.php');

$bd = BD::getInstance();

if (!$_POST) { 
    echo $blade->render('login');
} else {

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $usuario = $bd->getNifUsuario($correo, $contraseña);

    if (isset($usuario['nif'])) {
        //echo "Bienvenido "  . $usuario['nif'];
        echo $blade->render('nada');    
    } else {
        echo $blade->render('login');
    }
}
<?php
include("utilsforms.php");
include("../models/bd.php");
include("../models/claseusuarios.php");
$bd = BD::getInstance();

if (!$_POST) { 
    include("../views/login.php");
} else {

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $usuario = $bd->getNifUsuario($correo, $contraseña);

    if (isset($usuario['nif'])) {
        echo "Bienvenido "  . $usuario['nif'];
    } else {
        include("../views/login.php");
    }
}
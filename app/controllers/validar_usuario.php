<?php

/**
 * validar_usuario
 * @param  string $correo es un string que contiene el correo
 * @param  string $contraseña es un string que contiene la contraseña
 * @param  string $usuario es un string con el usuario
 * @param  array $errores es un array en el que se almacenan los errores
 * @param  array $recogida_campos es un array donde recogemos todos los campos recibidos por el método POSTS
 * @param  void $datosTarea te devuelve la consulta de los datos de la tarea
 */

include("utilsforms.php");
include("../models/bd.php");
include("../models/claseusuarios.php");
include('../controllers/varios.php');

include('../libraries/validaremail.php');
include('../libraries/validarCadenaNum.php');


if (isset($_SESSION)) {
    session_destroy();
}

$bd = BD::getInstance();

$hayError = FALSE;
$errores = [];

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
        
    } else {

        /* Validar correo electrónico */
        $correo = $_POST['correo'];
        if (empty($correo) || !validarEmail($correo)) {
            $errores['correo'] = 'El campo email está vacío o no es válido';
            $hayError = TRUE;
        }

        /* Validar contraseña */
        $contraseña = $_POST['contraseña'];
        if (empty($contraseña) || !validarCadenaNum($contraseña)) {
            $errores['contraseña'] = 'El campo contraseña no puede estar vacío ni contener caracteres especiales';
            $hayError = TRUE;
        }
    }
    
    if ($hayError) {
        
        echo $blade->render('login');

    } else {

        echo $blade->render('inicio');

    }

}

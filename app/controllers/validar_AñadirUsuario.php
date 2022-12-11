<?php
include('../controllers/utilsforms.php');
include('../controllers/varios.php');

include('../models/bd.php');
include('../models/claseprovincia.php');
include('../models/claseusuarios.php');
include('../models/clasetarea.php');

include('../libraries/validarcodpostal.php');
include('../libraries/validardni.php');
include('../libraries/validarcif.php');
include('../libraries/validaremail.php');
include('../libraries/validarfecha.php');
include('../libraries/validartelefono.php');
include('../libraries/getValues.php');
include('../libraries/creaselect.php');

$hayError = FALSE;
$errores = [];

session_start();

$conexion = BD::getInstance();

if (!$_POST) { // Si no han enviado el formulario
    echo $blade->render('formulario_AñadirUsuario');
} else {
    /* Validar DNI español*/
    $nif = $_POST['nif'];
    if (!validarDni($nif)) {
        $errores['nif'] = 'El campo NIF no es válido';
        $hayError = TRUE;
    }

    /* Validar nombre */
    if (isset($_POST['nombre']) && empty($_POST['nombre'])) {
        $errores['nombre'] = 'El campo nombre no puede estar vacío';
        $hayError = TRUE;
    }

    /* Validar telefono español*/
    $telefono = $_POST['telefono'];
    if (empty($telefono) || !validarTelefono($telefono)) {
        $errores['telefono'] = 'El campo teléfono está vacío o no es válido';
        $hayError = TRUE;
    }

    /* Validar correo electrónico */
    $correo = $_POST['correo'];
    if (empty($correo) || !validarEmail($correo)) {
        $errores['correo'] = 'El campo correo electrónico está vacío o no es válido';
        $hayError = TRUE;
    }

    /*PONER VALIDAR CONTRASEÑA*/
    $contraseña = $_POST['contraseña'];
    if (empty($contraseña)) {
        $errores['contraseña'] = 'El campo contraseña no puede estar vacío';
        $hayError = TRUE;
    }

    /* Validar si es administrador */
    $esAdmin = $_POST['esAdmin'];
    if (empty($esAdmin)) {
        $errores['esAdmin'] = 'El campo administrador no puede estar vacío';
        $hayError = TRUE;
    }


    if ($hayError) {
        echo $blade->render('formulario_AñadirUsuario');
    } else {
        $recogida_campos = $_POST;
        Usuario::insertar(getValues($recogida_campos, true), getValues($recogida_campos, false));
        header('location:procesarListaUsuarios.php');
    }
}

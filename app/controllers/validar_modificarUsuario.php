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
include('../libraries/subirArchivos.php');

session_start();

$hayError = FALSE;
$errores = [];

$conexion = BD::getInstance();

if (!$_POST) { // Si no han enviado el formulario

    $nif = $_GET['nif'];

    $datosUsuario = Usuario::getDatosUsuario($nif);

    echo $blade->render('formulario_modificarUsuario', ['datosUsuario' => $datosUsuario], ['nif' => $nif]);
    
} else {
    /* Validar correo electrónico */
    $correo = $_POST['correo'];
    if (empty($correo) || !validarEmail($correo)) {
        $errores['correo'] = 'El campo correo electrónico está vacío o no es válido';
        $hayError = TRUE;
    }

    if ($hayError) {
        $nif = $_GET['nif'];
        echo $blade->render('formulario_modificarUsuario', ['nif' => $nif]);
    } else {
        $nif = $_GET['nif'];

        $recogida_campos = $_POST;

        Usuario::modificar($nif, getValues($recogida_campos, false), getValues($recogida_campos, true));
        header("location:procesarListaUsuarios.php");
    }
}

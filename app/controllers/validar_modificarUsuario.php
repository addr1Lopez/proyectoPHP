<?php

/**
 * validar_modificarUsuario
 * @param  string $nif es el nif del usuario
 * @param  string $blade es un string con el que vamos a mostrar la vista
 * @param  boolean $hayError es un boolean con el que vamos a decir true o false para la validación en el formulario
 * @param  array $errores es un array en el que se almacenan los errores
 * @param  array $recogida_campos es un array donde recogemos todos los campos recibidos por el método POSTS
 * @param  void $datosTarea te devuelve la consulta de los datos de la tarea
 */

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
include('../libraries/validarCadenaNum.php');
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

    /* Validar contraseña */
    $contraseña = $_POST['contraseña'];
    if (empty($contraseña) || !validarCadenaNum($contraseña)) {
        $errores['contraseña'] = 'El campo contraseña no puede estar vacío ni contener caracteres especiales';
        $hayError = TRUE;
    }
    
}
    if ($hayError) {
        $nif = $_GET['nif'];
        
        $datosUsuario = Usuario::getDatosUsuario($nif);

        echo $blade->render('formulario_modificarUsuario', ['nif' => $nif], ['datosUsuario' => $datosUsuario] );

    } else {

        $nif = $_GET['nif'];

        $recogida_campos = $_POST;

        Usuario::modificar($nif, getValues($recogida_campos, false), getValues($recogida_campos, true));
        header("location:procesarListaUsuarios.php");
    }


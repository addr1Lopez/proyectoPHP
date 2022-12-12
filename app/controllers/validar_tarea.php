<?php

/**
 * validar_tarea
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
include('../libraries/validarCadena.php');
include('../libraries/validarCadenaNum.php');
include('../libraries/getValues.php');
include('../libraries/creaselect.php');

$hayError = FALSE;
$errores = [];

session_start();

$conexion = BD::getInstance();

if ($_SESSION['rol'] == "Administrador") {

if (!$_POST) { // Si no han enviado el formulario
    echo $blade->render('formulario_Tarea');
} else {

    /* Validar nombre */
    if (isset($_POST['nombre']) && empty($_POST['nombre']) || !validarCadena($_POST['nombre'])) {
        $errores['nombre'] = 'El campo nombre no puede estar vacío o contener caracteres especiales';
        $hayError = TRUE;
    }

    /* Validar apellidos */
    if (isset($_POST['apellidos']) && empty($_POST['apellidos']) || !validarCadena($_POST['apellidos'])) {
        $errores['apellidos'] = 'El campo apellidos no puede estar vacío o contener caracteres especiales';
        $hayError = TRUE;
    }

    /* Validar descripción */
    if (isset($_POST['textoDescripcion']) && empty($_POST['textoDescripcion']) || !validarCadenaNum($_POST['textoDescripcion'])) {
        $errores['textoDescripcion'] = 'El campo descripción no puede estar vacío o contener caracteres especiales';
        $hayError = TRUE;
    }

    /* Validar DNI español*/
    $nif_cif = $_POST['nif_cif'];
    if (!validarDni($nif_cif) && !validarcif($nif_cif)) {
        $errores['nif_cif'] = 'El campo NIF / CIF no es válido';
        $hayError = TRUE;
    }

    /* Validar telefono español*/
    $telefono = $_POST['telefono'];
    if (empty($telefono) || !validarTelefono($telefono)) {
        $errores['telefono'] = 'El campo teléfono está vacío o no es válido';
        $hayError = TRUE;
    }

    /* Validar dirección */
    $direccion = $_POST['direccion'];
    if (empty($direccion) || !validarCadenaNum($_POST['direccion'])) {
        $errores['direccion'] = 'El campo código postal está vacío o no es válido';
        $hayError = TRUE;
    }
    
    /* Validar codigo postal español */
    $codigoPostal = $_POST['codigoPostal'];
    if (empty($codigoPostal) || !validarCodigoPostal($codigoPostal)) {
        $errores['codigoPostal'] = 'El campo código postal está vacío o no es válido';
        $hayError = TRUE;
    }

    /* Validar correo electrónico */
    $correo = $_POST['correo'];
    if (empty($correo) || !validarEmail($correo)) {
        $errores['correo'] = 'El campo email está vacío o no es válido';
        $hayError = TRUE;
    }

    /* Validar fecha de realizacion */
    $fechaRealizacion = $_POST['fechaRealizacion'];
    if (empty($fechaRealizacion) || !validarFechaRealizacion($fechaRealizacion)) {
        $errores['fechaRealizacion'] = 'La fecha de realización está vacía o no es válida';
        $hayError = TRUE;
    }

    if ($hayError) {
        echo $blade->render('formulario_Tarea');
    } else {
        $recogida_campos = $_POST;
        Tarea::insertar(getValues($recogida_campos, true), getValues($recogida_campos, false));
        header('location:validar_Tarea.php');
    }
}
} else {
    header('location:procesarListaTareas.php');
}
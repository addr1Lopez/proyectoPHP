<?php
include('../controllers/utilsforms.php');
include('../controllers/creaselect.php');

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

$hayError = FALSE;
$errores = [];
$fcha = date("Y-m-d"); // Habra que quitarlo porque lo de la fecha de creación hay que ponerlo con un trigger

$conexion = BD::getInstance();

if (!$_POST) { // Si no han enviado el formulario

    $id = $_GET['id'];

    $datosTarea = Tarea::getDatosTarea($id);

    include("../views/formulario_modificarTarea.php");
} else {

    /* Validar nombre */
    if (isset($_POST['nombre']) && empty($_POST['nombre'])) {
        $errores['nombre'] = 'El campo nombre no puede estar vacío';
        $hayError = TRUE;
    }

    /* Validar apellidos */
    if (isset($_POST['apellidos']) && empty($_POST['apellidos'])) {
        $errores['apellidos'] = 'El campo apellidos no puede estar vacío';
        $hayError = TRUE;
    }

    /* Validar descripción */
    if (isset($_POST['textoDescripcion']) && empty($_POST['textoDescripcion'])) {
        $errores['textoDescripcion'] = 'El campo descripción no puede estar vacío';
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
    if (empty($fechaRealizacion) /*|| !validarFechaRealizacion($fechaRealizacion)*/) {
        $errores['fechaRealizacion'] = 'La fecha de realización está vacía o no es válida';
        $hayError = TRUE;
    }

    if ($hayError) {
        include("../views/formulario_modificarTarea.php");
    } else {
        $id = $_GET['id'];
          
        Tarea::modificar($id, getValues($recogida_campos, false), getValues($recogida_campos, true));
        header("location:procesarListaTareas.php");
    }
}

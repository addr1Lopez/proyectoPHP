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
    if (empty($fechaRealizacion) || !validarFechaRealizacion($fechaRealizacion)) {
        $errores['fechaRealizacion'] = 'La fecha de realización está vacía o no es válida';
        $hayError = TRUE;
    }

    if ($hayError) {
        include("../views/formulario_modificarTarea.php");
    } else {
        include("../controllers/getvaluesModificar.php");
        header("location:procesarListaTareas.php");
    }
}


/* FUNCIONES */
/*
function validarDni($dni)
{
    $dnisL = substr($dni, 0, -1);
    $letra = substr($dni, -1);
    $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
    $arLista = str_split($lista);

    if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
        $resultado = (int)$dnisL % 23;
        $letraAsign = $arLista[$resultado];
        if ($letra == $letraAsign) {
            return true;
        } else {
            return false;
        }
    }
}

function validarTelefono($tel)
{
    $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
    if (preg_match("/$a/", $tel)) {
        return true;
    } else {
        return false;
    }
}

function validarCodigoPostal($cod)
{
    $a = "^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$";
    if (preg_match("/$a/", $cod)) {
        return true;
    } else {
        return false;
    }
}

function validarEmail($email)
{
    $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
    return preg_match($reg, $email);
}

function validarFechaRealizacion($fecha)
{
    $fecha = new DateTime($fecha);
    $hoy = new DateTime();
    if ($fecha <= $hoy) {
        return false;
    } else {
        return true;
    }
}
*/
<?php

/**
 * validar_completarTarea
 * @param  string $id es el id de la tarea
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

include('../libraries/validarCadena.php');
include('../libraries/validarCadenaNum.php');
include('../libraries/getValues.php');
include('../libraries/creaselect.php');
include('../libraries/subirArchivos.php');

session_start();

$hayError = FALSE;
$errores = [];

$conexion = BD::getInstance();

if ($_SESSION['rol'] == "Operario") {

if (!$_POST) { // Si no han enviado el formulario

    $id = $_GET['id'];

    $datosTarea = Tarea::getDatosTarea($id);

    echo $blade->render('form_completarTarea', ['datosTarea' => $datosTarea], ['id' => $id]);
} else {

    /* Validar anotaciones anteriores */
    if (!validarCadenaNum($_POST['anotacionesAnt'])) {
        $errores['anotacionesAnt'] = 'No se pueden escribir caracteres especiales';
        $hayError = TRUE;
    }

    /* Validar anotaciones posteriores */
    if (!validarCadenaNum($_POST['anotacionesPos'])) {
        $errores['anotacionesPos'] = 'No se pueden escribir caracteres especiales';
        $hayError = TRUE;
    }

    if ($hayError) {
        $id = $_GET['id'];

        $recogida_campos = $_POST;

        $datosTarea = Tarea::getDatosTarea($id);

        echo $blade->render('form_completarTarea', ['datosTarea' => $datosTarea], ['id' => $id]);
    } else {

        $id = $_GET['id'];

        $recogida_campos = $_POST;

        if ($_FILES['fichResumen']['name'] == "") {
            $recogida_campos["fichResumen"] = "";
        } else {
            subirArchivo('fichResumen', $id);
            $recogida_campos["fichResumen"] = "Tarea-" . $id . "-" . $_FILES['fichResumen']['name'];
        }

        if ($_FILES['fotos']['name'] == "") {
            $recogida_campos["fotos"] = "";
        } else {
            subirArchivo('fotos', $id);
            $recogida_campos["fotos"] = "Tarea-" . $id . "-" . $_FILES['fotos']['name'];
        }

        Tarea::modificar($id, getValues($recogida_campos, false), getValues($recogida_campos, true));
        header("location:procesarListaTareas.php");
    }
}
} else {
    header("location:procesarListaTareas.php");
}

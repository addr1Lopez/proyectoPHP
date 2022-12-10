<?php
include('../controllers/utilsforms.php');
include('../controllers/varios.php');

include('../models/bd.php');
include('../models/claseprovincia.php');
include('../models/claseusuarios.php');
include('../models/clasetarea.php');

include('../libraries/getValues.php');
include('../libraries/creaselect.php');
include('../libraries/subirArchivos.php');

$conexion = BD::getInstance();

session_start();

if (!$_POST) { // Si no han enviado el formulario

    $id = $_GET['id'];

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

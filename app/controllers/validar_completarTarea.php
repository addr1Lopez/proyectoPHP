<?php
include('../controllers/utilsforms.php');
include('../controllers/varios.php');

include('../models/bd.php');
include('../models/claseprovincia.php');
include('../models/claseusuarios.php');
include('../models/clasetarea.php');

include('../libraries/getValues.php');
include('../libraries/creaselect.php');

$hayError = FALSE;
$errores = [];

$conexion = BD::getInstance();

if (!$_POST) { // Si no han enviado el formulario

    $id = $_GET['id'];

    $datosTarea = Tarea::getDatosTarea($id);

    echo $blade->render('form_completarTarea', ['datosTarea' => $datosTarea], ['id' => $id]);
} else {
    header("location:procesarListaTareas.php");
}

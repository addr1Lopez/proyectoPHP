<?php

/**
 * procesarVerDetalles
 * @param  string $id es el id de la tarea
 */

include("../models/clasetarea.php");
include("../models/bd.php");
include("../libraries/creaTable.php");
include('../controllers/varios.php');

session_start();

$id = $_GET["id"];

$datosTarea = Tarea::getDatosTarea($id);

echo $blade->render('verDetalles', ['datosTarea' => $datosTarea,
'id' => $id]);

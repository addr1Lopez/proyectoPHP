<?php

include("../models/clasetarea.php");
include("../models/bd.php");
include("../libraries/creaTable.php");
include('../controllers/varios.php');

$id = $_GET["id"];

$datosTarea = Tarea::getDatosTarea($id);

echo $blade->render('verDetalles', ['datosTarea' => $datosTarea,
'id' => $id]);

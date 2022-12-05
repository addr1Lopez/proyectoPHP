<?php

include("../models/clasetarea.php");
include("../models/bd.php");
include("../libraries/creaTable.php");

$id = $_GET["id"];

$datosTarea = Tarea::getDatosTarea($id);

include("../views/verDetalles.php");
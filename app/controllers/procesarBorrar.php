<?php

/**
 * procesarBorrar
 * @param  string $id es el id de la tarea
 */

include('../models/bd.php');
include('../models/clasetarea.php');

session_start();

if ($_SESSION['rol'] == "Administrador") {

$id = $_GET['id'];
Tarea::borrar($id);

header('location:procesarlistaTareas.php');

} else {
    header('location:procesarlistaTareas.php');
}
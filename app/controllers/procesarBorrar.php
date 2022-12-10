<?php

include('../models/bd.php');
include('../models/clasetarea.php');

session_start();

$id = $_GET['id'];
Tarea::borrar($id);

header('location:procesarlistaTareas.php');

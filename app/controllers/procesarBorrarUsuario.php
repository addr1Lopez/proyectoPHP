<?php

include('../models/bd.php');
include('../models/claseusuarios.php');

session_start();

$nif = $_GET['nif'];

Usuario::borrar($nif);

header('location:procesarlistaUsuarios.php');

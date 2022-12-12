<?php

/**
 * validar_insertar
 * @param  array $recogida_campos es un array donde recogemos todos los campos recibidos por el método POSTS
 
 */

include ('../libraries/getValues.php');
include('../models/clasetarea.php');

session_start();

Tarea::insertar(getValues($recogida_campos, true), getValues($recogida_campos, false));

header('location:procesarListaTareas.php');

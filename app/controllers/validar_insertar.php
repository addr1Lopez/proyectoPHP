<?php
include ('../libraries/getValues.php');
include('../models/clasetarea.php');

session_start();

Tarea::insertar(getValues($recogida_campos, true), getValues($recogida_campos, false));

header('location:validar_Tarea.php');

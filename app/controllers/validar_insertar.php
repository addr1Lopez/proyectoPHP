<?php
include ('getValues.php');
include('../models/clasetarea.php');

//$listaTareas = [$nif_cif, $nombre, $apellidos, $telefono, $textoDescripcion, $correo, $direccion, $poblacion, $codigoPostal, $provincias, $estado, $fechaCreacion, $operario_encargado, $fechaRealizacion, $anotacionesAnt, $anotacionesPos];

Tarea::insertar(getValues($recogida_campos, true), getValues($recogida_campos, false));
//Tarea::insertar($valores, $camposArray);

header('location:validar_Tarea.php');
?>

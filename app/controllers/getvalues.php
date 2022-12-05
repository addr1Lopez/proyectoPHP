<?php

/*
$nif_cif = $_POST['nif_cif'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$textoDescripcion = $_POST['textoDescripcion'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$poblacion = $_POST['poblacion'];
$codigoPostal = $_POST['codigoPostal'];
$provincias = $_POST['provincias'];
$estado = $_POST['estado'];
$fechaCreacion = $_POST['fechaCreacion'];
$operario_encargado = $_POST['operario_encargado'];
$fechaRealizacion = $_POST['fechaRealizacion'];
$anotacionesAnt = $_POST['anotacionesAnt'];
$anotacionesPos = $_POST['anotacionesPos'];
*/

include('../models/clasetarea.php');

//$listaTareas = [$nif_cif, $nombre, $apellidos, $telefono, $textoDescripcion, $correo, $direccion, $poblacion, $codigoPostal, $provincias, $estado, $fechaCreacion, $operario_encargado, $fechaRealizacion, $anotacionesAnt, $anotacionesPos];

$recogida_campos = $_POST;
$nombre_campos = "";
$valores = "";

foreach ($recogida_campos as $valor => $campo) {
    $nombre_campos .= $campo . ',';
    $valores .= $valor . ',';
}

$nombre_campos = substr($nombre_campos, 0, -1);
$valores = substr($valores, 0, -1);

$camposArray = explode(",", $nombre_campos);

var_dump($camposArray);

echo "<br><br>";

Tarea::insertar($valores, $camposArray);
header('location:validarTarea.php');
?>


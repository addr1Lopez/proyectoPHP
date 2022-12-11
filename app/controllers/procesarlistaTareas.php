<?php

include('../models/clasetarea.php');
include('../models/bd.php');
include('../libraries/creaTable.php');
include('../controllers/varios.php');

session_start();

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'textoDescripcion', 'poblacion', 'estado', 'fechaCreacion', 'operario_encargado', 'fechaRealizacion',
];

$nombresFormateados = [
    'ID', 'NIF/CIF', 'NOMBRE', 'DESCRIPCIÓN', 'POBLACIÓN', 'ESTADO', 'FECHA DE CREACIÓN', 'OPERARIO', 'FECHA DE REALIZACIÓN',
];

// Preparar paginación
$tamanioPagina = 5;


if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {
        header('location:procesarListaTareas.php');
    } else {
        $pagina = $_GET['pagina'];
    }
} else {
    $pagina = 1;
}


$numFilas = Tarea::getNumeroTareas();
$totalPaginas = ceil($numFilas / $tamanioPagina);
$empezarDesde = ($pagina - 1) * $tamanioPagina;


/**
 * Comprobar si se ha enviado el valor de la página por el buscador
 */

 /*
if (isset($_GET['numPag'])) {
    
    if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
        $pagina = $_GET['numPag'];
    }
}
*/
$registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina);


echo $blade->render('listaTareas', [
    'tareas' => Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'nombresFormateados' => $nombresFormateados,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);

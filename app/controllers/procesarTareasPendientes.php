<?php

include('../models/clasetarea.php');
include('../models/bd.php');
include('../libraries/creaTable.php');
include('../controllers/varios.php');

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'textoDescripcion', 'poblacion', 'estado', 'fechaCreacion', 'operario_encargado', 'fechaRealizacion',
];

// Preparar paginación

$tamanioPagina = 3;

if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {
        header('location:procesarTareasPendientes.php');
    } else {
        $pagina = $_GET['pagina'];
    }
} else {

    $pagina = 1;
}

$empezarDesde = ($pagina - 1) * $tamanioPagina;

$numFilas = Tarea::getNumeroTareasPendientes();
$totalPaginas = ceil($numFilas / $tamanioPagina);

/**
 * Comprobar si se ha enviado el valor de la página por el buscador
 */
if (isset($_GET['numPag'])) {
    
    if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
        $pagina = $_GET['numPag'];
    }
}

$registro = Tarea::getTareasPendientesPorPagina($empezarDesde, $tamanioPagina);

echo $blade->render('listaTareasPendientes', [
    'tareas' => Tarea::getTareasPendientesPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas
    
]);
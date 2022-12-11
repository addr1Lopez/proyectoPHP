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

$registro = Tarea::getTareasPendientesPorPagina($empezarDesde, $tamanioPagina);

echo $blade->render('listaTareasPendientes', [
    'tareas' => Tarea::getTareasPendientesPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'nombresFormateados' => $nombresFormateados,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas
    
]);
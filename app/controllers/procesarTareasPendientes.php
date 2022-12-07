<?php

include('../models/clasetarea.php');
include('../models/bd.php');
include('../libraries/creaTable.php');

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'textoDescripcion', 'estado', 'fechaCreacion', 'operario_encargado', 'fechaRealizacion',
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

include('../views/listaTareasPendientes.php');

for ($i = 1; $i <= $totalPaginas; $i++) {

    echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
}

<?php

include('../models/clasetarea.php');
include('../models/bd.php');
include('../libraries/creaTable.php');
include('../controllers/varios.php');

//$listaTareas = Tarea::getListaTareas();

/*$nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','textoDescripcion','correo','direccion','poblacion',
        'codigoPostal','provincias','estado','fechaCreacion','operario_encargado','fechaRealizacion',
        'anotacionesAnt','anotacionesPos', //'fichResumen','fotos'
    ];*/

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'textoDescripcion', 'poblacion', 'estado', 'fechaCreacion', 'operario_encargado', 'fechaRealizacion',
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
if (isset($_GET['numPag'])) {
    
    if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
        $pagina = $_GET['numPag'];
    }
}

$registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina);

echo $blade->render('listaTareas', [
    'tareas' => Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);

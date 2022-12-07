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
    'id', 'nif_cif', 'nombre', 'textoDescripcion', 'estado', 'fechaCreacion', 'operario_encargado', 'fechaRealizacion',
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

$empezarDesde = ($pagina - 1) * $tamanioPagina;

$numFilas = Tarea::getNumeroTareas();
$totalPaginas = ceil($numFilas / $tamanioPagina);

$registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina);

echo $blade->render('listaTareas', [
    'tareas' => Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas
    
]);

for ($i = 1; $i <= $totalPaginas; $i++) {
    
    echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
}


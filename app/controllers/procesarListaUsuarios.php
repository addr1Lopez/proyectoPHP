<?php

include('../models/claseusuarios.php');
include('../models/bd.php');
include('../libraries/creaTable.php');
include('../controllers/varios.php');

session_start();

$nombreCampos = [
    'nif', 'nombre', 'correo', 'contraseña', 'telefono', 'esAdmin',];

$nombresFormateados = [
    'NIF', 'NOMBRE', 'CORREO', 'CONTRASEÑA', 'TELÉFONO', 'ADMIN',];

// Preparar paginación
$tamanioPagina = 3;


if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {
        header('location:procesarListaUsuarios.php');
    } else {
        $pagina = $_GET['pagina'];
    }
} else {
    $pagina = 1;
}

$numFilas = Usuario::getNumeroUsuarios();
$totalPaginas = ceil($numFilas / $tamanioPagina);
$empezarDesde = ($pagina - 1) * $tamanioPagina;


$registro = Usuario::getUsuariosPorPagina($empezarDesde, $tamanioPagina);

echo $blade->render('listaUsuarios', [
    'usuarios' => Usuario::getUsuariosPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'nombresFormateados' => $nombresFormateados,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);

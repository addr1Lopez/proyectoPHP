<?php

/**
 * procesarListaUsuarios
 * @param  string $nombreCampos es un array con los nombres de los campos de la base de datos
 * @param  string $nombresFormateados es un array con los nombres de los campos de la base de datos, pero con buen formato
 * @param  int $tamanioPagina es el número de tareas que van a salir por página
 * @param  int $pagina es la página actual
 * @param  int $numFilas es un int con el numero de filas de la tabla indicada
 * @param  int $empezarDesde es la página desde la que empieza la paginación
 * @param  array $registro es un array que contiene el total de tareas por página
 * @param  int $totalPaginas es el total de páginas que va a tener la paginación
 * 
 */

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

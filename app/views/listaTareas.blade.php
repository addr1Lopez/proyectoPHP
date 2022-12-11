<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="">
</head>

<body>
    @extends('_template')
    @section('cuerpo')

    <?= creaTable('listaTareas', $nombreCampos, $nombresFormateados, Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina), 'id') ?>


    <a href="?pagina=1" class='btn btn-primary' role='button' style="font-weight: bold"><i class="fa-solid fa-backward-fast"></i></a>

    <a href="?pagina=<?= ($pagina == 1) ? $pagina : $pagina - 1 ?>" class="btn btn-primary" role='button' style="font-weight: bold"><i class="fa-solid fa-backward-step"></i></a>

    <span>Página <?= $pagina ?></span>

    <a href="?pagina=<?= ($pagina == $totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-primary" role='button' style="font-weight: bold"><i class="fa-solid fa-forward-step"></i></a>

    <a href="?pagina=<?= $totalPaginas ?>" class="btn btn-primary" role='button' style="font-weight: bold"><i class="fa-sharp fa-solid fa-forward-fast"></i></a>

    <span> Nº de Páginas: <?= $totalPaginas ?></span>
    <br><br>

    <form action="../controllers/procesarListaTareas.php" method="get" style="display: flex; flex-direction:row;">
        <button style="margin-bottom: 1rem; background-color:dodgerblue; color:white; font-weight: bold" class="btn btn-dark">Ir a Página:</button>
        &nbsp;
        <input type="text" name="pagina" style="margin-bottom: 1rem">
    </form>
    @endsection
</body>

</html>
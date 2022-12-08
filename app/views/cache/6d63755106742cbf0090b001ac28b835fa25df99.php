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
    
    <?php $__env->startSection('cuerpo'); ?>

    <?= creaTable('listaTareas', $nombreCampos, Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina)) ?>


    <a href="?pagina=1" class="btn btn-primary" role='button'>Primera</a>

    <a href="?pagina=<?= ($pagina == 1) ? $pagina : $pagina - 1 ?>" class="btn btn-primary" role='button'><<</a>

            <span>Página <?= $pagina ?></span>

            <a href="?pagina=<?= ($pagina == $totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-primary" role='button'>>></a>

            <a href="?pagina=<?= $totalPaginas ?>" class="btn btn-primary" role='button'>Última</a>

            <span>Páginas: <?= $totalPaginas ?></span>
            <br><br>

            <form action="../controllers/procesarListaTareasPendientes.php" method="get">
                <input type="text" name="numPag">
                <button>Ir a página</button>
            </form>
            <br>
            <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/listaTareas.blade.php ENDPATH**/ ?>
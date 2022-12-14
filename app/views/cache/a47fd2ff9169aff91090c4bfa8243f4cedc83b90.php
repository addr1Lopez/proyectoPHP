<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/template.css">
</head>

<body>
    
    <?php $__env->startSection('cuerpo'); ?>
    <br>
    <h2>¿Estás seguro de que quieres borrar la tarea <?= $_GET['id'] ?> ?</h2>
    <a class="btn btn-success" href="../controllers/procesarBorrar.php?id=<?= $_GET['id'] ?>">SI</a>
    <a class="btn btn-danger" href="../controllers/procesarlistaTareas.php">NO</a>
    <br><br>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/confirmacion_borrar.blade.php ENDPATH**/ ?>
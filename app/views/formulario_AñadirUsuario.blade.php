<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../Assets/css/formulario_tarea.css" rel="stylesheet">
</head>

<body>
    @extends('_template')
    @section('cuerpo')

    <form action="../controllers/validar_AñadirUsuario.php" method="post">
        <h2> Formulario para añadir un Usuario</h2>
        <br>

        <label>NIF:</label> <input type="text" class="form-control" name="nif" value="<?= ValorPost('nif') ?>">
        <?= VerError('nif') ?>
        <br>
        <label>Nombre:</label> <input type="text" class="form-control" name="nombre" value="<?= ValorPost('nombre') ?>">
        <?= VerError('nombre') ?>
        <br>
        <label>Correo electrónico:</label> <input type="text" class="form-control" name="correo" value="<?= ValorPost('correo') ?>">
        <?= VerError('correo') ?>
        <br>
        <label>Contraseña:</label> <input type="text" class="form-control" name="contraseña" value="<?= ValorPost('contraseña') ?>">
        <?= VerError('contraseña') ?>
        <br>
        <label>Teléfono:</label> <input type="text" class="form-control" name="telefono" value="<?= ValorPost('telefono') ?>">
        <?= VerError('telefono') ?>
        <br>
        <label>Es Administrador:</label> 
        <select name="esAdmin" class="form-select">
            <option value="SI">Sí</option>
            <option value="NO">No</option>
        </select>
        <br>
        <div>
            <button type="submit" class="btn btn-primary mb-3" name="">Añadir</button>
            <a style="margin-bottom: 16px;" class="btn btn-danger" href="../controllers/procesarlistaUsuarios.php">Volver atrás <i class="fa-solid fa-backward"></i></a>
        </div>
    </form>
    @endsection
</body>

</html>
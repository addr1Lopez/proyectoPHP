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
    <br>
    <h2>Datos del usuario con NIF: <?= $nif ?> </h2>
    <table class="table table-striped table-hover">
        <thead class="table table-warning">
            <tr>
                <th>NIF</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>CONTRASEÑA</th>
                <th>TELÉFONO</th>
                <th>ES ADMIN</th>
            </tr>
        </thead>
        <tr>
            <td><?= $datosUsuario['nif'] ?></td>
            <td><?= $datosUsuario['nombre'] ?></td>
            <td><?= $datosUsuario['correo'] ?></td>
            <td><?= $datosUsuario['contraseña'] ?></td>
            <td><?= $datosUsuario['telefono'] ?></td>
            <td><?= $datosUsuario['esAdmin'] ?></td>
        </tr>
    </table>

    <form action="../controllers/validar_modificarUsuario.php?nif=<?= $nif ?>" method="post">
        <h2>Modificar usuario con NIF <?= $nif ?> </h2>
        <br>
        <label>Correo electrónico:</label> <input type="text" class="form-control" name="correo" value="<?= isset($datosUsuario["correo"]) ? $datosUsuario["correo"] : ValorPost('correo') ?>">
        <?= VerError('correo') ?>
        <br>

        <label>Contraseña:</label> <input type="text" class="form-control" name="contraseña" value="<?= isset($datosUsuario["contraseña"]) ? $datosUsuario["contraseña"] : ValorPost('contraseña') ?>">
        <?= VerError('contraseña') ?>
        <br>
        <div>
            <button type="submit" class="btn btn-primary mb-3" name="">Modificar</button>
        </div>
    </form>
    @endsection
</body>

</html>
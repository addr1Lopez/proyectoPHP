<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../Assets/css/template.css" rel="stylesheet">
</head>
<body>
    <form action="/app/controllers/validar_usuario.php" method="post">
    <img src="../../Assets/img/login.png" width="100px" height="100px" style="margin-top: 4em;">
    <br>
    <h1>Inicio de sesión</h1>
    <br>
    <label>Correo:</label><input style="width: 300px;"  class="form-control" type="text" name="correo" value="<?= ValorPost('correo') ?>">
    <?= VerError('correo') ?>
    <br>
    <label>Contraseña:</label><input  style="width: 300px;" class="form-control" type="password" name="contraseña" value="<?= ValorPost('contraseña') ?>">
    <?= VerError('contraseña') ?>
    <br>
    <label>Recordarme: </label> <input class="form-check-input" type="checkbox" name="recordar">
    <br>
    <button type="submit" class="btn btn-primary mb-3" name="">Iniciar sesión</button>
    </form>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/login.blade.php ENDPATH**/ ?>
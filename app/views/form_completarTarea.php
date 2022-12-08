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
<h2>Formulario para completar la tarea <?=$id?> </h2>
    <form action="../controllers/validar_completarTarea.php" method="post" enctype="multipart/form-data">      
                
        <label>Anotaciones anteriores:</label> <br> <textarea class="form-control" name="anotacionesAnt" id="anotaAnt" cols="30" rows="4"></textarea>
        <br>

        <label>Anotaciones posteriores:</label> <br> <textarea class="form-control" name="anotacionesPos" id="anotaPos" cols="30" rows="4"></textarea>
        <br>

        <label>Fichero resumen:</label> <input type="file" class="form-control" name=""><br>

        <label>Fotos del trabajo realizado:</label> <input type="file" class="form-control" name=""><br>

        <button type="submit" class="btn btn-primary mb-3" name="">Enviar</button>

    </form>
</body>

</html>
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

    <table class="table table-bordered">
        <thead class="table table-warning">
            <tr>
                <th>ID</th>
                <th>NIF/CIF</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Email</th>
                <th>Población</th>
                <th>Código Postal</th>
                <th>Provincias</th>
                <th>Estado</th>
                <th>Fecha de Creacion</th>
                <th>Operario Encargado</th>
                <th>Fecha de Realizacion</th>
                <th>Anotaciones Anteriores</th>
                <th>Anotaciones Posteriores</th>
                <th>Fichero Resumen</th>
                <th>Foto Trabajo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $datosTarea['id'] ?></td>
                <td><?= $datosTarea['nif_cif'] ?></td>
                <td><?= $datosTarea['nombre'] ?></td>
                <td><?= $datosTarea['textoDescripcion'] ?></td>
                <td><?= $datosTarea['correo'] ?></td>
                <td><?= $datosTarea['poblacion'] ?></td>
                <td><?= $datosTarea['codigoPostal'] ?></td>
                <td><?= $datosTarea['provincias'] ?></td>
                <td><?= $datosTarea['estado'] ?></td>
                <td><?= $datosTarea['fechaCreacion'] ?></td>
                <td><?= $datosTarea['operario_encargado'] ?></td>
                <td><?= $datosTarea['fechaRealizacion'] ?></td>
                <td><?= $datosTarea['anotacionesAnt'] ?></td>
                <td><?= $datosTarea['anotacionesPos'] ?></td>
                <td><?= ($datosTarea['fichResumen'] != "") ? "<a class='btn btn-info' href='/Files/" . $datosTarea['fichResumen'] . "' download='" . $datosTarea['fichResumen'] . "'>Descargar</a>" : "" ?> </td>
                <td><?= ($datosTarea['fotos'] != "") ? "<a class='btn btn-info' href='/Files/" . $datosTarea['fotos'] . "' download='" . $datosTarea['fotos'] . "'>Descargar</a>" : "" ?> </td>
            </tr>
        </tbody>
    </table>

    <h2>Formulario para completar la tarea <?= $id ?> </h2>
    <form action="../controllers/validar_completarTarea.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">

        <label>Estado:</label>
        <select class="form-select" name="estado" id="estado">
            <option value="0">--- Seleccione un estado de tarea ---</option>
            <option value="B" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B - Esperando ser aprobada</option>
            <option value="P" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P - Pendiente</option>
            <option value="R" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R - Realizada</option>
            <option value="C" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C - Cancelada</option>
        </select>

        <label>Anotaciones anteriores:</label> <br> <textarea class="form-control" name="anotacionesAnt" id="anotaAnt" cols="30" rows="4"><?= isset($datosTarea["anotacionesAnt"]) ? $datosTarea["anotacionesAnt"] : "" ?></textarea>
        <?= VerError('anotacionesAnt') ?>
        <br>

        <label>Anotaciones posteriores:</label> <br> <textarea class="form-control" name="anotacionesPos" id="anotaPos" cols="30" rows="4"><?= isset($datosTarea["anotacionesPos"]) ? $datosTarea["anotacionesPos"] : "" ?></textarea>
        <?= VerError('anotacionesPos') ?>
        <br>

        <label>Fichero resumen:</label> <input type="file" class="form-control" name="fichResumen"><br>

        <label>Fotos del trabajo realizado:</label> <input type="file" class="form-control" name="fotos"><br>

        <div>
            <button type="submit" class="btn btn-primary mb-3" name="">Enviar</button>
            <a style="margin-bottom: 16px" class="btn btn-danger" href="../controllers/procesarlistaTareas.php">Volver a tareas <i class="fa-solid fa-backward"></i></a>
        </div>
        @endsection
    </form>
</body>

</html>
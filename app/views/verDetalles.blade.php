<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/verDetalles.css">
    <title>Document</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')
    <br>
    <h2>Detalles de la tarea <?= $id ?> </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="table table-warning">ID</th>
                <td><?= $datosTarea['id'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">NIF/CIF</th>
                <td><?= $datosTarea['nif_cif'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Nombre</th>
                <td><?= $datosTarea['nombre'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Apellidos</th>
                <td><?= $datosTarea['apellidos'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Teléfono</th>
                <td><?= $datosTarea['telefono'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Descripción</th>
                <td><?= $datosTarea['textoDescripcion'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Email</th>
                <td><?= $datosTarea['correo'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Dirección</th>
                <td><?= $datosTarea['direccion'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Población</th>
                <td><?= $datosTarea['poblacion'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Código Postal</th>
                <td><?= $datosTarea['codigoPostal'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Provincias</th>
                <td><?= $datosTarea['provincias'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Estado</th>
                <td><?= $datosTarea['estado'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Fecha de Creacion</th>
                <td><?= $datosTarea['fechaCreacion'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Operario Encargado</th>
                <td><?= $datosTarea['operario_encargado'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Fecha de Realizacion</th>
                <td><?= $datosTarea['fechaRealizacion'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Anotaciones Anteriores</th>
                <td><?= $datosTarea['anotacionesAnt'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Anotaciones Posteriores</th>
                <td><?= $datosTarea['anotacionesPos'] ?></td>
            </tr>
            <tr>
                <th class="table table-warning">Fichero Resumen</th>
                <td><?= ($datosTarea['fichResumen'] != "") ? "<a class='btn btn-info' href='/Files/" . $datosTarea['fichResumen'] . "' download='" . $datosTarea['fichResumen'] . "'>Descargar</a>" : "" ?> </td>
            </tr>
            <tr>
                <th class="table table-warning">Foto Trabajo</th>
                <td><?= ($datosTarea['fotos'] != "") ? "<a class='btn btn-info' href='/Files/" . $datosTarea['fotos'] . "' download='" . $datosTarea['fotos'] . "'>Descargar</a>" : "" ?> </td>
            </tr>
            </tr>
    </table>
    <a class="btn btn-danger" href="../controllers/procesarlistaTareas.php">Volver atrás <i class="fa-solid fa-backward"></i></a>
    <br>
    <br>
    @endsection

</body>

</html>
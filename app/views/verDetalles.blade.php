<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>NIF/CIF</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Descripción</th>
                <th>Email</th>
                <th>Dirección</th>
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
                <td><?= $datosTarea['apellidos'] ?></td>
                <td><?= $datosTarea['telefono'] ?></td>
                <td><?= $datosTarea['textoDescripcion'] ?></td>
                <td><?= $datosTarea['correo'] ?></td>
                <td><?= $datosTarea['direccion'] ?></td>
                <td><?= $datosTarea['poblacion'] ?></td>
                <td><?= $datosTarea['codigoPostal'] ?></td>
                <td><?= $datosTarea['provincias'] ?></td>
                <td><?= $datosTarea['estado'] ?></td>
                <td><?= $datosTarea['fechaCreacion'] ?></td>
                <td><?= $datosTarea['operario_encargado'] ?></td>
                <td><?= $datosTarea['fechaRealizacion'] ?></td>
                <td><?= $datosTarea['anotacionesAnt'] ?></td>
                <td><?= $datosTarea['anotacionesPos'] ?></td>
                <td><?= $datosTarea['fichResumen'] ?></td>
                <td><?= $datosTarea['fotos'] ?></td>
            </tr>
        </tbody>
    </table>
    <a href="../controllers/procesarlistaTareas.php">Volver a lista de tareas</a>
    @endsection
    
</body>
</html>
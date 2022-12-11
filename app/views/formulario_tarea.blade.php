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
    <h2>Formulario de recogida de información de la tarea</h2>
    <form action="../controllers/validar_tarea.php" method="post">
        <label id="nif_cif">NIF o CIF:</label> <input type="text" class="form-control" name="nif_cif" value="<?= ValorPost('nif_cif') ?>">
        <?= VerError('nif_cif') ?>
        <br>

        <h4 class="titulo-persona">Persona de contacto: </h4>

        <label>Nombre:</label> <input type="text" class="form-control" name="nombre" value="<?= ValorPost('nombre') ?>">
        <?= VerError('nombre') ?>
        <br>

        <label>Apellidos:</label> <input type=" text" class="form-control" name="apellidos" value="<?= ValorPost('apellidos') ?>">
        <?= VerError('apellidos') ?>
        <br>

        <label>Nº Teléfono:</label> <input type="text" class="form-control" name="telefono" value="<?= ValorPost('telefono') ?>">
        <?= VerError('telefono') ?>
        <br>

        <label>Descripción:</label> <br> <textarea name="textoDescripcion" class="form-control" id="descripcion" cols="30" rows="4"><?= ValorPost('textoDescripcion') ?></textarea>
        <?= VerError('textoDescripcion') ?>
        <br>

        <label>Correo electrónico:</label> <input type="text" class="form-control" name="correo" value="<?= ValorPost('correo') ?>">
        <?= VerError('correo') ?>
        <br>

        <label>Dirección:</label> <input type="text" class="form-control" name="direccion">
        <br>

        <label>Población:</label> <input type="text" class="form-control" name="poblacion">
        <br>

        <label>Código Postal:</label> <input type="text" class="form-control" name="codigoPostal" value="<?= ValorPost('codigoPostal') ?>">
        <?= VerError('codigoPostal') ?>
        <br>

        <label>Provincia:</label>

        <?= CreaSelect('provincias', Provincia::listaParaSelect(), filter_input(INPUT_POST, 'provincias')) ?>
        <br>

        <label>Estado:</label>
        <select class="form-select" name="estado" id="estado">
            <option value="B">B - Esperando ser aprobada</option>
            <option value="P">P - Pendiente</option>
            <option value="R">R - Realizada</option>
            <option value="C">C - Cancelada</option>
        </select>
        <br>

        <label>Operario encargado:</label>

        <?= CreaSelect('operario_encargado', Usuario::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>

        <label>Fecha de realización:</label> <input type="date" class="form-control" name="fechaRealizacion" value="<?= ValorPost('fechaRealizacion') ?>">
        <?= VerError('fechaRealizacion') ?>
        <br>
        <button type="submit" class="btn btn-primary mb-3" name="">Añadir</button>

    </form>
    @endsection
</body>

</html>
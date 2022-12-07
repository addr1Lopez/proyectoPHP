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
    <h2>Formulario de modificación de la tarea <?=$id?> </h2>
    <form action="../controllers/validar_modificarTarea.php?id=<?=$id?>" method='post'>
        <label id="nif_cif">NIF o CIF:</label> <input type="text" class="form-control" name="nif_cif" value="<?= isset($datosTarea["nif_cif"]) ? $datosTarea["nif_cif"] : ValorPost('nif_cif') ?>">
        <?= VerError('nif_cif') ?>
        <br>

        <h4 class="titulo-persona">Persona de contacto: </h4>
        
        <label>Nombre:</label> <input type="text" class="form-control" name="nombre" value="<?= isset($datosTarea["nombre"]) ? $datosTarea["nombre"] : ValorPost('nombre') ?>">
        <?= VerError('nombre') ?>
        <br>

        <label>Apellidos:</label> <input type=" text" class="form-control" name="apellidos" value="<?= isset($datosTarea["apellidos"]) ? $datosTarea["apellidos"] : ValorPost('apellidos') ?>">
        <?= VerError('apellidos') ?>
        <br>

        <label>Nº Teléfono:</label> <input type="text" class="form-control" name="telefono" value="<?= isset($datosTarea["telefono"]) ? $datosTarea["telefono"] : ValorPost('telefono') ?>">
        <?= VerError('telefono') ?>
        <br>

        <label>Descripción:</label> <br> <textarea name="textoDescripcion" class="form-control" id="descripcion" cols="30" rows="4"><?= isset($datosTarea["textoDescripcion"]) ? $datosTarea["textoDescripcion"] : ValorPost('textoDescripcion') ?></textarea>
        <?= VerError('textoDescripcion') ?>
        <br>

        <label>Correo electrónico:</label> <input type="text" class="form-control" name="correo" value="<?= isset($datosTarea["correo"]) ? $datosTarea["correo"] : ValorPost('correo') ?>">
        <?= VerError('correo') ?>
        <br>

        <label>Dirección:</label> <input type="text" class="form-control" name="direccion" value="<?= isset($datosTarea["direccion"]) ? $datosTarea["direccion"] : ValorPost('direccion') ?>">
        <br>

        <label>Población:</label> <input type="text" class="form-control" name="poblacion" value="<?= isset($datosTarea["poblacion"]) ? $datosTarea["poblacion"] : ValorPost('poblacion') ?>">
        <br>

        <label>Código Postal:</label> <input type="text" class="form-control" name="codigoPostal" value="<?= isset($datosTarea["codigoPostal"]) ? $datosTarea["codigoPostal"] : ValorPost('codigoPostal') ?>">
        <?= VerError('codigoPostal') ?>
        <br>

        <label>Provincia:</label>

        <?= CreaSelect('provincias', Provincia::listaParaSelect(), (isset($datosTarea["provincias"]) ? $datosTarea["provincias"] : ValorPost('provincias')), filter_input(INPUT_POST, 'provincias')) ?>
        <br>

        <label>Estado:</label>
        <select class="form-select" name="estado" id="estado">
            <option value="0">--- Seleccione un estado de tarea ---</option>
            <option value="B"<?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B - Esperando ser aprobada</option>
            <option value="P"<?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P - Pendiente</option>
            <option value="R"<?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R - Realizada</option>
            <option value="C"<?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C - Cancelada</option>
        </select>
        <br>

        <label>Fecha de creación de la tarea:</label> <input type="date" class="form-control" name="fechaCreacion" readonly value="<?= isset($datosTarea["fechaCreacion"]) ? $datosTarea["fechaCreacion"] : ValorPost('fechaCreacion') ?>">
        <br>

        <label>Operario encargado:</label>

        <?= CreaSelect('operario_encargado', Usuario::listaParaSelect(), (isset($datosTarea["operario_encargado"]) ? $datosTarea["operario_encargado"] : ValorPost('operario_encargado')) , filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>

        <label>Fecha de realización:</label> <input type="date" class="form-control" name="fechaRealizacion" value="<?= isset($datosTarea["fechaRealizacion"]) ? $datosTarea["fechaRealizacion"] : ValorPost('fechaRealizacion') ?>">
        <?= VerError('fechaRealizacion') ?>
        <br>

        <label>Anotaciones anteriores:</label> <br> <textarea class="form-control" name="anotacionesAnt" id="anotaAnt" cols="30" rows="4"><?= isset($datosTarea["anotacionesAnt"]) ? $datosTarea["anotacionesAnt"] : ValorPost('anotacionesAnt')?></textarea>
        <br>

        <label>Anotaciones posteriores:</label> <br> <textarea class="form-control" name="anotacionesPos" id="anotaPos" cols="30" rows="4"><?= isset($datosTarea["anotacionesPos"]) ? $datosTarea["anotacionesPos"] : ValorPost('anotacionesAnt')?></textarea>
        <br>

        <!-- <label>Fichero resumen:</label> <input type="file" class="form-control" name=""><br> -->

        <!-- <label>Fotos del trabajo realizado:</label> <input type="file" class="form-control" name=""><br> -->

        <button type="submit" class="btn btn-primary mb-3" name="">Enviar</button>

    </form>
</body>

</html>
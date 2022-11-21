<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controllers/validar_tarea.php" method="post">
        <label>NIF o CIF</label> <input type="text" name="dni" value="<?= ValorPost('dni') ?>">
        <?= VerError('dni') ?>
        <br></br>

        <label>Persona de contacto: </label> <br></br>

        <label>Nombre</label> <input type="text" name="nombre" value="<?= ValorPost('nombre') ?>">
        <?= VerError('nombre') ?>
        <br></br>

        <label>Apellidos</label> <input type=" text" name="apellidos" value="<?= ValorPost('apellidos') ?>">
        <?= VerError('apellidos') ?>
        <br></br>

        <label>Nº Teléfono</label> <input type="text" name="telefono" value="<?= ValorPost('telefono') ?>">
        <?= VerError('telefono') ?>
        <br></br>

        <label>Descripción</label> <br> <textarea name="textoDescripcion" id="descripcion" cols="30" rows="4"><?= ValorPost('textoDescripcion') ?></textarea>
        <?= VerError('textoDescripcion') ?>
        <br></br>

        <label>Correo electrónico</label> <input type="text" name="correo" value="<?= ValorPost('correo') ?>">
        <?= VerError('correo') ?>
        <br></br>

        <label>Dirección</label> <input type="text" name="direccion">
        <br></br>

        <label>Población</label> <input type="text" name="poblacion">
        <br></br>

        <label>Código Postal</label> <input type="text" name="codigoPostal" value="<?= ValorPost('codigoPostal') ?>">
        <?= VerError('codigoPostal') ?>
        <br></br>

        <label>Provincia</label>
        <select name="selectProvincia" id="provincias">
            <option value="b" selected>---Seleccione una provincia  ---</option>
            <?php
            $provincias = $conexion->getProvincia();
            foreach ($provincias as $item => $value) {
            ?>
                <option value="<?php echo $item ?>"><?php echo $value ?></option>
            <?php
            }
            ?>
        </select>

        <br></br>

        <label>Estado</label>
        <select name="selectEstado" id="estado">
            <option value="0">--- Seleccione un estado de tarea ---</option>
            <option value="B">Esperando ser aprobada</option>
            <option value="P">Pendiente</option>
            <option value="R">Realizada</option>
            <option value="C">Cancelada</option>
        </select>
        <br></br>

        <label>Fecha de creación de la tarea</label> <input type="date" name="fechaCreacion" readonly value="<?= $fcha ?>"><br></br>


        <label>Operario encargado</label>
        <select name="selectOperario" id="operario">
        <option value="b" selected>---Seleccione un operario  ---</option>
        <?php
            $operarios = $conexion->getOperario();
            foreach ($operarios as $item => $value) {
            ?>
                <option value="<?php echo $item ?>"><?php echo $item . " " . $value ?></option>
            <?php
            }
            ?>
        </select>
        <br></br>


        <label>Fecha de realización</label> <input type="date" name="fechaRealizacion" value="<?= ValorPost('fechaRealizacion') ?>">
        <?= VerError('fechaRealizacion') ?>
        <br></br>

        <label>Anotaciones anteriores</label> <br> <textarea name="textoAnotaAnt" id="anotaAnt" cols="30" rows="4"></textarea><br></br>


        <label>Anotaciones posteriores</label> <br> <textarea name="textoAnotaPost" id="anotaPost" cols="30" rows="4"></textarea><br></br>


        <label>Fichero resumen</label> <input type="file" name="ficheroResumen"><br></br>


        <label>Fotos del trabajo realizado</label> <input type="file" name="fotosTrabajo"><br></br>


        <button type="submit" name="botonEnviar">Enviar</button>

    </form>
</body>

</html>
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
        <label>NIF o CIF</label> <input type="text" name="dni"><br></br>
        <label>Persona de contacto: </label> <br></br>
        <label>Nombre</label> <input type="text" name="nombre"><br></br>
        <label>Apellidos</label> <input type="text" name="apellidos"><br></br>
        <label>Nº Teléfono</label> <input type="text" name="telefono"><br></br>
        <label>Descripción</label> <br> <textarea name="textoDescripcion" id="descripcion" cols="30" rows="4"></textarea><br></br>
        <label>Correo electrónico</label> <input type="text" name="correo"><br></br>
        <label>Dirección</label> <input type="text" name="direccion"><br></br>
        <label>Población</label> <input type="text" name="poblacion"><br></br>
        <label>Código Postal</label> <input type="text" name="codigoPostal"><br></br>
        <label>Provincia</label>
        <select name="selectProvincias" id="provincias">
            <option value="0">--- Seleccione una provincia ---</option>
            <option value="21">Huelva</option>
            <option value="41">Sevilla</option>
            <option value="11">Cádiz</option>
            <option value="29">Málaga</option>
            <option value="18">Granada</option>
            <option value="14">Córdoba</option>
            <option value="23">Jaén</option>
            <option value="04">Almería</option>
        </select><br></br>
        <label>Estado</label>
        <select name="selectEstado" id="estado">
            <option value="0">--- Seleccione un estado de tarea ---</option>
            <option value="B">Esperando ser aprobada</option>
            <option value="P">Pendiente</option>
            <option value="R">Realizada</option>
            <option value="C">Cancelada</option>
        </select><br></br>
        <label>Fecha de creación de la tarea</label> <input type="date" name="fechaCreacion"><br></br>
        <label>Operario encargado</label>
        <select name="selectOperario" id="operario">
            <option value="0">--- Seleccione un operario ---</option>
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
        </select>
        <br></br>
        <label>Fecha de realización</label> <input type="date" name="fechaRealizacion"><br></br>
        <label>Anotaciones anteriores</label> <br> <textarea name="textoAnotaAnt" id="anotaAnt" cols="30" rows="4"></textarea><br></br>
        <label>Anotaciones posteriores</label> <br> <textarea name="textoAnotaPost" id="anotaPost" cols="30" rows="4"></textarea><br></br>
        <label>Fichero resumen</label> <input type="file" name="ficheroResumen"><br></br>
        <label>Fotos del trabajo realizado</label> <input type="file" name="fotosTrabajo"><br></br>
        <button type="submit" name="botonEnviar">Enviar</button>

    </form>
</body>

</html>
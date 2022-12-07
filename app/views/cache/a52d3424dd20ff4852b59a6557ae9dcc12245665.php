<!-- 
LAYOUT DE LA APLICACIÓN 
ESTA PÁGINA DISPONE DONDE IRÁN LOS DIFERENTES BLOQUES QUE CONFORMAN LA APLICACIÓN

Se centra solamente en la presentación.
Deberemos indicarle:
    - titulo
    - menu
    - cuerpo

Podría tener tantos parámetros como quisiesemos
Igualmente nuestra aplicación podría tener tantos layouts como deseasemos
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestor Tareas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/css/template.css">
</head>

<body>
    <header>
        <div style="background: #ccffff; text-align: center; font-size: 2em">
            Bunglebuild S.L.
        </div>
    </header>
    <div class="contenedor">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <main class="cuerpo" id="cuerpo">
        <?php echo $__env->yieldContent('cuerpo'); ?>
    </main>
    </div>
    <footer style="background: #ccffcc; clear: both;">
        Pie de página
    </footer>
</body>

</html><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/_template.blade.php ENDPATH**/ ?>
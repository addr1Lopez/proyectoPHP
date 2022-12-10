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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Assets/css/template.css">
</head>

<body>
    <header>
        <div class="sesion">
            <span><?= '<b> <i class="fa-solid fa-user"></i> Usuario: </b> ' . $_SESSION['nombre'] ?></span>
            &nbsp;&nbsp;&nbsp;
            <span><?= '<b> <i class="fa-solid fa-lock"></i> Rol:</b> ' . $_SESSION['rol'] ?></span>
        </div>
        <div class="hora">
            <div class="titulo">
            <span style="background: #0275d8; font-size: 2em; color: white; font-weight: bold;">Contrucciones López S.L. <img src="../../Assets/img/construcciones.png" alt="" width="50px" height="50px">
            </div>
            <span><?= '<b> <i class="fa-regular fa-clock"></i> Hora de inicio de sesión:</b> ' . $_SESSION['fecha'] ?></span>
        </div>
        <div class="cerrarSesion">
            <a id="bCerrarSesion" class="btn btn-danger" href="../controllers/validar_usuario.php">Cerrar sesión <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
        <nav id="nav" class="navbar navbar-expand-lg bg-warning" style="background-color: #929fba;">
            <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
    </header>
    <div class="contenedor">
        <main class="cuerpo" id="cuerpo">
            <?php echo $__env->yieldContent('cuerpo'); ?>
        </main>
    </div>

    <div id="pie">
        <!-- Footer -->
        <footer id="footer" class="text-center text-lg-start text-white" style="background-color: #929fba">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3" style="text-align: center;">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Construcciones López
                            </h6>
                            <p>
                                En Construcciones López nos comprometemos con ofrecer un servicio de calidad al cliente,
                                además de contar con unos precios asequibles acorde con ellos.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3" style="text-align: center;">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Productos</h6>
                            <p>
                                <span class="text-white">Arena</span>
                            </p>
                            <p>
                                <span class="text-white">Ladrillos</span>
                            </p>
                            <p>
                                <span class="text-white">Cemento</span>
                            </p>
                            <p>
                                <span class="text-white">Celosías</span>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3" style="text-align: center;">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
                            <p><i class="fas fa-home mr-3"></i> Huelva, HU 21005, ES</p>
                            <p><i class="fas fa-envelope mr-3"></i> adrian@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> +34 647 56 72 91</p>
                            <p><i class="fas fa-print mr-3"></i> +34 689 31 76 24</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3" style="text-align: center;">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Síguenos</h6>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Github -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://github.com/addr1Lopez/proyectoPHP/commits/master" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="https://github.com/addr1Lopez">Adrián López Gómez</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/_template.blade.php ENDPATH**/ ?>
<?php if ($_SESSION['rol'] == 'Administrador') {
    echo '<div><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php">&nbsp&nbsp|&nbsp&nbsp&nbspVer Lista Tareas <i class="fa-solid fa-list-check"></i>&nbsp&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/procesarTareasPendientes.php">Ver Lista Tareas Pendientes <i class="fa-solid fa-bars-progress"></i>&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/validar_tarea.php">Insertar tarea <i class="fa-regular fa-calendar-plus"></i>&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/validar_tarea.php">Añadir usuario <i class="fa-solid fa-user-plus"></i>&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/validar_tarea.php">Eliminar usuario <i class="fa-solid fa-user-minus"></i>&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/validar_tarea.php">Listar usuarios <i class="fa-solid fa-users"></i>&nbsp&nbsp|</a></div>';
} else {
    echo '<div><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php">&nbsp&nbsp|&nbsp&nbsp&nbspVer Lista Tareas <i class="fa-solid fa-list-check"></i>&nbsp&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/procesarTareasPendientes.php">Ver Lista Tareas Pendientes <i class="fa-solid fa-bars-progress"></i>&nbsp&nbsp|</a></div>
    <div><a class="navbar-brand" href="/app/controllers/procesarTareasPendientes.php">Editar usuario o clave <i class="fa-solid fa-user-pen"></i>&nbsp&nbsp|</a></div>';
}


 ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto\app\views/menu.blade.php ENDPATH**/ ?>
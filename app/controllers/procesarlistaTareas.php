<?php

    include('../models/clasetarea.php');
    include('../models/bd.php');
    include('../libraries/creaTable.php');

    //$listaTareas = Tarea::getListaTareas();

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','textoDescripcion','correo','direccion','poblacion',
        'codigoPostal','provincias','estado','fechaCreacion','operario_encargado','fechaRealizacion',
        'anotacionesAnt','anotacionesPos', //'fichResumen','fotos'
    ];

     // Preparar

     $tamanioPagina = 1;

     if(isset($_GET['pagina'])){

         if($_GET['pagina'] == 1){

             header('location:procesarListaTareas.php');
         
         }else{
         
             $pagina = $_GET['pagina'];

         }

     }else{

         $pagina = 1;

     }

     
     $empezarDesde = ($pagina-1) * $tamanioPagina;
    //echo "empezardesde: " . $empezarDesde . " pagina: " . $pagina . "<br>";

    $numFilas = Tarea::getNumeroTareas();
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    $registro = Tarea::getTareasPorPagina($empezarDesde, $tamanioPagina);

    include('../views/listaTareas.php');

        for($i = 1; $i <= $totalPaginas; $i++){

            echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
        }
<?php

include('../models/clasetarea.php');

Tarea::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id);

header('location:procesarlistaTareas.php');

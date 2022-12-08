<?php
function getValues($recogida_campos, $value)
{
    $nombre_campos = "";
    $valores = "";

    foreach ($recogida_campos as $valor => $campo) {
        $nombre_campos .= $campo . ',';
        $valores .= $valor . ',';
    }

    $nombre_campos = substr($nombre_campos, 0, -1);
    $valores = substr($valores, 0, -1);

    $camposArray = explode(",", $nombre_campos);

    if ($value) {
        return $valores;
    } else {
        return $camposArray;
    }
}

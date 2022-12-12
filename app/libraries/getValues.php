<?php
/**
 * getValues
 *
 * @param  array $recogida_campos recoge todos los campos con el metodo post
 * @param  boolean $value es un boolean que puede ser true o false según si queremos que devuelva el campo o el valor de la tabla
 * @return boolean devuelve un boolean true o false según si queremos que devuelva el campo o el valor de la tabla
 */
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

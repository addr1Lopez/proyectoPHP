<?php

/**
 * subirArchivo
 *
 * @param  string $fich es un string que indica el campo fichero
 * @param  string $id es un string que indica el id de la tarea
 * @return void no devuelve nada, sube el archivo al directorio
 */
function subirArchivo($fich, $id)
{
    $destino = __DIR__ . "/../../Files/";
    $dest = $destino . "Tarea-" . $id . "-" .  basename($_FILES[$fich]['name']);

    if (is_uploaded_file($_FILES[$fich]['tmp_name'])) {

        move_uploaded_file($_FILES[$fich]['tmp_name'], $dest);
    }
}
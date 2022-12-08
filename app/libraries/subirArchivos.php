<?php

function subirArchivo($fich, $id)
{
    $destino = __DIR__ . "/../../Files/";
    $dest = $destino . "Tarea-" . $id . "-" .  basename($_FILES[$fich]['name']);

    if (is_uploaded_file($_FILES[$fich]['tmp_name'])) {

        move_uploaded_file($_FILES[$fich]['tmp_name'], $dest);
    }
}
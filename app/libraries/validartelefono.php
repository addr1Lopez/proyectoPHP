<?php

/**
 * validarTelefono
 *
 * @param  string $tel es un string que indica un número de teléfono
 * @return boolean devuelve un boolean true o false si el teléfono es válido o no
 */
function validarTelefono($tel)
{
    $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
    if (preg_match("/$a/", $tel)) {
        return true;
    } else {
        return false;
    }
}

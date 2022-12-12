<?php

/**
 * validarCodigoPostal
 *
 * @param  string $cod es un string que indica el codigo postal que queremos validar
 * @return boolean devuelve un boolean true o false según si es válido el codigo postal o no
 */
function validarCodigoPostal($cod)
{
    $a = "^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$";
    if (preg_match("/$a/", $cod)) {
        return true;
    } else {
        return false;
    }
}

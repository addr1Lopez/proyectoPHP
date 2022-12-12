<?php
/**
 * validarCadena
 *
 * @param  string $cadena es un string en el que indicamos la cadena que queremos validar
 * @return boolean devuelve un boolean true o false según si la cadena es válida o no
 */
function validarCadena($cadena)
{
    $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ ]{2,40}+$";
    if (preg_match("/$a/", $cadena)) {
        return true;
    } else {
        return false;
    }
}
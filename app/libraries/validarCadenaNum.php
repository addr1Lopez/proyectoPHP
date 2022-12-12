<?php
/**
 * validarCadenaNum
 *
 * @param  string $cadena es un string en el que indicamos la cadena que queremos validar
 * @return boolean devuelve un boolean true o false según si la cadena es válida o no
 */
function validarCadenaNum($cadena)
{
    $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]{2,300}+$";
    if (preg_match("/$a/", $cadena)) {
        return true;
    } else {
        return false;
    }
}

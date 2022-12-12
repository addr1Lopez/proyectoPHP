<?php

/**
 * validarDni
 *
 * @param  string $dni es un string que indica el dni que queremos validar
 * @return boolean devuelve un boolean true o false según si es válido el dni o no
 */
function validarDni($dni)
{
    $dnisL = substr($dni, 0, -1);
    $letra = substr($dni, -1);
    $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
    $arLista = str_split($lista);

    if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
        $resultado = (int)$dnisL % 23;
        $letraAsign = $arLista[$resultado];
        if ($letra == $letraAsign) {
            return true;
        } else {
            return false;
        }
    }
}

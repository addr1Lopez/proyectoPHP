<?php

/**
 * validarFechaRealizacion
 *
 * @param  string $fecha es un string que indica la fecha
 * @return boolean devuelve un boolean false o true si la fecha es menor o igual que hoy o no
 */
function validarFechaRealizacion($fecha)
{
    $fecha = new DateTime($fecha);
    $hoy = new DateTime();
    if ($fecha <= $hoy) {
        return false;
    } else {
        return true;
    }
}

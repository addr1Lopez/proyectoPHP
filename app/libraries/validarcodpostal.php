<?php

function validarCodigoPostal($cod)
{
    $a = "^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$";
    if (preg_match("/$a/", $cod)) {
        return true;
    } else {
        return false;
    }
}

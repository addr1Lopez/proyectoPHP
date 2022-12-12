<?php

/**
 * validarEmail
 *
 * @param  string $email es un string que indica el email que queremos validar
 * @return int devuelve un int 1 si el patron coincide o 0 si no coincide
 */
function validarEmail($email)
{
    $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
    return preg_match($reg, $email);
}

<?php

/**
 * CreaSelect
 *
 * @param  string $name especifica el nombre del campo select
 * @param  mixed $opciones especifica la funcion que devuelve todos los valores para meterlos en los option
 * @param  string $valorDefecto es el valor por defecto
 * @return string devuelve un string que crea el select
 */

function CreaSelect($name, $opciones, $valorDefecto = '')
{
    $html = "\n" . '<select class="form-select" name="' . $name . '">';
    foreach ($opciones as $value => $text) {
        if ($value == $valorDefecto)
            $select = 'selected="selected"';
        else
            $select = "";
        $html .= "\n\t<option value=\"$value\" $select>$text</option>";
    }
    $html .= "\n</select>";

    return $html;
}
?>
<?php

function creaTable($name, $nombreCampos, $listaValores)
{

    $html = '<table class="table table-bordered name="' . $name . '"><tr><thead>';

    foreach ($nombreCampos as $id => $value) :

        $html .= '<th>' . $nombreCampos[$id] . '</th>';

    endforeach;

    $html .= '</thead></tr>';

    foreach ($listaValores as $valor) :

        $html .= '<tr>';

        foreach ($nombreCampos as $id => $value) :

            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;

        $html .= '<td class="boton"><a href="../views/confirmacion_borrar.php?id=' . $valor['id'] . '">Borrar</a></td>
            <td class="boton"><a href="../controllers/validar_ModificarTarea.php?id=' . $valor['id'] . '">Modificar</a></td>
            <td class="boton"><a href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '">Ver detalles</a></td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
}

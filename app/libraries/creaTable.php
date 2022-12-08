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

        $html .= '<td class="boton"><a class="btn btn-danger" href="../controllers/controladorBorrar.php?id=' . $valor['id'] . '">BORRAR</a></td>
            <td class="boton"><a class="btn btn-warning" href="../controllers/validar_ModificarTarea.php?id=' . $valor['id'] . '">MODIFICAR</a></td>
            <td class="boton"><a class="btn btn-success" href="../controllers/validar_completarTarea.php?id=' . $valor['id'] . '">COMPLETAR</a></td>
            <td class="boton"><a class="btn btn-info" href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '">VER DETALLES</a></td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
}

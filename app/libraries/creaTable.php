<?php

function creaTable($name, $nombrecampos, $nombresFormateados, $listaValores)
{

    $html = '<table class="table table-striped table-hover" name="' . $name . '"><tr><thead class="table table-warning">';

    foreach ($nombresFormateados as $id => $value) :

        $html .= '<th>' . $nombresFormateados[$id] . '</th>';

    endforeach;
    $html .= '<th>ACCIONES</th>';
    $html .= '</thead></tr>';

    foreach ($listaValores as $valor) :

        $html .= '<tr>';

        foreach ($nombrecampos as $id => $value) :

            $html .= '<td>' . $valor[$nombrecampos[$id]] . '</td>';

        endforeach;

        if ($_SESSION['rol'] == 'Administrador') {
            $html .= '<td class="boton"><a class="btn btn-danger" href="../controllers/controladorBorrar.php?id=' . $valor['id'] . '">Borrar <i class="fa-solid fa-trash"></i></a>
            <a class="btn btn-warning" href="../controllers/validar_ModificarTarea.php?id=' . $valor['id'] . '">Modificar <i class="fa-regular fa-pen-to-square"></i></a>
            <a class="btn btn-info" target="_blank" href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '">Ver Detalles <i class="fa-solid fa-eye"></i></a></td></tr>';
        } else {
            $html .= '<td class="boton"><a class="btn btn-success" href="../controllers/validar_completarTarea.php?id=' . $valor['id'] . '">Completar <i class="fa-solid fa-plus"></i></a>
            <a class="btn btn-info" target="_blank" href="../controllers/procesarVerDetalles.php?id=' . $valor['id'] . '">Ver Detalles <i class="fa-solid fa-eye"></i></a></td></tr>';
        }


    endforeach;

    $html .= '</table>';

    return $html;
}

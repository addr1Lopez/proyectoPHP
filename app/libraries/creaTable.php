<?php

function creaTable($name, $nombrecampos, $nombresFormateados, $listaValores, $clavePrimaria)
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

        if ($name == 'listaTareas' || $name == 'listaTareasPendientes') {

            if ($_SESSION['rol'] == 'Administrador') {
                $html .= '<td class="boton"><a class="btn btn-danger" href="../controllers/controladorBorrar.php?id=' . $valor[$clavePrimaria] . '">Borrar <i class="fa-solid fa-trash"></i></a>
            <a class="btn btn-warning" href="../controllers/validar_ModificarTarea.php?id=' . $valor[$clavePrimaria] . '">Modificar <i class="fa-regular fa-pen-to-square"></i></a>
            <a class="btn btn-info" target="_blank" href="../controllers/procesarVerDetalles.php?id=' . $valor[$clavePrimaria] . '">Ver Detalles <i class="fa-solid fa-eye"></i></a></td></tr>';
            } else {
                $html .= '<td class="boton"><a class="btn btn-success" href="../controllers/validar_completarTarea.php?id=' . $valor[$clavePrimaria] . '">Completar <i class="fa-solid fa-plus"></i></a>
            <a class="btn btn-info" target="_blank" href="../controllers/procesarVerDetalles.php?id=' . $valor[$clavePrimaria] . '">Ver Detalles <i class="fa-solid fa-eye"></i></a></td></tr>';
            }
        } else if ($name == 'listaUsuarios') {
            if ($_SESSION['rol'] == 'Administrador') {
                $html .= '<td class="boton"><a class="btn btn-danger" href="../controllers/controladorBorrarUsuario.php?nif=' . $valor[$clavePrimaria] . '">Borrar <i class="fa-solid fa-trash"></i></a>
                <a class="btn btn-warning" href="../controllers/validar_ModificarUsuario.php?nif=' . $valor[$clavePrimaria] . '">Modificar <i class="fa-regular fa-pen-to-square"></i></a></td>';
            }
        }


    endforeach;

    $html .= '</table>';

    return $html;
}

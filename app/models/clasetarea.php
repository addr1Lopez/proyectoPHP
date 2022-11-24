<?php
class Tarea
{
    public function __construct()
    {
    }

    /**
     * Devuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function insertar($nombre_campos, $valores)
    {
        return BD::getInstance()->insertarValores('tareas', $nombre_campos, $valores);
    }
}

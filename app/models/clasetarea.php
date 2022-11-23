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

    static function insertar()
    {
        return BD::getInstance()->getListaSelect('usuario', 'nif', 'nombre', 'where esAdmin = 0');
    }
}
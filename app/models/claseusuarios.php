<?php
class Usuario
{
    public function __construct()
    {
    }

    /**
     * Devuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function listaParaSelect()
    {
        return BD::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'where esAdmin = 0');
    }
}
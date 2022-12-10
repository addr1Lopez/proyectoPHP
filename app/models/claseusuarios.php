<?php
class Usuario
{
    public function __construct()
    {
    }

    static function listaParaSelect()
    {
        return BD::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'where esAdmin = 0');
    }
}
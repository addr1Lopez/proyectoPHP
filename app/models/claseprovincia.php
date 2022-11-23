<?php
class Provincia
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
        return BD::getInstance()->getListaSelect('poblacion', 'codPoblacion', 'nombre');
    }
}

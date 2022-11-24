<?php
class Provincia
{
    public function __construct()
    {
    }

    /* 
    Devuelve la lista de provincias para crear un select cod->nombre
     */

    static function listaParaSelect()
    {
        return BD::getInstance()->getListaSelect('provincias', 'codPoblacion', 'nombre');
    }
}

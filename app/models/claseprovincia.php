<?php
class Provincia
{    
    /**
     * __construct
     *
     * @return void constructor con el que creamos la clase provincia
     */
    public function __construct()
    {
    }
    
    /**
     * listaParaSelect
     *
     * @return void función que devuelve la lista de provincias para crear un select cod->nombre
     */
    static function listaParaSelect()
    {
        return BD::getInstance()->getListaSelect('provincias', 'codPoblacion', 'nombre');
    }
}

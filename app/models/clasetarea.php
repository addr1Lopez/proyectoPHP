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

    static function borrar($id)
    {
        return BD::getInstance()->borrarTarea($id);
    }

    static function modificar($id)
    {
        return BD::getInstance()->modificarTarea($id);
    }


    static function getNumeroTareas(){
           
        return BD::getInstance()->numFilas('tareas');
    }
    
    static function getTareasPorPagina($empezarDesde, $tamanioPagina){
       
        return BD::getInstance()->resultadosPorPagina('tareas', $empezarDesde, $tamanioPagina);
    }    

    static function getDatosTarea($id){
        return BD::getInstance()->getTarea($id);    
    }    
}

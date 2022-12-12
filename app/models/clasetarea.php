<?php
class Tarea
{
    /**
     * __construct
     *
     * @return void constructor con el que creamos la clase tarea
     */
    public function __construct()
    {
    }

    /**
     * insertar
     *
     * @param  array $nombre_campos array que contiene el nombre de los campos de la base de datos
     * @param  array $valores array que contiene los valores de los campos de la base de datos
     * @return void esta función sirve para insertar valores en una tabla 
     */
    static function insertar($nombre_campos, $valores)
    {
        return BD::getInstance()->insertarValores('tareas', $nombre_campos, $valores);
    }

    /**
     * borrar
     *
     * @param  string $id es un string que contiene el id
     * @return void es una funcion que borra el usuario con el nif indicado
     */
    static function borrar($id)
    {
        return BD::getInstance()->borrarTarea($id);
    }

    /**
     * modificar
     *
     * @param  string $id es un string que contiene el id
     * @param  array $nombre_campos array que contiene el nombre de los campos de la base de datos
     * @param  array $valores array que contiene los valores de los campos de la base de datos
     * @return void es una función que sirve para modificar los valores de la tabla tareas
     */
    static function modificar($id, $nombre_campos, $valores)
    {
        return BD::getInstance()->modificarTarea($id, $nombre_campos, $valores);
    }

    /**
     * getNumeroTareas
     *
     * @return int es un int con el numero de filas de la tabla indicada
     */
    static function getNumeroTareas()
    {
        return BD::getInstance()->numFilas('tareas');
    }

    /**
     * getNumeroTareasPendientes
     *
     * @return string devuelve un int con el numero de filas de la tabla (donde el estado sea igual a P)
     */
    static function getNumeroTareasPendientes()
    {
        return BD::getInstance()->numFilasTareasPendientes('tareas');
    }

    /**
     * getTareasPorPagina
     *
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso del listado de tareas)
     */

    static function getTareasPorPagina($empezarDesde, $tamanioPagina)
    {
        return BD::getInstance()->resultadosPorPagina('tareas', $empezarDesde, $tamanioPagina);
    }

    /**
     * getTareasPendientesPorPagina
     *
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso, del listado de tareas pendientes)
     */
    
    static function getTareasPendientesPorPagina($empezarDesde, $tamanioPagina)
    {
        return BD::getInstance()->tareasPendientes('tareas', $empezarDesde, $tamanioPagina);
    }
    
    /**
     * getDatosTarea
     *
     * @param  string $id string que contiene el id de la tarea
      * @return void esta función sirve para obtener una tarea según el id indicado
     */
    static function getDatosTarea($id)
    {
        return BD::getInstance()->getTarea($id);
    }
}

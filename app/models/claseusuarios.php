<?php
class Usuario
{
    /**
     * __construct
     *
     * @return void constructor con el que creamos la clase usuario
     */
    public function __construct()
    {
    }

    /**
     * listaParaSelect
     *
     * @return array esta función sirve para crear un select con los valores de la tabla indicada
     */
    static function listaParaSelect()
    {
        return BD::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'where esAdmin = 0');
    }

    /**
     * getNumeroUsuarios
     *
     * @return int es un int con el numero de filas de la tabla indicada
     */
    static function getNumeroUsuarios()
    {
        return BD::getInstance()->numFilas('usuarios');
    }

    /**
     * getUsuariosPorPagina
     *
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso, del listado de usuarios)
     */
    static function getUsuariosPorPagina($empezarDesde, $tamanioPagina)
    {
        return BD::getInstance()->usuariosPorPagina('usuarios', $empezarDesde, $tamanioPagina);
    }

    /**
     * insertar
     *
     * @param  array $nombre_campos es un array que contiene los nombres de los campos de la tabla
     * @param  array $valores es un array que contiene los valores de los campos de la tabla
     * @return void esta función sirve para insertar valores en una tabla 
     */
    static function insertar($nombre_campos, $valores)
    {
        return BD::getInstance()->insertarValores('usuarios', $nombre_campos, $valores);
    }

    /**
     * borrar
     *
     * @param  string $nif es un string que indica el NIF
     * @return void es una funcion que borra el usuario con el nif indicado
     */
    static function borrar($nif)
    {
        return BD::getInstance()->borrarUsuario($nif);
    }

    /**
     * modificar
     *
     * @param  string $nif es un string que indica el nif del usuario
     * @param  array $campos es un array que indica los nombres de los campos en la base de datos
     * @param  string $valores es un string con los nuevos valores que se van a actualizar
     * @return void es una funcion que actualiza el usuario con el nif, nombre de los campos y sus valores
     */
    static function modificar($nif, $nombre_campos, $valores)
    {
        return BD::getInstance()->modificarUsuario($nif, $nombre_campos, $valores);
    }
    
    /**
     * getDatosUsuario
     *
     * @param  string $nif $correo es un string que indica el NIF
     * @return void obtiene el resultado de una sentencia preparada
     */
    static function getDatosUsuario($nif)
    {
        return BD::getInstance()->getUsuarioPorNIF($nif);
    }
}

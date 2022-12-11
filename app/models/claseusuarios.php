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

    static function getNumeroUsuarios()
    {
        return BD::getInstance()->numFilas('usuarios');
    }

    static function getUsuariosPorPagina($empezarDesde, $tamanioPagina)
    {
        return BD::getInstance()->usuariosPorPagina('usuarios', $empezarDesde, $tamanioPagina);
    }

    static function insertar($nombre_campos, $valores)
    {
        return BD::getInstance()->insertarValores('usuarios', $nombre_campos, $valores);
    }

    static function borrar($nif)
    {
        return BD::getInstance()->borrarUsuario($nif);
    }

    static function modificar($nif, $nombre_campos, $valores)
    {
        return BD::getInstance()->modificarUsuario($nif, $nombre_campos, $valores);
    }

    static function getDatosUsuario($nif)
    {
        return BD::getInstance()->getUsuarioPorNIF($nif);
    }

}
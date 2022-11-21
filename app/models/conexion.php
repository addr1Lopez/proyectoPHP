<?php

/* Clase encargada de gestionar las conexiones a la base de datos */
class Conexion
{
    public $pdo;
    private $stmt;
    static $_instance;

    /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
    private function __construct()
    {
        $this->conectar();
    }

    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone()
    {
    }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getProvincia()
    {
        $myArray = array();
        $this->stmt = $this->pdo->prepare('SELECT codPoblacion,nombre FROM poblacion');
        $this->stmt->execute();
        
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $myArray[$row['codPoblacion']] = $row['nombre'];
        }
        return $myArray;
    }

    public function getOperario()
    {
        $myArray = array();
        $this->stmt = $this->pdo->prepare('SELECT nombre, apellidos FROM usuario WHERE esAdmin="0"');
        $this->stmt->execute();
        
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $myArray[$row['nombre']] = $row['apellidos'];
        }
        return $myArray;
    }

    /*Realiza la conexión a la base de datos.*/
    public function conectar()
    {
        $dsn = 'mysql:dbname=bdproyecto;host=127.0.0.1';
        $usuario = 'root';
        $contraseña = '';

        try {
            $this->pdo = new PDO($dsn, $usuario, $contraseña);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
}

<?php

/* Clase encargada de gestionar las conexiones a la base de datos */
class BD
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

    public function numFilas($tabla){

        $sql = "SELECT * FROM " . $tabla; 

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina){

        //$queryLimite = "SELECT * FROM " . $tabla . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,textoDescripcion,correo,direccion,poblacion,
        codigoPostal,provincias,estado,DATE_FORMAT(fechaCreacion, '%d/%m/%Y') AS fechaCreacion,operario_encargado, DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS fechaRealizacion,
        anotacionesAnt,anotacionesPos,fichResumen,fotos FROM $tabla ORDER BY fechaRealizacion " . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

       /* while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

            $lista = $registro["nombre"] . "<br>";

            }*/


        return $datos;
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

    function getNifUsuario($correo, $contraseña)
    {
        $stmt = $this->pdo->query("SELECT nif FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'");
        return $stmt->fetch();
    }

    function getListaSelect($tabla, $c_idx, $c_value, $condicion = "")
    {
        $this->stmt = $this->pdo->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla . " " . $condicion);
        $this->stmt->execute();

        $lista = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[$row[$c_idx]] = $row[$c_value];
        }
        return $lista;
    }

    function insertarValores($tabla, $listaValues, $campos)
    {
        $cadena = '';
        foreach ($campos as $id => $valor) {
            $cadena .= "'" . $valor . "'";
            if ($id < (count($campos) - 1)) {
                $cadena .= ",";
            }
        }
        $sql = "INSERT INTO " . $tabla . "(" . $listaValues . ") VALUES(" . $cadena . ")";
        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }

    function borrarTarea($id)
    {
        $sql = "DELETE FROM tareas WHERE id='$id'";
        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }

    function getTarea($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM tareas WHERE id = $id");
        return $stmt->fetch();
    }

    function modificarTarea($id) {
        $stmt = $this->pdo->query("UPDATE tareas SET 'id' /*= '' aqui habra que poner 1 a 1 los nuevos valores o hacerlo con un foreach*/,'nif_cif','nombre','apellidos','telefono','textoDescripcion','correo','direccion','poblacion',
        'codigoPostal','provincias','estado','fechaCreacion','operario_encargado','fechaRealizacion',
        'anotacionesAnt','anotacionesPos', 'fichResumen','fotos' WHERE id = $id");
        return $stmt->fetch();
    }
}

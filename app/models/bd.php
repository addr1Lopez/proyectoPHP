<?php

/* Clase encargada de gestionar las conexiones a la base de datos */
class BD
{
    public $pdo;
    private $stmt;
    static $_instance;

       
    /**
     * __construct La función construct es privada para evitar que el objeto pueda ser creado mediante new
     *
     * @return void
     */
    private function __construct()
    {
        $this->conectar();
    }

        
    /**
     * __clone Evitamos el clonaje del objeto. Patrón Singleton
     *
     * @return void
     */
    private function __clone()
    {
    }

    
    /**
     * getInstance Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde 
     * fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos
     *
     * @return object
     */
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    /**
     * getProvincia
     *
     * @return array devuelve un array indexado con el codigo de la poblacion y el nombre 
     */
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
    
    /**
     * getOperario
     *
     * @return array devuelve un array indexado con el nombre y el apellido del usuario 
     */
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
    
    /**
     * numFilas
     *
     * @param  string $tabla es un string que indica la tabla de la base de datos
     * @return int devuelve un int con el numero de filas de la tabla indicada
     */
    public function numFilas($tabla)
    { 

        $sql = "SELECT * FROM " . $tabla;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    
    /**
     * numFilasTareasPendientes
     *
     * @param  string $tabla es un string que indica la tabla de la base de datos
     * @return string devuelve un int con el numero de filas de la tabla (donde el estado sea igual a P)
     */
    public function numFilasTareasPendientes($tabla)
    { 
        $sql = "SELECT * FROM $tabla WHERE estado='P'";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }
    
    /**
     * resultadosPorPagina
     *
     * @param  string $tabla es un string que indica la tabla de la base de datos
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso del listado de tareas)
     */
    public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,textoDescripcion,correo,direccion,poblacion,
        codigoPostal,provincias,estado,DATE_FORMAT(fechaCreacion, '%d/%m/%Y') AS fechaCreacion,operario_encargado, DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS fechaRealizacion,
        anotacionesAnt,anotacionesPos,fichResumen,fotos FROM $tabla ORDER BY fechaRealizacion " . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    
    /**
     * usuariosPorPagina
     *
     * @param  string $tabla es un string que indica la tabla de la base de datos
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso, del listado de usuarios)
     */
    public function usuariosPorPagina($tabla, $empezarDesde, $tamanioPagina)
    {
        $queryLimite = "SELECT * FROM $tabla " . " LIMIT " . $empezarDesde . "," . $tamanioPagina;
        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    
    /**
     * tareasPendientes
     *
     * @param  string $tabla es un string que indica la tabla de la base de datos
     * @param  int $empezarDesde es un int que indica la página desde la que se empieza
     * @param  int $tamanioPagina es un int que indica el tamaño de la página, es decir, las filas que va a tener la página
     * @return array es un array que almacena los resultados de la consulta para paginar los resultados (en este caso, del listado de tareas pendientes)
     */
    public function tareasPendientes($tabla, $empezarDesde, $tamanioPagina)
    { 

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,textoDescripcion,correo,direccion,poblacion,
        codigoPostal,provincias,estado,DATE_FORMAT(fechaCreacion, '%d/%m/%Y') AS fechaCreacion,operario_encargado, DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS fechaRealizacion,
        anotacionesAnt,anotacionesPos,fichResumen,fotos FROM $tabla WHERE estado='P' ORDER BY fechaRealizacion " . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

       
    /**
     * conectar 
     *
     * @return void función con la que realizamos la conexión con PDO a la base de datos.
     */
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
    
    /**
     * getNifUsuario
     *
     * @param  string $correo es un string que indica el correo electrónico
     * @param  string $contraseña es un string que indica la contraseña
     * @return void obtiene el resultado de una sentencia preparada
     */
    function getNifUsuario($correo, $contraseña)
    {
        $stmt = $this->pdo->query("SELECT nif FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'");
        return $stmt->fetch();
    }
    
    /**
     * getUsuario
     *
     * @param  string $correo es un string que indica el correo electrónico
     * @param  string $contraseña es un string que indica la contraseña
     * @return void obtiene el resultado de una sentencia preparada
     */
    function getUsuario($correo, $contraseña)
    {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'");
        return $stmt->fetch();
    }
    
    /**
     * getUsuarioPorNIF
     *
     * @param  string $nif $correo es un string que indica el NIF
     * @return void obtiene el resultado de una sentencia preparada
     */
    function getUsuarioPorNIF($nif)
    {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE nif = '$nif'");
        return $stmt->fetch();
    }
    
    /**
     * borrarUsuario
     *
     * @param  string $nif es un string que indica el NIF
     * @return void es una funcion que borra el usuario con el nif indicado
     */
    function borrarUsuario($nif)
    {
        $sql = "DELETE FROM usuarios WHERE nif='$nif'";
        echo $sql;
        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }
    
    /**
     * modificarUsuario
     *
     * @param  string $nif es un string que indica el nif del usuario
     * @param  array $campos es un array que indica los nombres de los campos en la base de datos
     * @param  string $valores es un string con los nuevos valores que se van a actualizar
     * @return void es una funcion que actualiza el usuario con el nif, nombre de los campos y sus valores
     */
    function modificarUsuario($nif, $campos, $valores)
    {
        $cadena = '';
        
        $arrayValores = explode(",", $valores);

        foreach ($campos as $valor => $contenido) {

            $cadena .= $arrayValores[$valor] . " = '" .  $contenido . "' ,";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "UPDATE usuarios SET " . $cadena . " WHERE nif = '$nif'";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }
    
    /**
     * getListaSelect
     *
     * @param  string $tabla es un string que indica el nombre de la tabla
     * @param  string $c_idx es un string que indica el id
     * @param  string $c_value es un string que indica el valor
     * @param  string $condicion es la condicion que le vamos a poner a la consulta
     * @return array esta función sirve para crear un select con los valores de la tabla indicada
     */
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
    
    /**
     * insertarValores
     *
     * @param  string $tabla es un string que indica el nombre de la tabla
     * @param  array $listaValues es un array que contiene los nombres de los campos de la tabla
     * @param  array $campos es un array que contiene los valores de los campos de la tabla
     * @return void esta función sirve para insertar valores en una tabla 
     */
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
    
    /**
     * borrarTarea
     *
     * @param  string $id es un string que indica el id
     * @return void esta función sirve para borrar una tarea según el id indicado
     */
    function borrarTarea($id)
    {
        $sql = "DELETE FROM tareas WHERE id='$id'";
        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }
    
    /**
     * getTarea
     *
     * @param  string $id es un string que indica el id
     * @return void esta función sirve para obtener una tarea según el id indicado
     */
    function getTarea($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM tareas WHERE id = $id");
        return $stmt->fetch();
    }
        
    /**
     * modificarTarea
     *
     * @param  string $id es un string que indica el id
     * @param  array $campos es un array que contiene los nombres de los campos de la tabla
     * @param  string $valores es un string que contiene los valores de los campos de la tabla
     * @return void es una función que sirve para modificar los valores de la tabla tareas
     */
    function modificarTarea($id, $campos, $valores)
    {
        $cadena = '';
        
        $arrayValores = explode(",", $valores);

        foreach ($campos as $valor => $contenido) {

            $cadena .= $arrayValores[$valor] . " = '" .  $contenido . "' ,";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "UPDATE tareas SET " . $cadena . " WHERE id = $id";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }
}

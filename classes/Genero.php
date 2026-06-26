<?PHP
class Genero
{

    private int $id;
    private string $nombre;

    /**
     * Devuelve el listado completo de generos disponibles
     * @return Genero[] Un array de objetos Generos
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM generos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();
        return $lista;
    }

    /**
     * Devuelve los datos de un genero en particular
     * @param int $idGenero El ID único del genero a mostrar
     * @return ?Genero devuelve un objeto Genero o null     
     */
    public static function genero_x_id(int $idGenero): ?Genero
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM generos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idGenero]);

        $result = $PDOStatement->fetch();

        return $result ? $result : null;
    }

    /**
     * Cuenta la cantidad total de géneros cargados en la base de datos.
     *
     * @return int Devuelve la cantidad total de registros encontrados en la tabla generos.
     */
    public static function cantidad_total(): int
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT COUNT(*) FROM generos";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        return $PDOStatement->fetchColumn();
    }

    /**
     * Inserta un nuevo género en la base de datos
     * @param string $nombre Nombre del género a cargar
     */
    public static function insert(string $nombre)
    {
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO generos (nombre) VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre
        ]);
    }

    /**
     * Edita el nombre de un género existente
     * @param string $nombre Nuevo nombre del género
     */

    public function edit(string $nombre)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE generos 
               SET nombre = :nombre 
               WHERE id = :id";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'id' => $this->id
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM generos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}

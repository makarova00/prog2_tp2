<?PHP
class Genero
{

    private int $id;
    private string $nombre;

    /**
     * Devuelve el listado completo de generos disponibles
     * 
     * @return Genero[] Un array de objetos Generos
     */
    public static function listado_completo(): array
    {
        $ObjetoConexion = new Conexion();
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
     *  
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

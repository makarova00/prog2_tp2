<?PHP
class Musico
{
    private int $id;
    private string $nombre;
    private Artista $artista;

    private static $createValues = ['id', 'nombre'];

    /**
     * Devuelve una instancia del objeto Musico, con todas sus propiedades configuradas
     * @param array $musicoData 
     * @return Musico
     */
    private static function createMusico($musicoData): Musico
    {
        $musico = new self();

        foreach (self::$createValues as $value) {
            $musico->{$value} = $musicoData[$value];
        }

        $musico->artista = Artista::artista_x_id($musicoData['artista_id']);
        return $musico;
    }

    /**
     * Devuelve el listado completo de musicos disponibles
     * @return Musico[] Un array de objetos Musico
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM musicos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $lista = [];

        while ($result = $PDOStatement->fetch()) {
            $lista[] = self::createMusico($result);
        }

        return $lista;
    }

    /**
     * Devuelve los datos de un músico en particular
     * @param int $idMusico 
     * @return ?Musico Devuelve un Musico o NULL
     */
    public static function musico_x_id(int $idMusico): ?Musico
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM musicos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idMusico]);

        $result = self::createMusico($PDOStatement->fetch());
        return $result ?? null;
    }

    /**
     * Inserta un nuevo músico en la base de datos
     * @param string $nombre
     * @param int $artista_id ID del artista al que pertenece el músico
     */
    public static function insert(string $nombre, int $artista_id)
    {
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO musicos (nombre, artista_id) VALUES (:nombre, :artista_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'artista_id' => $artista_id
        ]);
    }
    
    /**
     * Edita los datos del músico actual
     * @param string $nombre 
     * @param mixed $artista_id ID del artista al que pertenece el músico o NULL si no pertenece a ninguno
     */
    public function edit(string $nombre, $artista_id)
    {
        $conexion = Conexion::getConexion();

        $query = "UPDATE musicos 
              SET nombre = :nombre, artista_id = :artista_id
              WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'artista_id' => $artista_id,
            'id' => $this->id
        ]);
    }

    /**
     * Elimina el músico actual de la base de datos.
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();

        $query = "DELETE FROM musicos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Cuenta la cantidad total de músicos cargados en la base de datos.
     * @return int Devuelve la cantidad total de registros encontrados en la tabla musicos.
     */
    public static function cantidad_total(): int
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT COUNT(*) FROM musicos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        return $PDOStatement->fetchColumn();
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

    /**
     * Get the value of artista
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Set the value of artista
     *
     * @return  self
     */
    public function setArtista($artista)
    {
        $this->artista = $artista;

        return $this;
    }
}

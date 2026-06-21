<?PHP
class Musico
{
    private int $id;
    private string $nombre;
    private Artista $artista;

    /**
     * Devuelve todos los músicos que pertenecen a un artista.
     * 
     * @param Artista $artista El artista al que pertenecen los músicos
     * @return Musico[] Un array de objetos Musico
     */
    public static function musicos_x_artista(Artista $artista): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM musicos WHERE artista_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$artista->getId()]);

        $lista = $PDOStatement->fetchAll();

        foreach ($lista as $musico) {
            $musico->setArtista($artista);
        }

        return $lista;
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

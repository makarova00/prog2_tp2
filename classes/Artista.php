<?PHP
class Artista
{
    private int $id;
    private string $nombre_artistico;
    private string $descripcion;
    private string $imagen;
    private string $pais_de_origen;
    private int $ano_de_formacion;

    /**
     * Devuelve el listado completo de artistas disponibles
     * @return Artista[] Un array de objetos Artista
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM artistas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Devuelve los datos de un artista en particular
     * @param int $idArtista El ID único del artista a mostrar
     * @return ?Artista devuelve un objeto Artista o null     
     */
    public static function artista_x_id(int $idArtista): ?Artista
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM artistas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idArtista]);

        $result = $PDOStatement->fetch();
        return $result ?? null;
    }

    /**
     * Inserta un nuevo artista a la base de datos
     * @param string $nombre_artistico
     * @param string $descripcion
     * @param string $imagen
     * @param string $pais_de_origen 
     * @param int $ano_de_formacion
     */
    public static function insert(string $nombre_artistico, string $descripcion, string $imagen, string $pais_de_origen, int $ano_de_formacion)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO artistas (`nombre_artistico`, `descripcion`, `imagen`, `pais_de_origen`, `ano_de_formacion`) 
              VALUES (:nombre_artistico, :descripcion, :imagen, :pais_de_origen, :ano_de_formacion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre_artistico' => $nombre_artistico,
                'descripcion' => $descripcion,
                'imagen' => $imagen,
                'pais_de_origen' => $pais_de_origen,
                'ano_de_formacion' => $ano_de_formacion
            ]
        );
    }

    /**
     * Edita los datos de un personaje en la base de datos
     * @param string $nombre_artistico
     * @param string $descripcion
     * @param string $imagen
     * @param string $pais_de_origen 
     * @param int $ano_de_formacion
     */
    public function edit(string $nombre_artistico, string $descripcion, string $imagen, string $pais_de_origen, int $ano_de_formacion)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE artistas 
              SET nombre_artistico = :nombre_artistico, 
                  descripcion = :descripcion, 
                  imagen = :imagen, 
                  pais_de_origen = :pais_de_origen, 
                  ano_de_formacion = :ano_de_formacion 
              WHERE id = :id";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre_artistico' => $nombre_artistico,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'pais_de_origen' => $pais_de_origen,
            'ano_de_formacion' => $ano_de_formacion,
            'id' => $this->id
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM artistas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Cuenta la cantidad total de artistas cargados en la base de datos
     * @return int Devuelve la cantidad total de registros encontrados en la tabla artistas
     */
    public static function cantidad_total(): int
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT COUNT(*) FROM artistas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        return $PDOStatement->fetchColumn();
    }

    /**
     * Devuelve el artista seleccionado cuando hay un único artista en el filtro
     * @param array $artistasSeleccionados Array con los IDs de los artistas seleccionados
     * @return ?Artista Devuelve un objeto Artista si hay un solo artista seleccionado, o NULL si no hay ninguno o hay más de uno
     */
    public static function artista_seleccionado(array $artistasSeleccionados): ?Artista
    {
        if (count($artistasSeleccionados) == 1) {
            return self::artista_x_id($artistasSeleccionados[0]);
        }

        return null;
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
     * Get the value of nombre_artistico
     */
    public function getNombre_artistico()
    {
        return $this->nombre_artistico;
    }

    /**
     * Set the value of nombre_artistico
     *
     * @return  self
     */
    public function setNombre_artistico($nombre_artistico)
    {
        $this->nombre_artistico = $nombre_artistico;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of pais_de_origen
     */
    public function getPais_de_origen()
    {
        return $this->pais_de_origen;
    }

    /**
     * Set the value of pais_de_origen
     *
     * @return  self
     */
    public function setPais_de_origen($pais_de_origen)
    {
        $this->pais_de_origen = $pais_de_origen;

        return $this;
    }

    /**
     * Get the value of ano_de_formacion
     */
    public function getAno_de_formacion()
    {
        return $this->ano_de_formacion;
    }

    /**
     * Set the value of ano_de_formacion
     *
     * @return  self
     */
    public function setAno_de_formacion($ano_de_formacion)
    {
        $this->ano_de_formacion = $ano_de_formacion;

        return $this;
    }
}

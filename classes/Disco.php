<?PHP
class Disco
{
    private int $id;
    private Artista $artista;
    private string $titulo;
    private string $lanzamiento;
    private string $portada;
    private array $generos;
    private float $precio;
    private static $createValues = ['id', 'titulo', 'lanzamiento', 'portada', 'precio'];

    /**
     * Devuelve una instancia del objeto Disco, con todas sus propiedades configuradas
     * @param array $discoData 
     * @return Disco
     */
    private static function createDisco($discoData): Disco
    {
        $disco = new self();

        foreach (self::$createValues as $value) {
            $disco->{$value} = $discoData[$value];
        }

        $disco->artista = Artista::artista_x_id($discoData['artista_id']);

        $GeneroIds = !empty($discoData['generos']) ? explode(",", $discoData['generos']) : [];

        $generos = [];

        foreach ($GeneroIds as $GeneroId) {
            $generos[] = Genero::genero_x_id($GeneroId);
        }

        $disco->generos = $generos;
        return $disco;
    }

    /**
     * Devuelve el catálgo completo
     * @return Disco[]
     */
    public static function catalogo_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT discos.*, GROUP_CONCAT(dxg.genero_id) AS generos
              FROM discos
              LEFT JOIN discos_x_generos AS dxg ON discos.id = dxg.disco_id
              GROUP BY discos.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
        $catalogo = [];

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createDisco($result);
        }

        return $catalogo;
    }

    /**
     * Devuelve el catálogo completo o filtrado por artistas y géneros.
     * @param array $artistasSeleccionados
     * @param array $generosSeleccionados
     * @return Disco[]
     */
    public static function catalogo_filtrado(array $artistasSeleccionados, array $generosSeleccionados): array
    {
        $catalogo = self::catalogo_completo();

        if (!empty($artistasSeleccionados)) {
            $catalogoFiltrado = [];

            foreach ($catalogo as $disco) {
                if (in_array($disco->getArtista()->getId(), $artistasSeleccionados)) {
                    $catalogoFiltrado[] = $disco;
                }
            }

            $catalogo = $catalogoFiltrado;
        }

        if (!empty($generosSeleccionados)) {
            $catalogoFiltrado = [];

            foreach ($catalogo as $disco) {
                foreach ($disco->getGeneros() as $genero) {
                    if (in_array($genero->getId(), $generosSeleccionados)) {
                        $catalogoFiltrado[] = $disco;
                        break;
                    }
                }
            }

            $catalogo = $catalogoFiltrado;
        }

        return $catalogo;
    }

    /**
     * Devuelve los nombres de los géneros del disco separados por coma.
     * @return string
     */
    public function get_generos_nombres(): string
    {
        $nombresGeneros = [];

        foreach ($this->generos as $genero) {
            $nombresGeneros[] = $genero->getNombre();
        }

        return implode(", ", $nombresGeneros);
    }

    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar
     *  
     * @return ?disco devuelve un objeto disco o null     
     */
    public static function producto_x_id(int $idProducto): ?disco
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT discos.*, GROUP_CONCAT(dxg.genero_id) AS generos
              FROM discos
              LEFT JOIN discos_x_generos AS dxg ON discos.id = dxg.disco_id
              WHERE discos.id = ?
              GROUP BY discos.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idProducto]);

        $result = self::createDisco($PDOStatement->fetch());
        return $result ?? null;
    }

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function precio_formateado(): string
    {
        return "$" . number_format($this->precio, 0, ",", ".");
    }

    /**
     * Inserta un nuevo disco a la base de datos
     * @param int $artista_id
     * @param string $titulo
     * @param string $lanzamiento
     * @param string $portada
     * @param float $precio   
     * @return int El id del disco recién insertado
     */
    public static function insert($artista_id, $titulo, $lanzamiento, $portada, $precio): int
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO disco VALUES (NULL, :artista_id, :titulo, :lanzamiento, :portada, :precio)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'artista_id' => $artista_id,
                'titulo' => $titulo,
                'lanzamiento' => $lanzamiento,
                'portada' => $portada,
                'precio' => $precio,
            ]
        );

        return $conexion->lastInsertId();
    }

    /**
     * Crea un vinculo entre un disco y un genero
     * @param int $disco_id
     * @param int $genero_id
     */
    public static function add_genero(int $disco_id, int $genero_id)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO discos_x_generos VALUES (NULL, :disco_id, :genero_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'disco_id' => $disco_id,
                'genero_id' => $genero_id
            ]
        );
    }

    /**
     * Vaciar lista de generos
     */
    public function clear_generos()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM discos_x_generos WHERE disco_id = :disco_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'disco_id' => $this->id
            ]
        );
    }

    /**
     * Edita los datos de un disco en la base de datos
     * @param int $artista_id
     * @param string $titulo
     * @param string $lanzamiento
     * @param string $portada
     * @param float $precio   
     */
    public function edit($artista_id, $titulo, $lanzamiento, $portada, $precio)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE discos SET
         artista_id = :artista_id,
         titulo = :titulo,
         lanzamiento = :lanzamiento,
         portada = :portada,
         precio = :precio
        WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'artista_id' => $artista_id,
                'titulo' => $titulo,
                'lanzamiento' => $lanzamiento,
                'portada' => $portada,
                'precio' => $precio
            ]
        );
    }

    /**
     * Cuenta la cantidad total de discos cargados en la base de datos
     * @return int Devuelve la cantidad total de registros encontrados en la tabla discos
     */
    public static function cantidad_total(): int
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT COUNT(*) FROM discos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();

        return $PDOStatement->fetchColumn();
    }

    /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM discos WHERE id = ?";

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
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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

    /**
     * Get the value of lanzamiento
     */
    public function getLanzamiento()
    {
        return $this->lanzamiento;
    }

    /**
     * Set the value of lanzamiento
     *
     * @return  self
     */
    public function setLanzamiento($lanzamiento)
    {
        $this->lanzamiento = $lanzamiento;

        return $this;
    }

    /**
     * Get the value of portada
     */
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Set the value of portada
     *
     * @return  self
     */
    public function setPortada($portada)
    {
        $this->portada = $portada;

        return $this;
    }

    /**
     * Get the value of generos
     */
    public function getGeneros()
    {
        return $this->generos;
    }

    /**
     * Set the value of generos
     *
     * @return  self
     */
    public function setGeneros($generos)
    {
        $this->generos = $generos;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
}

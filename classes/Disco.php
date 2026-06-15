<?PHP
class Disco
{

    /*PROPIEDADES*/

    private int $id;
    private int $artista;
    private string $titulo;
    private string $fecha_de_lanzamiento;
    private string $portada;
    private array $generos;
    private float $precio;

    /*MÉTODOS*/

    /**
     * Devuelve el catálgo completo
     * 
     * @return Disco[] Un array de objetos Disco
     */
    public static function catalogo_completo(): array
    {
        $catalogo = [];

        $JSON = file_get_contents('datos/catalogo.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {

            $disco = new self();

            $disco->id = $value->id;
            $disco->artista = $value->artista;
            $disco->titulo = $value->titulo;
            $disco->fecha_de_lanzamiento = $value->fecha_de_lanzamiento;
            $disco->portada = $value->portada;
            $disco->titulo = $value->titulo;
            $disco->generos = $value->generos;
            $disco->precio = $value->precio;

            $catalogo[] = $disco;
        }

        return $catalogo;
    }


    /**
     * Devuelve el catalogo de productos de un artista en particular
     * @param int $artistaID Un int con el id del artista a buscar
     * 
     * @return Disco[] Un Array lleno de instancias de objeto Disco.
     */
    public static function catalogo_x_artista(int $artistaID): array
    {
        $resultado = [];

        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $artista) {
            if ($artista->artista == $artistaID) {
                $resultado[] = $artista;
            }
        }

        return $resultado;
    }


    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar
     *  
     * @return ?disco devuelve un objeto disco o null     
     */
    public static function producto_x_id(int $idProducto): ?disco
    {

        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $c) {
            if ($c->id == $idProducto) {
                return $c;
            }
        }
        return null;
    }

    // /**
    //  * Devuelve el nombre completo de la edición
    //  */
    // public function nombre_completo(): string
    // {

    //     return $this->serie . " Vol." . $this->volumen . " #" . $this->numero . " - " . $this->titulo;
    // }

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function precio_formateado(): string
    {
        return "$" . number_format($this->precio, 0, ',', '.');
    }

    // /**
    //  * Esta método devuelve las primeras x palabras de la bajada 
    //  * 
    //  * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
    //  */
    // public function bajada_reducida(int $cantidad = 10): string
    // {
    //     $texto = $this->bajada;

    //     $array = explode(" ", $texto);
    //     if (count($array) <= $cantidad) {
    //         $resultado = $texto;
    //     } else {
    //         array_splice($array, $cantidad);
    //         $resultado = implode(" ", $array) . "...";
    //     }

    //     return $resultado;
    // }

   

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
     * Get the value of fecha_de_lanzamiento
     */ 
    public function getFecha_de_lanzamiento()
    {
        return $this->fecha_de_lanzamiento;
    }

    /**
     * Set the value of fecha_de_lanzamiento
     *
     * @return  self
     */ 
    public function setFecha_de_lanzamiento($fecha_de_lanzamiento)
    {
        $this->fecha_de_lanzamiento = $fecha_de_lanzamiento;

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

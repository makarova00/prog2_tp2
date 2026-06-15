<?PHP
class Artista
{

     /*PROPIEDADES*/

    private int $id;
    private string $alias;
    private array $miembros;
    private string $descripcion;
    private string $imagen;
    private string $pais_de_origen;
    private int $ano_de_formación;

    /*MÉTODOS*/

    /**
     * Devuelve el listado completo de artistas disponibles
     * 
     * @return Artista[] Un array de objetos Artistas
     */
    public static function listado_completo(): array
    {
        $lista = [];

        $JSON = file_get_contents('datos/artistas.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {

            $artista = new self();

            $artista->id = $value->id;
            $artista->alias = $value->alias;
            $artista->miembros = $value->miembros;
            $artista->descripcion = $value->descripcion;
            $artista->imagen = $value->imagen;
            $artista->pais_de_origen = $value->pais_de_origen;
            $artista->ano_de_formación = $value->ano_de_formación;

            $lista[] = $artista;
        }

        return $lista;
    }


    /**
     * Devuelve los datos de un artista en particular
     * @param int $idArtista El ID único del artista a mostrar
     *  
     * @return ?Artista devuelve un objeto Artista o null     
     */
    public static function artista_x_id(int $idArtista): ?Artista
    {
        $listado = self::listado_completo();

        foreach ($listado as $artista) {
            if ($artista->id == $idArtista) {
                return $artista;
            }
        }

        return null;
    }



    // /**
    //  * Devuelve el titulo del artista
    //  * @param bool $aliasPrimero define si se usa principalmente el alias en vez de el nombre real. De no proveerse se asume false
    //  * 
    //  * @return string El titulo compuesto por el nombre de civil y el alias del artista en la configuracion deseada.
    //  */
    // public function getTitulo(bool $aliasPrimero = FALSE): string
    // {

    //     if ($aliasPrimero) {
    //         $resultado = $this->alias . " (" . $this->nombre . ")";
    //     } else {
    //         $resultado = $this->nombre . " (" . $this->alias . ")";
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
     * Get the value of alias
     */ 
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set the value of alias
     *
     * @return  self
     */ 
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get the value of miembros
     */ 
    public function getMiembros()
    {
        return $this->miembros;
    }

    /**
     * Set the value of miembros
     *
     * @return  self
     */ 
    public function setMiembros($miembros)
    {
        $this->miembros = $miembros;

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
     * Get the value of ano_de_formación
     */ 
    public function getAno_de_formación()
    {
        return $this->ano_de_formación;
    }

    /**
     * Set the value of ano_de_formación
     *
     * @return  self
     */ 
    public function setAno_de_formación($ano_de_formación)
    {
        $this->ano_de_formación = $ano_de_formación;

        return $this;
    }
}

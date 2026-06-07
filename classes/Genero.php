<?PHP
class Genero
{

    private int $id;
    private string $nombre;

    /**
     * Devuelve la lista de géneros disponibles
     * 
     * @return Genero[] Un array de objetos Genero con los datos de los generos
     */
    public static function obtenerGeneros():Array
    {
        $data = file_get_contents('data/generos.json');
        $jsonData = json_decode($data);

        $resultado = [];

        foreach ($jsonData as $g) {
            $genero = new self();

            $genero->id = $g->id;
            $genero->nombre = $g->nombre;

            $resultado[] = $genero;
        }
        return $resultado;
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

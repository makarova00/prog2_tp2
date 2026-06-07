<?PHP
class Vista
{

    private string $nombre;
    private string $titulo;

    /**
     * Valida si la vista solicitada existe en el JSON
     * @param string $pedido el string con el nombre de la vista solicitada
     * 
     * @return Vista un objeto vista con el nombre y título de la vista solicitada, o una vista de error 404 si no se encuentra
     */
    public static function validarVista(string $pedido): Vista
    {
        $data = file_get_contents('data/vistas.json');
        $jsonData = json_decode($data);

        // Se recorre el JSON para encontrar la vista solicitada
        foreach ($jsonData as $v) {
            if ($v->nombre == $pedido) {
                $vista = new self();
                $vista->nombre = $v->nombre;
                $vista->titulo = $v->titulo;
                return $vista;
            }
        }

        // Si no se encuentra la vista, se devuelve una vista de error 404
        $vista = new self();
        $vista->nombre = '404';
        $vista->titulo = '404 - Página no encontrada';

        return $vista;
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
}

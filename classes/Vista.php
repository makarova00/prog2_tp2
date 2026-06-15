<?PHP
class Vista
{
    private string $nombre;
    private string $titulo;

    /**
     * Valida el identificador de una vista y devuelve un objeto con los datos de la misma
     * @param ?string $identificador El identificador de la vista, o null
     *
     * @return Vista devuelve objeto Vista
     */
    public static function validar_vista(?string $identificador)
    {



        //OBTENEMOS TODOS LOS DATOS DE NUESTRO JSON
        $JSON = file_get_contents('datos/vistas.json');
        $vistasData = json_decode($JSON);


        //RECORREMOS EL JSON
        foreach ($vistasData as $vista) {



            //SI SE ECUENTRA UNA VISTA QUE COORDINE CON LA SOLICITADA
            if ($vista->nombre == $identificador) {


                //CHECKEAMOS QUE ESTÉ ACTIVA
                if ($vista->activa) {

                    //CHECKEAMOS QUE NO SEA RESTRINGIDA
                    if ($vista->restringida) {

                        //SI ES RESTRINGIDA, DEVOLVEMOS DATOS 403
                        $vistaNoDisp = new self();

                        $vistaNoDisp->nombre = '403';
                        $vistaNoDisp->titulo = 'Página Restringida';

                        return $vistaNoDisp;
                    } else {
                        //DEVOLVEMOS LOS DATOS DE LA VISTA
                        $objVista = new self();

                        $objVista->nombre = $vista->nombre;
                        $objVista->titulo = $vista->titulo;

                        return $objVista;
                    }
                } else {
                    //DEVOLVEMOS LOS DATOS DE PÁGINA NO DISPONIBLE
                    $vistaNoDisp = new self();

                    $vistaNoDisp->nombre = 'no_disponible';
                    $vistaNoDisp->titulo = 'Página no disponible por el mometo';
                    return $vistaNoDisp;
                }
            }
        }


        //SI NO SE ENCUENTRA, DEVOLVEMOS DATOS DE 404
        $vista404 = new self();

        $vista404->nombre = "404";
        $vista404->titulo = "Página no Econtrada";


        return $vista404;
    }

    public function esHome(): bool
    {
        return $this->nombre === 'home';
    }

    public function sinContenedor(): bool
    {
        return in_array($this->nombre, ['home', 'catalogo_completo']);
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

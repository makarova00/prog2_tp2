<?PHP

class Usuario
{

    private int $id;
    private string $email;
    private string $nombre_usuario;
    private string $nombre_completo;
    private string $password;
    private string $rol;


    /**
     * Encuentra un usuario por su Username
     * @param string $username El nombre de usuario
     * 
     * @return ?Usuario Devuelve un objeto Usuario o Null en caso que no se encuentre
     */
    public static function usuario_x_username(string $username): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$username]);

        $result = $PDOStatement->fetch();


        if (!$result) {
            return null;
        }
        return $result;
    }

    /**
     * Encuentra un usuario por su email
     * @param string $email El email del usuario
     * @return ?Usuario Devuelve un objeto Usuario o Null en caso que no se encuentre
     */
    public static function usuario_x_email(string $email): ?Usuario
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE email = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$email]);

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }

        return $result;
    }

    /**
     * Inserta un nuevo usuario en la base de datos
     * @param string $email
     * @param string $nombre_usuario
     * @param string $nombre_completo
     * @param string $password
     */
    public static function insert(
        string $email,
        string $nombre_usuario,
        string $nombre_completo,
        string $password
    ) {
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO usuarios 
                (email, nombre_usuario, nombre_completo, password, rol)
              VALUES 
                (:email, :nombre_usuario, :nombre_completo, :password, :rol)";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->execute([
            'email' => $email,
            'nombre_usuario' => $nombre_usuario,
            'nombre_completo' => $nombre_completo,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => 'usuario'
        ]);
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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nombre_usuario
     */
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    /**
     * Get the value of nombre_completo
     */
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Set the value of nombre_completo
     *
     * @return  self
     */
    public function setNombre_completo($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
}

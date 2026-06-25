<?PHP

class Autenticacion
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $usuario El nombre de usuario provisto
     * @param string $password El password provisto
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no lo sean y Null en caso que el usuario no se encuentre en la BDD
     */
    public static function log_in(string $usuario, string $password)
    {
        $datosUsuario = Usuario::usuario_x_username($usuario);

        echo "<pre>";
        print_r($datosUsuario);
        echo "</pre>";

        if ($datosUsuario) {
            if (password_verify($password, $datosUsuario->getPassword())) {

                echo "EL PASSWORD ES CORRECTO";
                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();

                $_SESSION['loggedIn'] = $datosLogin;

                return $datosLogin['rol'];
            } else {
                Alerta::add_alerta('danger', "El password ingresado no es correcto.");
                return FALSE;
            }
        } else {
            Alerta::add_alerta('warning', "El usuario ingresado no se encontró en nuestra base de datos.");
            return NULL;
        }
    }


    /**
     * Cierra la sesión del usuario.
     */
    public static function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }


    /**
     * Verifica si el usuario tiene permiso para acceder a una sección.
     * @param int $nivel Nivel de acceso requerido para la sección
     * @return bool Devuelve TRUE si el usuario tiene permiso y FALSE si no lo tiene
     */
    public static function verify($nivel = 0)
    {

        if (!$nivel) { 
            return TRUE; 
        }

        if (isset($_SESSION['loggedIn'])) { 

            if ($nivel > 1) { 

                if (
                    $_SESSION['loggedIn']['rol'] == "admin"
                    or
                    $_SESSION['loggedIn']['rol'] == "superadmin"
                ) {
                    return TRUE; 
                } else {

                    Alerta::add_alerta('danger', "Sus credenciales no tienen permiso para ingresar a esta sección.");
                    header('location: ../admin/index.php?sec=login');
                    return FALSE;
                }
            } else {
                return TRUE;
            }
        } else {



            header("location: index.php?sec=login");
            return FALSE;
        }
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     * @param string $email El email del usuario
     * @param string $nombre_usuario El nombre de usuario elegido
     * @param string $nombre_completo El nombre completo del usuario
     * @param string $password La contraseña ingresada
     * @return bool Devuelve TRUE si el usuario fue registrado y FALSE si el nombre de usuario ya existe
     */
    public static function registrar(
        string $email,
        string $nombre_usuario,
        string $nombre_completo,
        string $password
    ) {
        $usuarioExistente = Usuario::usuario_x_username($nombre_usuario);

        if ($usuarioExistente) {
            Alerta::add_alerta('warning', 'Ese nombre de usuario ya existe.');
            return FALSE;
        }

        $emailExistente = Usuario::usuario_x_email($email);

        if ($emailExistente) {
            Alerta::add_alerta('warning', 'Ese email ya está registrado.');
            return FALSE;
        }

        Usuario::insert($email, $nombre_usuario, $nombre_completo, $password);

        Alerta::add_alerta('success', 'El usuario fue registrado correctamente. Ahora podés iniciar sesión.');
        return TRUE;
    }
}

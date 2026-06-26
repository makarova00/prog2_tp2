<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = Autenticacion::log_in($postData['username'], $postData['pass']);

if ($login) {

    if ($login == "usuario") {
        Alerta::add_alerta('danger', 'No tenés permisos para acceder al panel de administración.');
        header('location: ../index.php?sec=login');
    } else {
        header('location: ../index.php?sec=dashboard');
    }
} else {
    Alerta::add_alerta('danger', 'El nombre de usuario o la contraseña son incorrectos.');
    header('location: ../index.php?sec=login');
}

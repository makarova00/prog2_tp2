<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = Autenticacion::log_in($postData['username'], $postData['pass']);

if ($login) {

    if (isset($_SESSION['redirect_after_login'])) {
        $redirect = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);

        header("location: ../../$redirect");
    } else {

        if ($login == "usuario") {
            header('location: ../../index.php?sec=home');
        } else {
            header('location: ../index.php?sec=dashboard');
        }
    }

} else {
    Alerta::add_alerta('danger', 'El nombre de usuario o la contraseña son incorrectos.');
    header('location: ../index.php?sec=login');
}
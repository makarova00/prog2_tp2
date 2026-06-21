<?PHP

require_once "../../functions/autoload.php";

$email = $_POST['email'];
$nombre_usuario = $_POST['nombre_usuario'];
$nombre_completo = $_POST['nombre_completo'];
$password = $_POST['pass'];

$resultado = Autenticacion::registrar($email, $nombre_usuario, $nombre_completo, $password);

if ($resultado) {
    header('Location: ../../index.php?sec=login');
} else {
    header('Location: ../../index.php?sec=registro');
}
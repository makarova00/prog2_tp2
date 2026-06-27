<?PHP
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? FALSE;
$musico = Musico::musico_x_id($id);

try {
    $musico->delete();

    Alerta::add_alerta('success', 'El músico fue eliminado correctamente.');
} catch (Exception $e) {
    if ($e->getCode() == 23000) {
        Alerta::add_alerta('danger', "El músico no se puede eliminar porque está relacionado con otra entidad.");
    } else {
        Alerta::add_alerta('danger', "El músico no se puede eliminar. Póngase en contacto con servicio técnico.");
    }
}

header('Location: ../index.php?sec=admin_musicos');

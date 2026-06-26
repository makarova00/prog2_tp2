<?PHP
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? FALSE;
$musico = Musico::musico_x_id($id);

try {
    $musico->delete();

    Alerta::add_alerta('success', 'El músico fue eliminado correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo eliminar el músico.');
}

header('Location: ../index.php?sec=admin_musicos');

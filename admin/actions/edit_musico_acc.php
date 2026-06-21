<?PHP
require_once "../../functions/autoload.php";
$postData = $_POST;
$musico = Musico::musico_x_id($postData['id']);

try {
    $musico->edit(
        $postData['nombre'],
        $postData['artista_id']
    );

    Alerta::add_alerta('success', 'El músico fue editado correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo editar el músico.');
}

header('Location: ../index.php?sec=admin_musicos');
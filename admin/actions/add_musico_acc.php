<?PHP
require_once "../../functions/autoload.php";
$postData = $_POST;

try {
    Musico::insert(
        $postData['nombre'],
        $postData['artista_id']
    );

    Alerta::add_alerta('success', 'El músico fue cargado correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo cargar el músico.');
}

header('Location: ../index.php?sec=admin_musicos');

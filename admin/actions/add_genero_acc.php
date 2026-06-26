<?PHP

require_once "../../functions/autoload.php";

$postData = $_POST;

try {
    Genero::insert($postData['nombre']);

    Alerta::add_alerta('success', 'El género fue cargado correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo cargar el género.');
}

header('Location: ../index.php?sec=admin_generos');

<?PHP

require_once "../../functions/autoload.php";

$postData = $_POST;

$id = $postData['id'];
$nombre = $postData['nombre'];

$genero = Genero::genero_x_id($id);

try {
    if ($genero) {
        $genero->edit($nombre);

        Alerta::add_alerta('success', 'El género fue editado correctamente.');
    }
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo editar el género.');
}

header('Location: ../index.php?sec=admin_generos');

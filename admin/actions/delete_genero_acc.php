<?PHP

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$genero = Genero::genero_x_id($id);

try {
    $genero->delete();
} catch (Exception $e) {

    die("No se pudo eliminar el Género =(");
}

header('Location: ../index.php?sec=admin_generos');

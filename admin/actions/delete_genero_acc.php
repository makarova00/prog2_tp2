<?PHP

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $genero = Genero::genero_x_id($id);
    $genero->delete();
    Alerta::add_alerta('success', "El género " . $genero->getNombre() . " se eliminó correctamente");

} catch (Exception $e) {

    if ($e->getCode() == 23000) {
        Alerta::add_alerta('danger', "El género no se puede eliminar porque está relacionado con uno o más discos. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El género no se puede eliminar. Póngase en contacto con servicio técnico.");
    }
}

header('Location: ../index.php?sec=admin_generos');
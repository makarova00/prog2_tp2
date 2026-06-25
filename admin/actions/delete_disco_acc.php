<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $disco = Disco::producto_x_id($id);
    Imagen::borrarImagen("../../img/covers/" . $disco->getPortada());
    $disco->clear_generos();
    $disco->delete();

    Alerta::add_alerta('success', "El disco " . $disco->getTitulo() . " se eliminó correctamente");

} catch (Exception $e) {

    if ($e->getCode() == 23000) {
        Alerta::add_alerta('danger', "El disco no se puede eliminar porque está relacionado con otra entidad. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El disco no se puede eliminar. Póngase en contacto con servicio técnico.");
    }
}

header('Location: ../index.php?sec=admin_discos');
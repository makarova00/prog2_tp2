<?PHP
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? FALSE;

try {

    $artista = Artista::artista_x_id($id);
    $artista->delete();

    if (!empty($artista->getImagen())) {
        Imagen::borrarImagen("../../img/artistas/" . $artista->getImagen());
    }

    Alerta::add_alerta('success', "El artista " . $artista->getNombre_artistico() . " se eliminó correctamente");
} catch (Exception $e) {

    if ($e->getCode() == 23000) {
        Alerta::add_alerta('danger', "El artista no se puede eliminar porque está relacionado con otra entidad. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El artista no se puede eliminar. Póngase en contacto con servicio técnico.");
    }
}

header('Location: ../index.php?sec=admin_artistas');

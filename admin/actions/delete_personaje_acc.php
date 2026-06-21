<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $personaje = Personaje::get_x_id($id);

    echo "<pre>";
    print_r($personaje);
    echo "</pre>";
    $personaje->delete();

    if (!empty($personaje->getImagen())) {
        Imagen::borrarImagen("../../img/personajes/" . $personaje->getImagen());
    }
    Alerta::add_alerta('danger', "El personaje " . $personaje->getTitulo() . " se eliminó correctamente");
} catch (Exception $e) {

    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    // die("No se pudo eliminar el personaje =(");

    if ($e->getCode()  == 23000) {
        Alerta::add_alerta('danger', "El personaje no se puede eliminar porque esta en una relación con otra entidad. Elimine la relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El personaje no se puede eliminar pongase en contacto con servicio técnico");
    }
}
header('Location: ../index.php?sec=admin_personajes');

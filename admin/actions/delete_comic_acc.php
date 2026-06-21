<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;


try {
    $comic = Comic::producto_x_id($id);

    Imagen::borrarImagen("../../img/covers/" . $comic->getPortada());
    $comic->clear_personajes_sec();
    $comic->delete();  
}catch (Exception $e) {

     die("No se pudo eliminar el Comic =(");
}

header('Location: ../index.php?sec=admin_comics');
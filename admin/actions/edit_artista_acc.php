<?PHP

require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

try {

    $artista = Artista::artista_x_id($id);

    if (!empty($fileData['tmp_name'])) {
        
        $imagen = Imagen::subirImagen("../../img/artistas", $fileData);
        Imagen::borrarImagen("../../img/artistas/" . $postData['imagen_og']);

    } else {
        $imagen = $postData['imagen_og'];
    }

    $artista->edit(
        $postData['nombre_artistico'],
        $postData['descripcion'],
        $imagen,
        $postData['pais_de_origen'],
        $postData['ano_de_formacion']
    );

    Alerta::add_alerta('success', "El artista " . $artista->getNombre_artistico() . " se editó correctamente");

} catch (Exception $e) {

    Alerta::add_alerta('danger', "El artista no se pudo editar. Póngase en contacto con servicio técnico.");
}

header('Location: ../index.php?sec=admin_artistas');
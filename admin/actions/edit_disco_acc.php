<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;

try {
    $disco = Disco::producto_x_id($id);

    $disco->clear_generos();

    if (isset($postData['generos'])) {
        foreach ($postData['generos'] as $genero_id) {
            Disco::add_genero($id, $genero_id);
        }
    }

    if (!empty($fileData['tmp_name'])) {
        $portada = Imagen::subirImagen("../../img/covers", $fileData);
        Imagen::borrarImagen("../../img/covers/" . $postData['portada_og']);
    } else {
        $portada = $postData['portada_og'];
    }

    $disco->edit(
        $postData['artista_id'],
        $postData['titulo'],
        $postData['lanzamiento'],
        $portada,
        $postData['precio']
    );

    Alerta::add_alerta('success', "El disco " . $postData['titulo'] . " se editó correctamente");

} catch (Exception $e) {

    Alerta::add_alerta('danger', "El disco no se pudo editar. Póngase en contacto con servicio técnico.");
}

header('Location: ../index.php?sec=admin_discos');
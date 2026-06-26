<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['portada'];

try {

    $portada = Imagen::subirImagen("../../img/covers", $datosArchivo);

    $disco_id = Disco::insert(
        $postData['artista_id'],
        $postData['titulo'],
        $postData['lanzamiento'],
        $portada,
        $postData['descripcion'],
        $postData['precio']
    );

    if (isset($postData['generos'])) {
        foreach ($postData['generos'] as $genero_id) {
            Disco::add_genero($disco_id, $genero_id);
        }
    }

    Alerta::add_alerta('success', "El disco " . $postData['titulo'] . " se cargó correctamente");
} catch (Exception $e) {

    Alerta::add_alerta('danger', "El disco no se pudo cargar. Póngase en contacto con servicio técnico.");
}

header('Location: ../index.php?sec=admin_discos');

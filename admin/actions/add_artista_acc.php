<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {
    $imagen = Imagen::subirImagen("../../img/artistas", $datosArchivo);

    Artista::insert(
        $postData['nombre_artistico'],
        $postData['descripcion'],
        $imagen,
        $postData['pais_de_origen'],
        $postData['ano_de_formacion']
    );

    Alerta::add_alerta('success', 'El artista fue cargado correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo cargar el artista.');
}

header('Location: ../index.php?sec=admin_artistas');

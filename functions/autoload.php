<?PHP
session_start();

/**
 * Carga automáticamente una clase desde la carpeta classes
 * @param string $nombreClase
 */
function autoloadClasses($nombreClase)
{

    $archivoClase = __DIR__ . "/../classes/$nombreClase.php";

    if (file_exists($archivoClase)) {
        require_once $archivoClase;
    } else {
        die("No se pudo cargar la clase: $nombreClase");
    }
}

spl_autoload_register('autoloadClasses');
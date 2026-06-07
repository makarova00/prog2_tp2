<?PHP

/**
 * Devuelve el catálgo completo
 * 
 * @return array Un array con todos los productos en stock
 */
function catalogo_completo(): array
{
    $JSON = file_get_contents('datos/catalogo.json');
    $JSONData = json_decode($JSON, TRUE);

    return $JSONData;
}


/**
 * Devuelve el catalogo de productos de un artista en particular * 
 * @param string $idArtista El ID del artista a buscar
 * 
 * @return array Un Array lleno de productos.
 */
function catalogo_x_artista(int $idArtista): array
{

    $resultado = [];

    $catalogo = catalogo_completo();

    foreach ($catalogo as $disco) {
        if ($disco['artista'] == $idArtista) {
            $resultado[] = $disco;
        }
    }

    return $resultado;
}


/**
 * Devuelve los datos de un producto en particular
 * @param int $idProducto El ID único del producto a mostrar 
 * 
 * @return mixed Un array con los datos del producto encontrado o null en caso que no se encuentre niguno.
 */
function producto_x_id(int $idProducto): mixed
{

    $catalogo = catalogo_completo();
    foreach ($catalogo as $comic) {
        if ($comic['id'] == $idProducto) {
            return $comic;
        }
    }
    return null;
}

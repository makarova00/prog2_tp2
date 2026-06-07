<?php


/**
 * Devuelve el listado completo de artistas disponibles
 * 
 * @return array Un array de artistas
 */
function listado_completo(): array
{
    $JSON = file_get_contents('datos/artistas.json');
    $JSONData = json_decode($JSON, TRUE);

    return $JSONData;
}

/**
 * Devuelve los datos de un artista en particular
 * @param int $idArtista El ID único del artista a mostrar
 *  
 * @return array devuelve un array con los datos de un artista o null     
 */
function artista_x_id(int $idArtista): mixed
{

    $lista = listado_completo();

    foreach ($lista as $artista) {
        if ($artista['id'] == $idArtista) {
            return $artista;
        }
    }

    return null;
}

/**
 * Devuelve el nombre y el alias del artista, formateado correctamente
 * 
 *  @param int $idArtista El ID único del artista a nombrar
 * 
 * @return string El valor correspondiente al nombre y alias del artista
 */
function nombre_del_artista(int $idArtista): string
{

    $artista = artista_x_id($idArtista);

    $resultado = $artista['alias'] . " (" . $artista['nombre'] . ")";

    return $resultado;
}

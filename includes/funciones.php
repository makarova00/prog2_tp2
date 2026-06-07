<?PHP

/**
 * Esta función devuelve las primeras x palabras de un párrafo.
 * @param string $texto Este es el párrafo a reducir.
 * @param int $cantidad Esta es la cantidad de plabras a extraer. Este valor es opcional, de no existir se asumirá 10.
 * 
 * @return string La cantidad de palabras solicitadas con un elipsis (...) concatenado al final, en caso de ser necesario. 
 * 
 */
function recortar_palabras(string $texto, int $cantidad = 10): string
{
    $coleccionDePalabras = explode(" ", $texto);



    if (count($coleccionDePalabras) <= $cantidad) {
        return $texto;
    } else {
        $palabrasRecortadas = array_slice($coleccionDePalabras, 0, $cantidad);

        $resultado = implode(" ", $palabrasRecortadas) . "...";

        return $resultado;
    }
}

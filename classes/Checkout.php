<?PHP
class Checkout
{

    /**
     * Inserta los datos de una compra en la BBDD
     * @param array $datosCompra Array con los datos de la compra
     * @param array $detailsData Array con los productos incluidos en la compra
     */
    public static function insert_checkout_data(array $datosCompra, array $detailsData)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO compras VALUES (NULL, :id_usuario, :fecha, :importe)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_usuario" => $datosCompra['id_usuario'],
            "fecha" => $datosCompra['fecha'],
            "importe" => $datosCompra['importe']
        ]);


        $isertedID = $conexion->lastInsertId();

        foreach ($detailsData as $id => $cantidad) {
            $query = "INSERT INTO item_x_compra VALUES (NULL, :id_compra, :id_disco, :cantidad)";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_compra" => $isertedID,
                "id_disco" => $id,
                "cantidad" => $cantidad
            ]);
        }
    }
}

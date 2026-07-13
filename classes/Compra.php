<?PHP

class Compra
{

    /**
     * Devuelve los discos de un usuario en particular
     * @param int $idUsuario El ID del usuario a mostrar
     */
    public static function compras_x_idUsuario(int $idUsuario): array
    {
        $conexion = Conexion::getConexion();

        $query = "
    SELECT 
        compras.id,
        compras.fecha,
        compras.importe,
        GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x ', discos.titulo) SEPARATOR ', ') AS detalle
    FROM compras
    JOIN item_x_compra ON compras.id = item_x_compra.compra_id
    JOIN discos ON item_x_compra.item_id = discos.id
    WHERE compras.id_usuario = ?
    GROUP BY compras.id, compras.fecha, compras.importe;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idUsuario]);

        $result = $PDOStatement->fetchAll();

        return $result ?? [];
    }
}

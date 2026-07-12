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
        discos.id, 
        discos.fecha, 
        GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x ' ,disco.titulo) SEPARATOR ', ') detalle 
        
        FROM discos 
        JOIN item_x_compra ON discos.id = item_x_compra.compra_id 
        JOIN discos ON item_x_compra.item_id = disco.id 
        
        WHERE discos.id_usuario = ? 
        GROUP BY (disco.id);";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idUsuario]);

        $result = $PDOStatement->fetchAll();

        return $result ?? [];
    }
}

<?PHP
$items = Carrito::get_carrito();
?>

<section class="carrito-section">

    <div class="carrito-contenido">

        <h1>Carrito de compras</h1>

        <?PHP if (count($items)) { ?>

            <form action="admin/actions/update_items_acc.php" method="POST">

                <div class="carrito-tabla-box">
                    <table class="carrito-tabla">

                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Datos del producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP foreach ($items as $id => $item) { ?>
                                <tr>
                                    <td>
                                        <a href="index.php?sec=producto&id=<?= $id ?>" class="carrito-link-img">
                                            <img src="img/covers/<?= $item['portada'] ?>" alt="Imagen ilustrativa de <?= $item['producto'] ?>" class="carrito-img">
                                        </a>
                                    </td>

                                    <td>
                                        <h2><?= $item['producto'] ?></h2>
                                    </td>

                                    <td>
                                        <label for="q_<?= $id ?>" class="visually-hidden">Cantidad</label>
                                        <input
                                            type="number"
                                            class="carrito-input"
                                            value="<?= $item['cantidad'] ?>"
                                            id="q_<?= $id ?>"
                                            name="q[<?= $id ?>]">
                                    </td>

                                    <td class="carrito-precio">
                                        $<?= number_format($item['precio'], 2, ",", ".") ?>
                                    </td>

                                    <td class="carrito-precio">
                                        $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?>
                                    </td>

                                    <td>
                                        <a href="admin/actions/remove_item_acc.php?id=<?= $id ?>" class="carrito-btn carrito-btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?PHP } ?>

                            <tr class="carrito-total-row">
                                <td colspan="4">Total:</td>
                                <td class="carrito-total">
                                    $<?= number_format(Carrito::precio_total(), 2, ",", ".") ?>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="carrito-acciones">
                    <input type="submit" value="Actualizar Cantidades" class="carrito-btn carrito-btn-acento">
                    <a href="index.php?sec=catalogo_completo" class="carrito-btn carrito-btn-outline">Seguir comprando</a>
                    <a href="admin/actions/clear_items_acc.php" class="carrito-btn carrito-btn-danger">Vaciar Carrito</a>
                    <a href="index.php?sec=finalizar_pago" class="carrito-btn carrito-btn-final">Finalizar Compra</a>
                </div>

            </form>

        <?PHP } else { ?>

            <div class="carrito-vacio">
                <i class="bi bi-cart-x"></i>
                <h2>Su carrito está vacío</h2>
                <p>Podés volver al catálogo para elegir algún disco.</p>
                <a href="index.php?sec=catalogo_completo" class="carrito-btn carrito-btn-acento">Ver catálogo</a>
            </div>

        <?PHP } ?>

    </div>

</section>
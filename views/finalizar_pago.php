<?PHP
$items = Carrito::get_carrito();
?>

<section class="checkout-section">

    <div class="checkout-contenido">

        <h1>Finalizar pago</h1>

        <div class="checkout-box">

            <section class="checkout-usuario">
                <h2>Datos de usuario</h2>
                <p>
                    <strong>Nombre de usuario:</strong>
                    <?= $_SESSION['loggedIn']['nombre_completo'] ?>
                </p>
            </section>

            <section class="checkout-resumen">

                <h2>Resumen de compra</h2>

                <div class="checkout-tabla-box">
                    <table class="checkout-tabla">

                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP foreach ($items as $key => $item) { ?>
                                <tr>
                                    <td>
                                        <h3><?= $item['producto'] ?></h3>
                                    </td>

                                    <td>
                                        <?= $item['cantidad'] ?>
                                    </td>

                                    <td class="checkout-precio">
                                        $<?= number_format($item['precio'], 2, ",", ".") ?>
                                    </td>

                                    <td class="checkout-precio">
                                        $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?>
                                    </td>
                                </tr>
                            <?PHP } ?>

                            <tr class="checkout-total-row">
                                <td colspan="3">Total:</td>
                                <td class="checkout-total">
                                    $<?= number_format(Carrito::precio_total(), 2, ",", ".") ?>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </section>

            <div class="checkout-acciones">
                <a href="index.php?sec=carrito" class="checkout-btn checkout-btn-outline">
                    Volver al carrito
                </a>

                <a href="admin/actions/checkout_acc.php" class="checkout-btn checkout-btn-acento">
                    Pagar
                </a>
            </div>

        </div>

    </div>

</section>
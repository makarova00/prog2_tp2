<?PHP
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;
$compras = Compra::compras_x_idUsuario($userID);
?>

<section class="panel-usuario-section">

    <div class="panel-usuario-contenido">

        <h1>Panel de usuario</h1>

        <div class="panel-usuario-box">

            <?= Alerta::get_alertas(); ?>

            <div class="panel-usuario-header">
                <h2>Historial de compras</h2>
                <p>Acá podés consultar las compras realizadas con tu usuario.</p>
            </div>

            <?PHP if (count($compras)) { ?>

                <div class="panel-usuario-tabla-box">
                    <table class="panel-usuario-tabla">

                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP foreach ($compras as $C) { ?>
                                <tr>
                                    <td class="panel-usuario-fecha">
                                        <?= $C['fecha'] ?>
                                    </td>

                                    <td>
                                        <?= $C['detalle'] ?>
                                    </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>

                    </table>
                </div>

            <?PHP } else { ?>

                <div class="panel-usuario-vacio">
                    <i class="bi bi-bag-x"></i>
                    <h2>No hay compras registradas</h2>
                    <p>Todavía no realizaste ninguna compra.</p>
                    <a href="index.php?sec=catalogo_completo" class="panel-usuario-btn">
                        Ver catálogo
                    </a>
                </div>

            <?PHP } ?>

        </div>

    </div>

</section>
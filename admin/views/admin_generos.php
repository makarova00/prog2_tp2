<?PHP
$generos = Genero::listado_completo();

$editID = $_GET['edit'] ?? FALSE;
$add = $_GET['add'] ?? FALSE;
?>

<section class="admin-page">

    <div class="admin-page-header">
        <h1>Administración de Géneros</h1>
        <p>Desde esta sección podés agregar, editar y eliminar géneros musicales.</p>
    </div>

    <div>
        <?= Alerta::get_alertas(); ?>
    </div>

    <div class="admin-table-box">

        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?PHP foreach ($generos as $g) { ?>
                    <tr>
                        <td><?= $g->getNombre() ?></td>

                        <td>
                            <div class="admin-actions">
                                <a href="index.php?sec=admin_generos&edit=<?= $g->getId() ?>#editar-genero-<?= $g->getId() ?>" class="admin-btn admin-btn-edit">
                                    Editar
                                </a>

                                <a href="index.php?sec=delete_genero&id=<?= $g->getId() ?>" class="admin-btn admin-btn-delete">
                                    Eliminar
                                </a>
                            </div>
                        </td>
                    </tr>

                    <?PHP if ($editID == $g->getId()) { ?>
                        <tr class="admin-form-row" id="editar-genero-<?= $g->getId() ?>">
                            <td colspan="2">
                                <form action="actions/edit_genero_acc.php" method="POST" class="admin-row-form">
                                    <input type="hidden" name="id" value="<?= $g->getId() ?>">

                                    <div class="admin-form-content">
                                        <div class="admin-form-field">
                                            <label for="nombre_<?= $g->getId() ?>">Editar género</label>
                                            <input
                                                type="text"
                                                id="nombre_<?= $g->getId() ?>"
                                                name="nombre"
                                                value="<?= $g->getNombre() ?>"
                                                class="admin-input"
                                                required>
                                        </div>

                                        <div class="admin-actions">
                                            <button type="submit" class="admin-btn admin-btn-save">
                                                Guardar
                                            </button>

                                            <a href="index.php?sec=admin_generos" class="admin-btn admin-btn-cancel">
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?PHP } ?>
                <?PHP } ?>

                <?PHP if ($add) { ?>
                    <tr class="admin-form-row" id="nuevo-genero">
                        <td colspan="2">
                            <form action="actions/add_genero_acc.php" method="POST" class="admin-row-form">

                                <div class="admin-form-content">
                                    <div class="admin-form-field">
                                        <label for="nuevo_genero">Nuevo género</label>
                                        <input
                                            type="text"
                                            id="nuevo_genero"
                                            name="nombre"
                                            class="admin-input"
                                            placeholder="Nombre del nuevo género"
                                            required>
                                    </div>

                                    <div class="admin-actions">
                                        <button type="submit" class="admin-btn admin-btn-save">
                                            Agregar
                                        </button>

                                        <a href="index.php?sec=admin_generos" class="admin-btn admin-btn-cancel">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>

    </div>

    <?PHP if (!$add) { ?>
        <div class="admin-add-box">
            <a href="index.php?sec=admin_generos&add=1#nuevo-genero" class="admin-btn-add">
                + Cargar nuevo género
            </a>
        </div>
    <?PHP } ?>

</section>
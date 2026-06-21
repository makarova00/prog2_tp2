<?PHP
$musicos = Musico::listado_completo();
$artistas = Artista::listado_completo();

$editID = $_GET['edit'] ?? FALSE;
$add = $_GET['add'] ?? FALSE;
?>

<section class="admin-page">

    <div class="admin-page-header">
        <h1>Administración de Músicos</h1>
        <p>Desde esta sección podés agregar, editar y eliminar músicos.</p>
    </div>

    <div>
        <?= Alerta::get_alertas(); ?>
    </div>

    <div class="admin-table-box">

        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Artista / Grupo</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?PHP foreach ($musicos as $m) { ?>
                    <tr>
                        <td><?= $m->getNombre() ?></td>

                        <td>
                            <?= $m->getArtista()->getNombre_artistico() ?>
                        </td>

                        <td>
                            <div class="admin-actions">
                                <a href="index.php?sec=admin_musicos&edit=<?= $m->getId() ?>#editar-musico-<?= $m->getId() ?>" class="admin-btn admin-btn-edit">
                                    Editar
                                </a>

                                <a href="index.php?sec=delete_musico&id=<?= $m->getId() ?>" class="admin-btn admin-btn-delete">
                                    Eliminar
                                </a>
                            </div>
                        </td>
                    </tr>

                    <?PHP if ($editID == $m->getId()) { ?>
                        <tr class="admin-form-row" id="editar-musico-<?= $m->getId() ?>">
                            <td colspan="3">
                                <form action="actions/edit_musico_acc.php" method="POST" class="admin-row-form">
                                    <input type="hidden" name="id" value="<?= $m->getId() ?>">

                                    <div class="admin-form-content">

                                        <div class="admin-form-field">
                                            <label for="nombre_<?= $m->getId() ?>">Editar músico</label>

                                            <input
                                                type="text"
                                                id="nombre_<?= $m->getId() ?>"
                                                name="nombre"
                                                value="<?= $m->getNombre() ?>"
                                                class="admin-input"
                                                required>
                                        </div>

                                        <div class="admin-form-field">
                                            <label for="artista_<?= $m->getId() ?>">Artista / Grupo</label>

                                            <select name="artista_id" id="artista_<?= $m->getId() ?>" class="admin-input" required>
                                                <option value="" disabled>Elija una opción</option>

                                                <?PHP foreach ($artistas as $a) { ?>
                                                    <option
                                                        value="<?= $a->getId() ?>"
                                                        <?= $m->getArtista()->getId() == $a->getId() ? "selected" : "" ?>>
                                                        <?= $a->getNombre_artistico() ?>
                                                    </option>
                                                <?PHP } ?>
                                            </select>
                                        </div>

                                        <div class="admin-actions">
                                            <button type="submit" class="admin-btn admin-btn-save">
                                                Guardar
                                            </button>

                                            <a href="index.php?sec=admin_musicos" class="admin-btn admin-btn-cancel">
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
                    <tr class="admin-form-row" id="nuevo-musico">
                        <td colspan="3">
                            <form action="actions/add_musico_acc.php" method="POST" class="admin-row-form">

                                <div class="admin-form-content">

                                    <div class="admin-form-field">
                                        <label for="nuevo_musico">Nuevo músico</label>

                                        <input
                                            type="text"
                                            id="nuevo_musico"
                                            name="nombre"
                                            class="admin-input"
                                            placeholder="Nombre del músico"
                                            required>
                                    </div>

                                    <div class="admin-form-field">
                                        <label for="nuevo_artista">Artista / Grupo</label>

                                        <select name="artista_id" id="nuevo_artista" class="admin-input" required>
                                            <option value="" selected disabled>Elija una opción</option>

                                            <?PHP foreach ($artistas as $a) { ?>
                                                <option value="<?= $a->getId() ?>">
                                                    <?= $a->getNombre_artistico() ?>
                                                </option>
                                            <?PHP } ?>
                                        </select>
                                    </div>

                                    <div class="admin-actions">
                                        <button type="submit" class="admin-btn admin-btn-save">
                                            Agregar
                                        </button>

                                        <a href="index.php?sec=admin_musicos" class="admin-btn admin-btn-cancel">
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
            <a href="index.php?sec=admin_musicos&add=1#nuevo-musico" class="admin-btn-add">
                + Cargar nuevo músico
            </a>
        </div>
    <?PHP } ?>

</section>
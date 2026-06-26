<?PHP
$id = $_GET['id'] ?? FALSE;

$disco = Disco::producto_x_id($id);
$artistas = Artista::listado_completo();
$generos = Genero::listado_completo();
$generosSeleccionados = $disco->getGeneros();
?>

<section class="admin-page">

    <div class="admin-page-header">
        <h1>Editar disco</h1>
        <p>Modificá los datos de <?= $disco->getTitulo() ?>.</p>
    </div>

    <div class="admin-form-box">

        <form action="actions/edit_disco_acc.php?id=<?= $disco->getId() ?>" method="POST" enctype="multipart/form-data" class="admin-page-form">

            <div class="admin-form-field">
                <label for="artista_id">Artista</label>

                <select id="artista_id" name="artista_id" class="admin-input" required>
                    <option value="" disabled>Elija una opción</option>

                    <?PHP foreach ($artistas as $artista) { ?>
                        <option
                            value="<?= $artista->getId() ?>"
                            <?PHP if ($disco->getArtista()->getId() == $artista->getId()) { ?>
                            selected
                            <?PHP } ?>>
                            <?= $artista->getNombre_artistico() ?>
                        </option>
                    <?PHP } ?>
                </select>
            </div>

            <div class="admin-form-field">
                <label for="titulo">Título</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="admin-input"
                    value="<?= $disco->getTitulo() ?>"
                    required>
            </div>

            <div class="admin-form-field">
                <label for="lanzamiento">Lanzamiento</label>
                <input
                    type="date"
                    id="lanzamiento"
                    name="lanzamiento"
                    class="admin-input"
                    value="<?= $disco->getLanzamiento() ?>"
                    required>
            </div>

            <div class="admin-form-field">
                <label for="descripcion">Descripción</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="admin-input admin-textarea"
                    required><?= $disco->getDescripcion() ?></textarea>
            </div>

            <div class="admin-form-field">
                <label for="precio">Precio</label>
                <input
                    type="number"
                    id="precio"
                    name="precio"
                    class="admin-input"
                    value="<?= $disco->getPrecio() ?>"
                    required>
            </div>

            <div class="admin-form-field">
                <label>Portada actual</label>

                <img
                    src="../img/covers/<?= $disco->getPortada() ?>"
                    alt="Portada de <?= $disco->getTitulo() ?>"
                    class="admin-form-img">

                <input type="hidden" name="portada_og" value="<?= $disco->getPortada() ?>">
            </div>

            <div class="admin-form-field">
                <label for="portada">Reemplazar portada</label>
                <input type="file" id="portada" name="portada" class="admin-input">
            </div>

            <div class="admin-form-field">
                <label>Géneros</label>

                <?PHP foreach ($generos as $genero) { ?>

                    <?PHP
                    $checked = "";

                    foreach ($disco->getGeneros() as $generoDelDisco) {
                        if ($generoDelDisco->getId() == $genero->getId()) {
                            $checked = "checked";
                        }
                    }
                    ?>

                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="generos[]"
                            value="<?= $genero->getId() ?>"
                            id="genero_<?= $genero->getId() ?>"
                            <?= $checked ?>>

                        <label class="form-check-label" for="genero_<?= $genero->getId() ?>">
                            <?= $genero->getNombre() ?>
                        </label>
                    </div>

                <?PHP } ?>
            </div>

            <div class="admin-actions admin-actions-center">
                <button type="submit" class="admin-btn admin-btn-save">
                    Guardar
                </button>

                <a href="index.php?sec=admin_discos" class="admin-btn admin-btn-cancel">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</section>
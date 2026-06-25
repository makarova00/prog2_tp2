<?PHP
$artistas = Artista::listado_completo();
$generos = Genero::listado_completo();
?>

<section class="admin-page">

    <div class="admin-page-header">
        <h1>Cargar nuevo disco</h1>
        <p>Completá los datos para agregar un disco al catálogo.</p>
    </div>

    <div class="admin-form-box">

        <form action="actions/add_disco_acc.php" method="POST" enctype="multipart/form-data" class="admin-page-form">

            <div class="admin-form-field">
                <label for="artista_id">Artista</label>

                <select id="artista_id" name="artista_id" class="admin-input" required>
                    <option value="" selected disabled>Elija una opción</option>

                    <?PHP foreach ($artistas as $artista) { ?>
                        <option value="<?= $artista->getId() ?>">
                            <?= $artista->getNombre_artistico() ?>
                        </option>
                    <?PHP } ?>
                </select>
            </div>

            <div class="admin-form-field">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" class="admin-input" required>
            </div>

            <div class="admin-form-field">
                <label for="lanzamiento">Lanzamiento</label>
                <input type="date" id="lanzamiento" name="lanzamiento" class="admin-input" required>
            </div>

            <div class="admin-form-field">
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" class="admin-input" required>
            </div>

            <div class="admin-form-field">
                <label for="portada">Portada</label>
                <input type="file" id="portada" name="portada" class="admin-input" required>
            </div>

            <div class="admin-form-field">
                <label>Géneros</label>

                <?PHP foreach ($generos as $genero) { ?>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="generos[]" 
                            value="<?= $genero->getId() ?>" 
                            id="genero_<?= $genero->getId() ?>">

                        <label class="form-check-label" for="genero_<?= $genero->getId() ?>">
                            <?= $genero->getNombre() ?>
                        </label>
                    </div>
                <?PHP } ?>
            </div>

            <div class="admin-actions admin-actions-center">
                <button type="submit" class="admin-btn admin-btn-save">
                    Cargar
                </button>

                <a href="index.php?sec=admin_discos" class="admin-btn admin-btn-cancel">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</section>
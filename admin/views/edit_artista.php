<?PHP
$id = $_GET['id'] ?? FALSE;
$artista = Artista::artista_x_id($id);
?>

<section class="admin-page">

    <div class="admin-page-header">
        <h1>Editar artista</h1>
        <p>Modificá los datos de <?= $artista->getNombre_artistico() ?>.</p>
    </div>

    <div class="admin-form-box">

        <form action="actions/edit_artista_acc.php?id=<?= $artista->getId() ?>" method="POST" enctype="multipart/form-data" class="admin-page-form">

            <div class="admin-form-field">
                <label for="nombre_artistico">Nombre artístico</label>
                <input 
                    type="text" 
                    id="nombre_artistico" 
                    name="nombre_artistico" 
                    class="admin-input" 
                    value="<?= $artista->getNombre_artistico() ?>" 
                    required>
            </div>

            <div class="admin-form-field">
                <label for="pais_de_origen">País de origen</label>

                <select id="pais_de_origen" name="pais_de_origen" class="admin-input" required>
                    <option value="" disabled>Elija una opción</option>

                    <option value="Estados Unidos" <?= $artista->getPais_de_origen() == "Estados Unidos" ? "selected" : "" ?>>
                        Estados Unidos
                    </option>

                    <option value="Reino Unido" <?= $artista->getPais_de_origen() == "Reino Unido" ? "selected" : "" ?>>
                        Reino Unido
                    </option>

                    <option value="Argentina" <?= $artista->getPais_de_origen() == "Argentina" ? "selected" : "" ?>>
                        Argentina
                    </option>

                    <option value="Italia" <?= $artista->getPais_de_origen() == "Italia" ? "selected" : "" ?>>
                        Italia
                    </option>

                     <option value="España" <?= $artista->getPais_de_origen() == "España" ? "selected" : "" ?>>
                        España
                    </option>
                </select>
            </div>

            <div class="admin-form-field">
                <label for="ano_de_formacion">Año de formación</label>
                <input 
                    type="number" 
                    id="ano_de_formacion" 
                    name="ano_de_formacion" 
                    class="admin-input" 
                    value="<?= $artista->getAno_de_formacion() ?>" 
                    required>
                <div class="form-text">Ingresar el año con 4 dígitos.</div>
            </div>

            <div class="admin-form-field">
                <label>Imagen actual</label>

                <img 
                    src="../img/artistas/<?= $artista->getImagen() ?>" 
                    alt="Imagen de <?= $artista->getNombre_artistico() ?>" 
                    class="admin-form-img">

                <input type="hidden" name="imagen_og" value="<?= $artista->getImagen() ?>">
            </div>

            <div class="admin-form-field">
                <label for="imagen">Reemplazar imagen</label>
                <input 
                    type="file" 
                    id="imagen" 
                    name="imagen" 
                    class="admin-input">
            </div>

            <div class="admin-form-field">
                <label for="descripcion">Descripción</label>
                <textarea 
                    id="descripcion" 
                    name="descripcion" 
                    class="admin-input admin-textarea" 
                    required><?= $artista->getDescripcion() ?></textarea>
            </div>

            <div class="admin-actions admin-actions-center">
                <button type="submit" class="admin-btn admin-btn-save">
                    Guardar
                </button>

                <a href="index.php?sec=admin_artistas" class="admin-btn admin-btn-cancel">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</section>
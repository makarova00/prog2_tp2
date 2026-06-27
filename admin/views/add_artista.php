<section class="admin-page">

    <div class="admin-page-header">
        <h1>Cargar nuevo artista</h1>
        <p>Completá los datos para agregar un artista al catálogo.</p>
    </div>

    <div class="admin-form-box">

        <form action="actions/add_artista_acc.php" method="POST" enctype="multipart/form-data" class="admin-page-form">

            <div class="admin-form-field">
                <label for="nombre_artistico">Nombre artístico</label>
                <input
                    type="text"
                    id="nombre_artistico"
                    name="nombre_artistico"
                    class="admin-input"
                    required>
            </div>

            <div class="admin-form-field">
                <label for="pais_de_origen">País de origen</label>

                <select id="pais_de_origen" name="pais_de_origen" class="admin-input" required>
                    <option value="" selected disabled>Elija una opción</option>
                    <option value="Estados Unidos">Estados Unidos</option>
                    <option value="Reino Unido">Reino Unido</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Italia">Italia</option>
                    <option value="España">España</option>
                </select>
            </div>

            <div class="admin-form-field">
                <label for="ano_de_formacion">Año de formación</label>
                <input
                    type="number"
                    id="ano_de_formacion"
                    name="ano_de_formacion"
                    class="admin-input"
                    required>
                <div class="form-text">Ingresar el año con 4 dígitos.</div>
            </div>

            <div class="admin-form-field">
                <label for="imagen">Imagen</label>
                <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    class="admin-input"
                    required>
            </div>

            <div class="admin-form-field">
                <label for="descripcion">Descripción</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="admin-input admin-textarea"
                    required></textarea>
            </div>

            <div class="admin-actions admin-actions-center">
                <button type="submit" class="admin-btn admin-btn-save">
                    Cargar
                </button>

                <a href="index.php?sec=admin_artistas" class="admin-btn admin-btn-cancel">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</section>
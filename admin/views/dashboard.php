<section class="dashboard">

    <h1>Panel de administración</h1>

    <p>Desde esta sección podés administrar el contenido principal de El Salón del Disco.</p>

    <div class="admin-resumen">

        <a href="index.php?sec=admin_discos" class="admin-card">
            <span class="admin-numero"><?= Disco::cantidad_total(); ?></span>
            <p>Discos cargados</p>
        </a>

        <a href="index.php?sec=admin_artistas" class="admin-card">
            <span class="admin-numero"><?= Artista::cantidad_total(); ?></span>
            <p>Artistas cargados</p>
        </a>

        <a href="index.php?sec=admin_musicos" class="admin-card">
            <span class="admin-numero"><?= Musico::cantidad_total(); ?></span>
            <p>Músicos cargados</p>
        </a>

        <a href="index.php?sec=admin_generos" class="admin-card">
            <span class="admin-numero"><?= Genero::cantidad_total(); ?></span>
            <p>Géneros cargados</p>
        </a>

    </div>

</section>
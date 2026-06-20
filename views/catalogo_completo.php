<?PHP
$artistasSeleccionados = $_GET['artistas'] ?? [];
$generosSeleccionados = $_GET['generos'] ?? [];

$catalogo = Disco::catalogo_completo();
$artistas = Artista::listado_completo();

$artistaActual = count($artistasSeleccionados) === 1
    ? Artista::artista_x_id((int)$artistasSeleccionados[0])
    : null;

$generosDisponibles = [];

foreach ($catalogo as $disco) {
    foreach ($disco->getGeneros() as $genero) {
        $generosDisponibles[] = $genero->getNombre();
    }
}

$generosDisponibles = array_unique($generosDisponibles);
sort($generosDisponibles);

if (!empty($artistasSeleccionados)) {
    $catalogo = array_filter($catalogo, function ($disco) use ($artistasSeleccionados) {
        return in_array($disco->getArtista()->getId(), $artistasSeleccionados);
    });
}

if (!empty($generosSeleccionados)) {
    $catalogo = array_filter($catalogo, function ($disco) use ($generosSeleccionados) {
        $generosDelDisco = [];

        foreach ($disco->getGeneros() as $genero) {
            $generosDelDisco[] = $genero->getNombre();
        }

        return !empty(array_intersect($generosSeleccionados, $generosDelDisco));
    });
}
?>

<?PHP if ($artistaActual && $artistaActual->getImagen()) { ?>
    <section class="artist-hero" style="background-image: url('img/artistas/<?= $artistaActual->getImagen() ?>');">
        <div class="artist-hero-content">
            <p class="artist-descripcion">
                <?= $artistaActual->getDescripcion() ?>
            </p>
        </div>
    </section>
<?PHP } ?>

<div class="container-fluid px-4 py-5 catalogo-section">
    <h1 class="text-center mb-5">
        <?PHP if ($artistaActual) { ?>
            CATÁLOGO DE <?= strtoupper($artistaActual->getNombre_artistico()) ?>
        <?PHP } else { ?>
            CATÁLOGO
        <?PHP } ?>
    </h1>

    <div class="row">

        <aside class="col-12 col-lg-2 mb-4">
            <form action="index.php" method="GET">
                <input type="hidden" name="sec" value="catalogo_completo">

                <h2 class="fs-5 mb-3">Artistas</h2>

                <?PHP foreach ($artistas as $artista) { ?>
                    <div class="form-check text-light mb-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="artistas[]"
                            value="<?= $artista->getId() ?>"
                            id="artista-<?= $artista->getId() ?>"
                            <?= in_array($artista->getId(), $artistasSeleccionados) ? 'checked' : '' ?>>

                        <label class="form-check-label" for="artista-<?= $artista->getId() ?>">
                            <?= $artista->getNombre_artistico() ?>
                        </label>
                    </div>
                <?PHP } ?>

                <h2 class="fs-5 mt-4 mb-3">Géneros</h2>

                <?PHP foreach ($generosDisponibles as $genero) { ?>
                    <div class="form-check text-light mb-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="generos[]"
                            value="<?= $genero ?>"
                            id="genero-<?= strtolower(str_replace(' ', '-', $genero)) ?>"
                            <?= in_array($genero, $generosSeleccionados) ? 'checked' : '' ?>>

                        <label class="form-check-label" for="genero-<?= strtolower(str_replace(' ', '-', $genero)) ?>">
                            <?= $genero ?>
                        </label>
                    </div>
                <?PHP } ?>

                <button type="submit" class="btn btn-outline-light w-100 mt-3">
                    Filtrar
                </button>

                <a href="index.php?sec=catalogo_completo" class="btn btn-light w-100 mt-2">
                    Limpiar
                </a>
            </form>

        </aside>

        <section class="col-12 col-lg-10">
            <div class="row g-4">


                <?php if (empty($catalogo)) { ?>
                    <div class="no-resultados">
                        <div class="no-resultados-content">
                            <div class="no-resultados-icon">🎵</div>

                            <p class="no-resultados-text">
                                No hay discos que coincidan con los filtros seleccionados.
                            </p>

                            <p class="no-resultados-subtext">
                                Probá cambiando o eliminando algunos filtros.
                            </p>
                        </div>
                    </div>
                <?php } else { ?>
                    <?PHP foreach ($catalogo as $disco) { ?>
                        <?PHP $artista = Artista::artista_x_id($disco->getArtista()->getId()); ?>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="album-card">
                                <div class="album-cover">
                                    <img src="img/covers/<?= $disco->getPortada() ?>" alt="Portada del álbum '<?= $disco->getTitulo() ?>'">
                                </div>

                                <div class="album-info">
                                    <h2 class="album-title"><?= strtoupper($disco->getTitulo()) ?></h2>

                                    <p class="album-artist">
                                        <?= strtoupper($artista->getNombre_artistico()) ?>
                                    </p>

                                    <p class="album-meta">
                                        <span class="fw-bold">Géneros:</span>
                                        <?PHP
                                        $nombresGeneros = [];

                                        foreach ($disco->getGeneros() as $genero) {
                                            $nombresGeneros[] = $genero->getNombre();
                                        }

                                        echo implode(", ", $nombresGeneros);
                                        ?>
                                    </p>

                                    <p class="album-meta">
                                        <span class="fw-bold">Lanzamiento:</span>
                                        <?= $disco->getLanzamiento() ?>
                                    </p>

                                    <div class="album-footer">
                                        <span class="album-price"><?= $disco->getPrecio() ?></span>
                                        <a href="#" class="album-btn">VER MÁS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?PHP } ?>
                <?PHP } ?>
            </div>
        </section>
    </div>
</div>
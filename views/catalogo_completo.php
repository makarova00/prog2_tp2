<?PHP

$artistasSeleccionados = $_GET['artistas'] ?? [];
$generosSeleccionados = $_GET['generos'] ?? [];

$catalogo = Disco::catalogo_filtrado($artistasSeleccionados, $generosSeleccionados);

$artistas = Artista::listado_completo();
$generosDisponibles = Genero::listado_completo();

$artistaSeleccionado = Artista::artista_seleccionado($artistasSeleccionados);

?>

<?PHP if ($artistaSeleccionado && $artistaSeleccionado->getImagen()) { ?>
    <section class="artist-hero" style="background-image: url('img/artistas/<?= $artistaSeleccionado->getImagen() ?>');">
        <div class="artist-hero-content">
            <p class="artist-descripcion">
                <?= $artistaSeleccionado->getDescripcion() ?>
            </p>
        </div>
    </section>
<?PHP } ?>

<div class="container-fluid px-4 py-5 catalogo-section">

    <h1 class="text-center mb-5">
        <?PHP if ($artistaSeleccionado) { ?>
            CATÁLOGO DE <?= strtoupper($artistaSeleccionado->getNombre_artistico()) ?>
        <?PHP } else { ?>
            CATÁLOGO
        <?PHP } ?>
    </h1>

    <div class="row">

        <aside class="col-12 col-lg-2 mb-4 filtros-catalogo">

            <button
                class="filtros-toggle d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#filtrosCatalogo"
                aria-expanded="false"
                aria-controls="filtrosCatalogo">
                + Filtros
            </button>

            <div class="collapse d-lg-block" id="filtrosCatalogo">

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
                                <?PHP if (in_array($artista->getId(), $artistasSeleccionados)) { ?>
                                checked
                                <?PHP } ?>>

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
                                value="<?= $genero->getId() ?>"
                                id="genero-<?= $genero->getId() ?>"
                                <?PHP if (in_array($genero->getId(), $generosSeleccionados)) { ?>
                                checked
                                <?PHP } ?>>

                            <label class="form-check-label" for="genero-<?= $genero->getId() ?>">
                                <?= $genero->getNombre() ?>
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

            </div>

        </aside>

        <section class="col-12 col-lg-10">

            <div class="row g-4">

                <?PHP if (empty($catalogo)) { ?>

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

                <?PHP } else { ?>

                    <?PHP foreach ($catalogo as $disco) { ?>

                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">

                            <div class="album-card">

                                <div class="album-cover">
                                    <img src="img/covers/<?= $disco->getPortada() ?>" alt="Portada del álbum <?= $disco->getTitulo() ?>">
                                </div>

                                <div class="album-info">

                                    <h2 class="album-title">
                                        <?= strtoupper($disco->getTitulo()) ?>
                                    </h2>

                                    <p class="album-artist">
                                        <a href="index.php?sec=catalogo_completo&artistas[]=<?= $disco->getArtista()->getId() ?>" class="producto-artista-link">
                                            <?= strtoupper($disco->getArtista()->getNombre_artistico()) ?>
                                        </a>
                                    </p>

                                    <p class="album-meta">
                                        <span class="fw-bold">Géneros:</span>
                                        <?= $disco->get_generos_nombres() ?>
                                    </p>

                                    <p class="album-descripcion">
                                        <?= $disco->descripcion_reducida() ?>
                                    </p>

                                    <div class="album-footer">
                                        <span class="album-price">
                                            <?= $disco->precio_formateado() ?>
                                        </span>

                                        <a href="index.php?sec=producto&id=<?= $disco->getId() ?>" class="album-btn">
                                            VER MÁS
                                        </a>
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
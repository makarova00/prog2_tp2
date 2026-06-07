<?PHP
$catalogo = catalogo_completo();
?>

<div class="container-fluid px-4 py-5 catalogo-section">
    <h1 class="text-center mb-5">CATÁLOGO</h1>

    <div class="row g-4">
        <?PHP foreach ($catalogo as $disco) { ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="album-card">
                    <div class="album-cover">
                        <img src="img/covers/<?= $disco['portada'] ?>" alt="Portada del álbum '<?= $disco['titulo'] ?>'">
                    </div>

                    <div class="album-info">
                        <h2 class="album-title"><?= strtoupper($disco['titulo']) ?></h2>
                        <p class="album-artist"><?= strtoupper(artista_x_id($disco['artista'])['alias']) ?></p>

                        <p class="album-meta">
                            <span class="fw-bold">Géneros:</span>
                            <?= implode(", ", $disco['generos']) ?>
                        </p>

                        <p class="album-meta">
                            <span class="fw-bold">Lanzamiento:</span>
                            <?= $disco['fecha_de_lanzamiento'] ?>
                        </p>

                        <div class="album-footer">
                            <span class="album-price">$<?= $disco['precio'] ?></span>
                            <a href="#" class="album-btn">COMPRAR</a>
                        </div>
                    </div>
                </div>
            </div>
        <?PHP } ?>
    </div>
</div>
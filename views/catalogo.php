<?PHP
$artistaSeleccionado = $_GET['artista'] ?? null;
$catalogo = catalogo_x_artista($artistaSeleccionado);
$datosArtista = artista_x_id($artistaSeleccionado);
?>
<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">CATÁLOGO DE <span><?= strtoupper(nombre_del_artista($artistaSeleccionado)) ?></span></h1>
        <div class="container">

            <div class="row">

                <div class="row">
                    <?PHP if (!empty($catalogo)) { ?>
                        <?PHP foreach ($catalogo as $disco) { ?>

                            <div class="col-12 col-md-4">
                                <div class="card mb-3">
                                    <img src="img/covers/<?= $disco['portada'] ?>" class="card-img-top" alt="Portada de <?= $disco['serie'] ?> Vol.<?= $disco['volumen'] ?> #<?= $disco['numero'] ?>">
                                    <div class="card-body">
                                        <p class="fs-6 m-0 fw-bold text-danger"><?= $disco['serie'] ?> Vol.<?= $disco['volumen'] ?> #<?= $disco['numero'] ?></p>
                                        <h2 class="card-title"><?= $disco['titulo'] ?></h2>
                                        <p class="card-text"><?= recortar_palabras($disco['bajada'], 20) ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">Guion:</span> <?= $disco['guion'] ?></li>
                                        <li class="list-group-item"><span class="fw-bold">Fecha de lanzamiento:</span> <?= $disco['fecha_de_lanzamiento'] ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $disco['precio'] ?></div>
                                        <a href="index.php?sec=producto&id=<?= $disco['id'] ?>" class="btn btn-danger w-100 fw-bold">VER MÁS</a>
                                    </div>

                                </div>
                            </div>
                        <?PHP } ?>

                    <?PHP } else { ?>
                        <div class="col">
                            <h2 class="text-center m-5">No tenenemos discos de este artistasonaje.</h2>
                        </div>
                    <?PHP } ?>
                </div>
            </div>
        </div>
    </div>
</div>
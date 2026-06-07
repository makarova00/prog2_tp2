
<?PHP
$id = $_GET['id'] ?? 0;

$comic = producto_x_id($id);


?>

<div class="container">

    <div class="row">

        <?PHP if (!empty($comic)) { ?>
            <div class="col">
                <h1 class="text-center my-5"> <?= $comic['serie']; ?> Vol.<?= $comic['volumen']; ?> #<?= $comic['numero']; ?></h1>
                <div class="card mb-5">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="img/covers/<?= $comic['portada']; ?>" class="img-fluid rounded-start border-end" alt="Portada de <?= $comic['serie']; ?> Vol.<?= $comic['volumen']; ?> #<?= $comic['numero']; ?>">
                        </div>
                        <div class="col-md-7 d-flex flex-column p-3">
                            <div class="card-body flex-grow-0">
                                <p class="fs-4 m-0 fw-bold text-danger"><?= $comic['serie']; ?> Vol.<?= $comic['volumen']; ?> #<?= $comic['numero']; ?></p>
                                <h2 class="card-title fs-2 mb-4"><?= $comic['titulo']; ?></h2>
                                <p class="card-text"><?= $comic['bajada'] ?></p>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="fw-bold">Guion:</span> <?= $comic['guion']; ?></li>
                                <li class="list-group-item"><span class="fw-bold">Arte:</span> <?= $comic['arte']; ?></li>
                                <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $comic['publicacion']; ?></li>
                            </ul>

                            <div class="card-body flex-grow-0 mt-auto">
                                <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= number_format($comic['precio'], 2, ",", "."); ?></div>
                                <a href="#" class="btn btn-danger w-100 fw-bold">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>

<?PHP } else { ?>
    <div class="col">
        <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
    </div>
<?PHP } ?>
</div>
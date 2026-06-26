<?PHP
$id = $_GET['id'] ?? 0;

$disco = Disco::producto_x_id($id);
?>

<div class="producto-detalle container-fluid px-4 py-5">

    <?PHP if (!empty($disco)) { ?>
        <?PHP
        $artista = $disco->getArtista();
        ?>

        <div class="container">
            <a href="index.php?sec=catalogo_completo" class="volver-catalogo">
                ← Volver al catálogo
            </a>

            <div class="row producto-card mt-4">

                <div class="col-12 col-md-6 producto-img-box">
                    <img
                        src="img/covers/<?= $disco->getPortada() ?>"
                        class="producto-img"
                        alt="Portada del álbum <?= $disco->getTitulo() ?>">
                </div>

                <div class="col-12 col-md-6 producto-info">
                    <p class="producto-artista">
                        <a href="index.php?sec=catalogo_completo&artistas[]=<?= $artista->getId() ?>" class="producto-artista-link">
                            <?= strtoupper($artista->getNombre_artistico()) ?>
                        </a>
                    </p>
                    <h1 class="producto-titulo">
                        <?= strtoupper($disco->getTitulo()) ?>
                    </h1>

                    <p class="producto-meta">
                        <span>Géneros:</span> <?= $disco->get_generos_nombres() ?>
                    </p>

                    <p class="producto-meta">
                        <span>Lanzamiento:</span> <?= $disco->getLanzamiento() ?>
                    </p>

                    <p class="producto-meta">
                        <span>País de origen:</span> <?= $artista->getPais_de_origen() ?>
                    </p>

                    <p class="producto-meta">
                        <span>Año de formación:</span> <?= $artista->getAno_de_formacion() ?>
                    </p>

                    <p class="producto-descripcion">
                        <?= $disco->getDescripcion() ?>
                    </p>

                    <div class="producto-compra">
                        <div class="producto-precio">
                            <?= $disco->precio_formateado() ?>
                        </div>

                        <form action="admin/actions/add_item_acc.php" method="GET" class="producto-form">
                            <div class="cantidad-box">
                                <label for="q">Cantidad:</label>
                                <input type="number" class="form-control" value="1" name="q" id="q" min="1">
                            </div>

                            <input type="hidden" value="<?= $id ?>" name="id">

                            <input type="submit" value="AGREGAR A CARRITO" class="producto-btn">
                        </form>
                    </div>
                </div>

            </div>
        </div>

    <?PHP } else { ?>

        <div class="container text-center py-5">
            <h2>No se encontró el producto deseado.</h2>
            <a href="index.php?sec=catalogo_completo" class="btn btn-light mt-3">
                Volver al catálogo
            </a>
        </div>

    <?PHP } ?>

</div>
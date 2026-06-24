<?PHP
$id = $_GET['id'] ?? FALSE;
$artista = Artista::artista_x_id($id);
?>

<section class="admin-page delete-page">

    <div class="admin-page-header">
        <h1>¿Está seguro que desea eliminar este artista?</h1>
        <p>Esta acción no se puede deshacer.</p>
    </div>

    <div class="admin-delete-box">

        <p class="delete-label">Artista seleccionado</p>

        <img
            src="../img/artistas/<?= $artista->getImagen() ?>"
            alt="Imagen de <?= $artista->getNombre_artistico() ?>"
            class="admin-delete-img">

        <h2><?= $artista->getNombre_artistico() ?></h2>

        <p class="delete-extra">
            <?= $artista->getPais_de_origen() ?> · <?= $artista->getAno_de_formacion() ?>
        </p>

        <div class="admin-actions admin-actions-center">
            <a href="actions/delete_artista_acc.php?id=<?= $artista->getId() ?>" class="admin-btn admin-btn-delete">
                Eliminar
            </a>

            <a href="index.php?sec=admin_artistas" class="admin-btn admin-btn-cancel">
                Cancelar
            </a>
        </div>

    </div>

</section>
<?PHP
$id = $_GET['id'] ?? FALSE;
$disco = Disco::producto_x_id($id);
?>

<section class="admin-page delete-page">

    <div class="admin-page-header">
        <h1>¿Está seguro que desea eliminar este disco?</h1>
        <p>Esta acción no se puede deshacer.</p>
    </div>

    <div class="admin-delete-box">

        <p class="delete-label">Disco seleccionado</p>

        <img 
            src="../img/covers/<?= $disco->getPortada() ?>" 
            alt="Portada de <?= $disco->getTitulo() ?>" 
            class="admin-delete-img">

        <h2><?= $disco->getTitulo() ?></h2>

        <p class="delete-extra">
            <?= $disco->getArtista()->getNombre_artistico() ?> · <?= $disco->getLanzamiento() ?>
        </p>

        <div class="admin-actions admin-actions-center">
            <a href="actions/delete_disco_acc.php?id=<?= $disco->getId() ?>" class="admin-btn admin-btn-delete">
                Eliminar
            </a>

            <a href="index.php?sec=admin_discos" class="admin-btn admin-btn-cancel">
                Cancelar
            </a>
        </div>

    </div>

</section>
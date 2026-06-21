<?PHP
$id = $_GET['id'] ?? FALSE;
$musico = Musico::musico_x_id($id);
?>

<section class="admin-page delete-page">

    <div class="admin-page-header">
        <h1>¿Está seguro que desea eliminar este músico?</h1>
        <p>Esta acción no se puede deshacer.</p>
    </div>

    <div class="admin-delete-box">

        <p class="delete-label">Músico seleccionado</p>

        <h2><?= $musico->getNombre() ?></h2>

        <p class="delete-extra">
            <?= $musico->getArtista()->getNombre_artistico() ?>
        </p>

        <div class="admin-actions admin-actions-center">
            <a href="actions/delete_musico_acc.php?id=<?= $musico->getId() ?>" class="admin-btn admin-btn-delete">
                Eliminar
            </a>

            <a href="index.php?sec=admin_musicos" class="admin-btn admin-btn-cancel">
                Cancelar
            </a>
        </div>

    </div>

</section>
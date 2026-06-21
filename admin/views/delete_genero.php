<?PHP
$id = $_GET['id'] ?? FALSE;
$genero = Genero::genero_x_id($id);
?>

<section class="admin-page delete-page">

    <div class="admin-page-header">
        <h1>¿Está seguro que desea eliminar este género?</h1>
        <p>Esta acción no se puede deshacer.</p>
    </div>

    <div class="admin-delete-box">

        <p class="delete-label">Género seleccionado</p>

        <h2><?= $genero->getNombre() ?></h2>

        <div class="admin-actions admin-actions-center">
            <a href="actions/delete_genero_acc.php?id=<?= $genero->getId() ?>" class="admin-btn admin-btn-delete">
                Eliminar
            </a>

            <a href="index.php?sec=admin_generos" class="admin-btn admin-btn-cancel">
                Cancelar
            </a>
        </div>

    </div>

</section>
<?PHP
$artistas = Artista::listado_completo();
?>

<section class="admin-page admin-page-wide">

    <div class="admin-page-header">
        <h1>Administración de Artistas</h1>
        <p>Desde esta sección podés agregar, editar y eliminar artistas.</p>
    </div>

    <div>
        <?= Alerta::get_alertas(); ?>
    </div>

    <div class="admin-table-box admin-table-box-wide">

        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre artístico</th>
                    <th>Descripción</th>
                    <th>País de origen</th>
                    <th>Año de formación</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?PHP foreach ($artistas as $a) { ?>
                    <tr>
                        <td>
                            <img 
                                src="../img/artistas/<?= $a->getImagen() ?>" 
                                alt="Imagen de <?= $a->getNombre_artistico() ?>" 
                                class="admin-list-img">
                        </td>

                        <td>
                            <?= $a->getNombre_artistico() ?>
                        </td>

                        <td class="admin-description-cell">
                            <?= $a->getDescripcion() ?>
                        </td>

                        <td>
                            <?= $a->getPais_de_origen() ?>
                        </td>

                        <td>
                            <?= $a->getAno_de_formacion() ?>
                        </td>

                        <td>
                            <div class="admin-actions">
                                <a href="index.php?sec=edit_artista&id=<?= $a->getId() ?>" class="admin-btn admin-btn-edit">
                                    Editar
                                </a>

                                <a href="index.php?sec=delete_artista&id=<?= $a->getId() ?>" class="admin-btn admin-btn-delete">
                                    Eliminar
                                </a>
                            </div>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>

    </div>

    <div class="admin-add-box admin-add-box-wide">
        <a href="index.php?sec=add_artista" class="admin-btn-add">
            + Cargar nuevo artista
        </a>
    </div>

</section>
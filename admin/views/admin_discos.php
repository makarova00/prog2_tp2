<?PHP
$discos = Disco::catalogo_completo();
?>

<section class="admin-page admin-page-wide">

    <div class="admin-page-header">
        <h1>Administración de Discos</h1>
        <p>Desde esta sección podés agregar, editar y eliminar discos.</p>
    </div>

    <div>
        <?= Alerta::get_alertas(); ?>
    </div>

    <div class="admin-table-box admin-table-box-wide">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Artista</th>
                    <th>Lanzamiento</th>
                    <th>Géneros</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?PHP foreach ($discos as $disco) { ?>
                    <tr>
                        <td>
                            <img 
                                src="../img/covers/<?= $disco->getPortada() ?>" 
                                alt="Portada de <?= $disco->getTitulo() ?>" 
                                class="admin-list-img">
                        </td>

                        <td><?= $disco->getTitulo() ?></td>

                        <td><?= $disco->getArtista()->getNombre_artistico() ?></td>

                        <td><?= $disco->getLanzamiento() ?></td>

                        <td><?= $disco->get_generos_nombres() ?></td>

                        <td class="admin-description-cell"><?= $disco->descripcion_reducida()?></td>

                        <td><?= $disco->precio_formateado() ?></td>

                        <td>
                            <div class="admin-actions">
                                <a href="index.php?sec=edit_disco&id=<?= $disco->getId() ?>" class="admin-btn admin-btn-edit">
                                    Editar
                                </a>

                                <a href="index.php?sec=delete_disco&id=<?= $disco->getId() ?>" class="admin-btn admin-btn-delete">
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
        <a href="index.php?sec=add_disco" class="admin-btn-add">+ Cargar nuevo disco</a>
    </div>

</section>
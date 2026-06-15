<?PHP
$artistaSeleccionado = $_GET['artista'] ?? null;
$catalogo = Disco::catalogo_x_artista($artistaSeleccionado);
$datosArtista = Artista::artista_x_id($artistaSeleccionado);
?>
<div class=" d-flex justify-content-center p-5">
   
</div>
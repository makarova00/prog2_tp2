<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$q = $_GET['q'] ?? 1;

if ($id) {
    Carrito::add_item($id, $q);
    Alerta::add_alerta('success', 'El disco fue agregado al carrito.');
}

header("Location: ../../index.php?sec=producto&id=$id");
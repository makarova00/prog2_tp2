<?PHP
require_once 'includes/funciones.php';
require_once 'includes/catalogo.php';
require_once 'includes/artistas.php';

$secciones_validas = [
    "404" => [
        "titulo" => "Página no Encontrada"
    ],
    "home" => [
        "titulo" => "El Salón del Disco"
    ],
    "envios" => [
        "titulo" => "Políticas de Envío"
    ],

    "quienes_somos" => [
        "titulo" => "¿Quiénes Somos?"
    ],
    "catalogo_completo" => [
        "titulo" => "Nuestro Catálogo"
    ],
    "catalogo" => [
        "titulo" => "Comics"
    ],
    "producto" => [
        "titulo" => "Producto"
    ]
];

$seccion = $_GET['sec'] ?? 'home';

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
} else {
    $vista = $seccion;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Salón del Disco :: <?= $secciones_validas[$vista]['titulo'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <link href="css/styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Lexend+Mega:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container nav-container">
                <a class="navbar-brand" href="index.php?sec=home">
                    <img src="img/logo.png" alt="El Salón del Disco" class="logo-navbar">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active fs-5" href="index.php?sec=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fs-5" href="index.php?sec=quienes_somos">¿Quienes Somos?</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active fs-5" href="index.php?sec=catalogo_completo">Catálogo Completo</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link  fs-5" href="index.php?sec=envios">Envios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="<?= $vista ?>">
        <?php if ($vista === 'home') : ?>
            <?php require_once "views/hero.php"; ?>
            <?php require_once "views/home.php"; ?>
        <?php else : ?>
            <div class="container-fluid px-5">
                <?php require_once "views/$vista.php"; ?>
            </div>
        <?php endif; ?>
    </main>


    <footer class="bg-secondary text-light text-center">
        Marina Makarova 2026
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>
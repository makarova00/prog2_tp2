<?PHP
require_once 'functions/autoload.php';

$vista = Vista::validar_vista($_GET['sec'] ?? 'home');
$userData = $_SESSION['loggedIn'] ?? FALSE;
Autenticacion::verify($vista->getRestringida());

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Salón del Disco</title>
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
                            <a class="nav-link <?= $vista->getNombre() === 'home' ? 'active' : '' ?>" href="index.php?sec=home">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $vista->getNombre() === 'quienes_somos' ? 'active' : '' ?>" href="index.php?sec=quienes_somos">
                                ¿Quiénes Somos?
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?= $vista->getNombre() === 'catalogo_completo' ? 'active' : '' ?>" href="index.php?sec=catalogo_completo">
                                Catálogo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $vista->getNombre() === 'datos_de_la_alumna' ? 'active' : '' ?>" href="index.php?sec=datos_de_la_alumna">
                                Datos de la alumna
                            </a>
                        </li>
                        <?PHP if ($userData) { ?>
                            <li class="nav-item">
                                <span class="admin-user-badge">
                                    <span class="admin-user-icon">●</span>
                                    <?= $userData['nombre_completo'] ?>
                                </span>
                            </li>
                        <?PHP } ?>
                        <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                            <a class="nav-link" href="index.php?sec=login">Log In</a>
                        </li>

                        <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                            <a class="nav-link" href="admin/actions/auth_logout.php">Log Out <span class="fw-light"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link admin-link" href="admin/index.php">Ir al Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="<?= $vista->getNombre() ?>">
        <?php require_once "views/{$vista->getNombre()}.php"; ?>
    </main>

    <footer class="bg-dark text-light text-center">
        Marina Makarova 2026
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
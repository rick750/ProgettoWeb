<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["titolo"]; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light text-dark">
    <div class="sticky-top z-3">
        <header class="bg-dark border-bottom border-secondary py-3">
            <div class="container-fluid text-center">
                <h1>
                    <a href="#" class="fw-bold text-uppercase text-primary mb-0 text-decoration-none">UNIGAMES</a>
                </h1>
            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-secondary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                    <ul class="navbar-nav gap-md-3 text-center">
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php isActiveNav("index.php"); ?>"
                                href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php isActiveNav("archivio-post.php"); ?>"
                                href="archivio-post.php">ARCHIVIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php isActiveNav("giochi.php"); ?></a>"
                                href="giochi.php">GIOCHI</a>
                        </li>
                        <?php if (!empty($_SESSION)): ?>
                            <li class="nav-item">
                                <a class="nav-link text-primary <?php isActiveNav("tornei.php"); ?></a>"
                                    href="tornei.php">TORNEI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary <?php isActiveNav("notifiche.php"); ?></a>"
                                    href="notifiche.php">NOTIFICHE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary <?php isActiveNav("profilo.php"); ?></a>"
                                    href="profilo.php">PROFILO</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link text-primary <?php isActiveNav("login.php"); ?></a>"
                                    href="login.php">ACCEDI</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if (isset($templateParams["filtri"]) && count($templateParams["filtri"]) > 0): ?>
            <div class="bg-light border-bottom border-secondary py-2">
                <div class="container">
                    <?php $isGiochi = ("giochi.php" === basename($_SERVER['PHP_SELF'])); ?>
                    <?php if ($isGiochi): ?>
                        <div class="d-md-none text-center">
                            <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse"
                                data-bs-target="#filtriCollapse" aria-expanded="false">
                                Filtri di ricerca
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="<?php echo $isGiochi ? 'collapse d-md-block' : 'd-block'; ?>" id="filtriCollapse">
                        <form method="get" class="d-flex flex-column flex-md-row flex-wrap align-items-start gap-2 gap-md-3"
                            id="form-filtri">
                            <?php foreach ($templateParams["filtri"] as $filtro): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filter[]"
                                        value="<?php echo $filtro["valore"]; ?>" <?php if (in_array($filtro["valore"], $templateParams["selezionaFiltro"]))
                                               echo "checked"; ?>>
                                    <label class="form-check-label">
                                        <?php echo $filtro["nome"]; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <main class="container-fluid bg-info bg-opacity-10">
        <div class="row gx-4">
            <section class="col-md-9 py-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-9">
                        <?php
                        if (isset($templateParams["nome"])) {
                            require($templateParams["nome"]);
                        }
                        ?>
                    </div>
                </div>
            </section>

            <aside class="col-md-3 bg-primary bg-opacity-10 border-start border-secondary py-4" id="aside">
                <div>
                    <?php
                    if (isset($templateParams["aside"])) {
                        require($templateParams["aside"]);
                    }
                    ?>
                </div>
            </aside>
        </div>
    </main>

    <footer class="bg-dark border-bottom border-secondary py-4">
        <div class="container-fluid text-center">
            <h6 class="text-secondary mb-0">
                Autori: Marco Battistini - Riccardo Carta
            </h6>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/info-giochi.js"></script>
    <script src="js/filtri-di-ricerca.js"></script>
    <script src="js/info-post.js"></script>
    <script src="js/modifica-post.js"></script>
    <script src="js/modifica-commento.js"></script>
    <script src="js/modifica-torneo.js"></script>
    <script src="js/modifica-profilo.js"></script>
    <script src="js/logout-listener.js"></script>
    <script src="js/seleziona-tipo-post.js"></script>
    <script src="js/notifiche.js"></script>
</body>

</html>
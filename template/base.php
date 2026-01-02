<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["titolo"]; ?></title>

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light text-dark">

    <header class="bg-dark border-bottom border-secondary py-3">
        <div class="container-fluid text-center">
            <h1 class="fw-bold text-uppercase text-primary mb-0">
                UNIGAMES
            </h1>
        </div>
    </header>

    <nav class="bg-dark border-bottom border-secondary">
        <ul class="nav justify-content-center gap-3 py-2">
            <li class="nav-item">
                <a class="nav-link text-primary fw-semibold active" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="giochi.php">GIOCHI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="tornei.php">TORNEI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">NOTIFICHE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">ACCEDI/PROFILO</a>
            </li>
        </ul>
    </nav>

    <div class="bg-light border-bottom border-secondary py-2">
        <div class="container d-flex flex-wrap align-items-center justify-content-between gap-3">
            <form class="d-flex flex-wrap align-items-center gap-3">
                <?php foreach ($templateParams["filtri"] as $filtro): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filter-generico" <?php if ($templateParams["selezionaFiltro"])
                            echo "checked"; ?>>
                        <label class="form-check-label" for="filter-generico">
                            <?php echo $filtro["nome"]; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>

    <main class="container-fluid my-4 px-4">
        <div class="row gx-4">
            <section class="col-md-10">
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

            <aside class="col-md-2 border-start border-secondary text-muted">
                <div class="d-flex justify-content-center mb-3">
                    <button class="btn btn-primary rounded-pill px-4">
                        Nuovo
                    </button>
                </div>
                <div>
                    <?php
                    if (isset($templateParams["giochiRandom"])) {
                        require($templateParams["giochiRandom"]);
                    }
                    ?>
                </div>
            </aside>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/info-giochi.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["titolo"]; ?></title>

    <link rel="stylesheet" href="style.css">
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
                <a class="nav-link text-primary fw-semibold active" aria-current="page" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">GIOCHI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">TORNEI</a>
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="filter-generico">
                    <label class="form-check-label" for="filter-generico">
                        Indie
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="filter-recensione">
                    <label class="form-check-label" for="filter-recensione">
                        RPG
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="filter-popolari">
                    <label class="form-check-label" for="filter-popolari">
                        Sparatutto
                    </label>
                </div>
            </form>
            <button class="btn btn-primary rounded-pill px-4">
                Nuovo
            </button>

        </div>
    </div>


    <main class="container my-4">
        <div class="row">
            <section class="col-md-9 px-md-4">
                <?php
                if (isset($templateParams["nome"])) {
                    require($templateParams["nome"]);
                }
                ?>
            </section>

            <aside class="col-md-3 text-muted border-start border-secondary ps-md-4">
                <div class="border rounded p-3 mb-4 bg-light">
                    <p class="fw-bold mb-0">Novità</p>
                </div>

                <div class="border rounded p-4 text-center bg-light">
                    Gioco random
                </div>
            </aside>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
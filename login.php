<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unigames - Login</title>

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

    <main class="container-fluid py-2 px-4 bg-info bg-opacity-10">
        <div class="row gx-4">
            <section class="col-md-9">
            <form action="#">
                <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci i dati del tuo nuovo profilo</h1>
                <fieldset class=" flex-wrap align-items-center gap-3">
                    <label for="nome" class="form-text-label">Nome</label><br/>
                    <input type="text" id="nome" name="nome"/><br/><br/>
                    <label for="cognome" class="form-text-label">Cognome</label><br/>
                    <input type="text" id="cognome" name="cognome"><br/><br/>
                    <label for="data_nascita" class="form-data-label">Data di nascita</label><br/>
                    <input type="date" id="data_nascita" name ="data nascita"><br/><br/>
                    <label for="matricola" class="form-number-label">Matricola</label><br/>
                    <input type="number" id="matricola" name="matricola"><br/><br/>
                    <label for="mail" class="form-text-label">Mail istituzionale</label><br/>
                    <input type="text" id="mail" name="mail"><br/><br/>
                    <label for="password" class="form-text-label">Password</label><br/>
                    <input type="text" id="password" name="password"><br/><br/>
                    <label for="corso" class="form-label">Corso di laurea seguito:</label>
                        <select id="corso" name="corso" class="form-select">
                            <option value="">-- Seleziona un corso di laurea --</option>
                            <option value="Ingegneria biomedica">Ingegneria biomedica</option>
                            <option value="Ingegneria e scienze informatiche">Ingegneria e scienze informatiche</option>
                            <option value="Ingegneria elettronica">Ingegneria elettronica</option>
                            <option value="Architettura">Architettura</option>
                            <option value="Psicologia">Psicologia</option>
                        </select><br/><br/>
                    <label for="descr" class="form-label">Dicci qualcosa di te!</label><br/>
                    <textarea id="descr" name="descr" rows="5" cols="50" maxlength="200" class="form-control"></textarea><br/><br/>
                </fieldset>
                <input type="submit" value="registrati" class="btn btn-primary rounded-pill px-4">
                <input type="reset" value="cancella" class="btn btn-primary rounded-pill px-4">
            </form>
            </section>

            <aside class="col-md-3 border-start border-secondary text-muted">
                <h2 class="fw-bold">Sei già registrato?</h2>
                <form action="#">
                    <fieldset>
                        <label for="mail" class="form-text-label">Mail istituzionale</label><br/>
                        <input type="text" id="mail" name="mail"><br/><br/>
                        <label for="password" class="form-text-label">Password</label><br/>
                        <input type="text" id="password" name="password"><br/><br/>                    
                    </fieldset>
                    <input type="submit" value="accedi" class="btn btn-primary rounded-pill px-4">
                    <input type="reset" value="cancella" class="btn btn-primary rounded-pill px-4">  
                </form>
            </aside>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
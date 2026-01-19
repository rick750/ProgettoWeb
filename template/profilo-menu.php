<div class="col-12 mb-5">
    <p class="fs-5 mb-4 text-center">
        Benvenuto/a <strong><?php echo $_SESSION["nome"]; ?></strong>
        <span class="text-muted">
            (<?php echo $_SESSION["admin"] ? "Amministratore" : "Utente"; ?>)
        </span>
    </p>

    <article class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="row g-3 justify-content-center">
    <div class="col-12 col-md-3"></div>
                <div class="col-12 col-md-6 d-grid">
                    <a href="creazione-messaggio.php"
                       class="btn btn-info fw-bold rounded-pill py-2">
                        Nuovo Messaggio
                    </a>
                </div><div class="col-12 col-md-3"></div>

                <div class="col-12 col-md-6 d-grid">
                    <a href="profilo-post.php"
                       class="btn btn-primary rounded-pill px-4 py-2">
                        Post Generici
                    </a>
                </div>

                <div class="col-12 col-md-6 d-grid">
                    <a href="profilo-recensioni.php"
                       class="btn btn-primary rounded-pill px-4 py-2">
                        Recensioni
                    </a>
                </div>

                <?php if ($_SESSION["admin"]): ?>
                    <div class="col-12 col-md-6 d-grid">
                        <a href="profilo-tornei.php"
                           class="btn btn-primary rounded-pill px-4 py-2">
                            Tornei Aggiunti
                        </a>
                    </div>

                    <div class="col-12 col-md-6 d-grid">
                        <a href="profilo-giochi.php"
                           class="btn btn-primary rounded-pill px-4 py-2">
                            Giochi Aggiunti
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </article>

    <article class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold text-center mb-4">I tuoi dati</h5>

            <div class="row gy-2">
                <div class="col-12 col-md-6"><strong>Nome:</strong> <?php echo $templateParams["infoUtente"]["nome"]; ?></div>
                <div class="col-12 col-md-6"><strong>Cognome:</strong> <?php echo $templateParams["infoUtente"]["cognome"]; ?></div>
                <div class="col-12 col-md-6"><strong>Data di nascita:</strong> <?php echo $templateParams["infoUtente"]["dataDiNascita"]; ?></div>
                <div class="col-12 col-md-6"><strong>Matricola:</strong> <?php echo $templateParams["infoUtente"]["matricola"]; ?></div>
                <div class="col-12"><strong>Email:</strong> <?php echo $templateParams["infoUtente"]["email"]; ?></div>
                <div class="col-12"><strong>Corso:</strong> <?php echo $templateParams["infoUtente"]["nomeCorso"]; ?></div>
                <div class="col-12"><strong>Descrizione:</strong> <?php echo $templateParams["infoUtente"]["descrizione"]; ?></div>
            </div>
        </div>
    </article>

    <article class="card shadow-sm">
        <div class="card-body">

            <?php if (!empty($_SESSION)): ?>
                <form action="profilo.php" method="POST" class="form-modifica-profilo d-none">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Corso</label>
                        <select name="codiceCorsoModificato" class="form-select">
                            <?php foreach ($templateParams["corsi"] as $corso): ?>
                                <option value="<?php echo $corso["codiceCorso"]; ?>"
                                    <?php if ($corso["codiceCorso"] === $templateParams["vecchioCorso"]["codiceCorso"]) echo "selected"; ?>>
                                    <?php echo $corso["nome"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Descrizione</label>
                        <textarea name="descrizioneModificata" rows="5" maxlength="300"
                                  class="form-control"><?php echo $templateParams["infoUtente"]["descrizione"]; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-center">
                    <input type="submit" name="modificaProfilo"
                           value="Conferma Modifica"
                           class="btn btn-primary rounded-pill px-4">
                        </div>
                </form>

                <div class="d-flex gap-2 mt-2 justify-content-center">
                    <button class="btn btn-primary rounded-pill px-4 btn-profilo-update-expand">
                        Modifica Profilo
                    </button>
                    <button class="btn btn-secondary rounded-pill px-4 btn-profilo-update-collapse d-none">
                        Annulla
                    </button>
                </div>
            <?php endif; ?>

        </div>
    </article>

</div>

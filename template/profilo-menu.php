<div class="col-12 mb-4">
    <div>
        <p> Benvenuto/a <?php echo $_SESSION["nome"]; ?>
            <?php if ($_SESSION["admin"] == true): ?>
                - Amministratore
            <?php else: ?>
                - Utente
            <?php endif; ?>
        </p>
    </div>

    <article class="card h-100 shadow-sm ">
        <div class="card-body">

            <div class="row g-3">
                <div class="col-3 d-grid"></div>

                <div class="col-6 d-grid">
                    <a href="creazione-messaggio.php" class="btn fw-bold rounded-pill py-2 btn-info">Nuovo Messaggio</a>
                </div>
                <div class="col-3 d-grid"></div>


                <div class="col-6 d-grid">
                    <a href="profilo-post.php" class="btn btn-primary rounded-pill px-4">Post Generici</a>
                </div>

                <div class="col-6 d-grid">
                    <a href="profilo-recensioni.php" class="btn btn-primary rounded-pill px-4">Recensioni</a>
                </div>

                <?php if ($_SESSION["admin"] == true): ?>
                    <div class="col-6 d-grid">
                        <a href="profilo-tornei.php" class="btn btn-primary rounded-pill px-4">Tornei Aggiunti</a>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION["admin"] == true): ?>
                    <div class="col-6 d-grid">
                        <a href="profilo-giochi.php" class="btn btn-primary rounded-pill px-4">Giochi Aggiunti</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </article>
    <div class="card h-100 shadow-sm ">
        <div class="card-body">
            <p class="fw-bold text-center">I tuoi dati</p>
            <p>Nome: <?php echo $templateParams["infoUtente"]["nome"]; ?></p>
            <p>Cognome: <?php echo $templateParams["infoUtente"]["cognome"]; ?></p>
            <p>Data di Nascita: <?php echo $templateParams["infoUtente"]["dataDiNascita"]; ?></p>
            <p>Matricola: <?php echo $templateParams["infoUtente"]["matricola"]; ?></p>
            <p>Email: <?php echo $templateParams["infoUtente"]["email"]; ?></p>
            <p>Corso: <?php echo $templateParams["infoUtente"]["nomeCorso"]; ?></p>
            <p>Descrizione: <?php echo $templateParams["infoUtente"]["descrizione"]; ?></p>
        </div>
    </div>
    <article class="card h-100 shadow-sm ">
        <div class="card-body">
            <?php if (!empty($_SESSION)): ?>
                <form action="profilo.php" method="POST" class="form-modifica-profilo d-none">
                    <select id="corso" name="codiceCorsoModificato" class="form-select">
                        <?php foreach ($templateParams["corsi"] as $corso): ?>
                            <option id="<?php echo getValueFromCorso($corso["nome"]); ?>"
                                value="<?php echo ($corso["codiceCorso"]); ?>" <?php if ($corso["codiceCorso"] === $templateParams["vecchioCorso"]["codiceCorso"]):
                                       echo "selected";
                                   endif; ?>>
                                <?php echo $corso["nome"]; ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br /><br />
                    <textarea id="descrizione" name="descrizioneModificata" rows="10" cols="120" maxlength="300"
                        class="form-control"><?php echo $templateParams["infoUtente"]["descrizione"]; ?></textarea><br /><br />
                    <input type="submit" name="modificaProfilo" value="Conferma Modifica"
                        class="btn btn-primary rounded-pill btn-sm">
                </form>
                <button class="btn btn-primary rounded-pill px-4 btn-profilo-update-expand mx-1">Modifica Profilo</button>
                <button class="btn btn-primary rounded-pill px-4 btn-profilo-update-collapse d-none mx-1">Annulla</button>
            <?php endif; ?>
        </div>
    </article>
</div>
<?php if (isActive("profilo-tornei.php")): ?>
    <?php if (!empty($_SESSION) && ($_SESSION["admin"] == true)): ?>
        <?php if (empty($templateParams["tornei"])): ?>
            <p>Al momento non hai creato nessun Torneo</p>
        <?php endif; ?>
        <div class="mb-3">
            <?php if (isset($templateParams["indietro"])): ?>
                <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
            <?php endif; ?>
            <a href="creazione-torneo.php" class="btn btn-primary rounded-pill px-4"> Nuovo Torneo</a>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php foreach ($templateParams["tornei"] as $torneo): ?>
    <article class="px-4 py-3 card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div>
            <div class="row">
                <?php if (!empty($_SESSION) && ($_SESSION["email"] === $torneo["email"])): ?>
                    <h2 class="h5 col-4"><?php echo $torneo["nomeTorneo"]; ?></h2>
                    <div class="col-6"></div>
                    <form action="tornei.php" method="POST" class="col-2">
                        <input type="text" name="cancellaTorneo" value="<?php echo $torneo["codiceTorneo"]; ?>" hidden />
                        <input type="submit" name="elimina" value="elimina" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-3">
                    </form>
                </div>
            <?php else: ?>
                <h2 class="h5"><?php echo $torneo["nomeTorneo"]; ?></h2>
            <?php endif; ?>
            <p class="text-muted mb-2">
                Torneo di <?php echo $torneo["nomeGioco"]; ?> –
                <?php echo $torneo["data"]; ?>
            </p>
        </div>

        <section>
            <p><?php echo $torneo["descrizione"]; ?></p>
            <?php if (!empty($_SESSION) && (($_SESSION["email"] === $torneo["email"]))): ?>
                <form action="eliminazione-contenuto.php" method="POST" class="form-modifica-torneo d-none">
                    <input type="text" name="codiceTorneo" value="<?php echo $torneo["codiceTorneo"]; ?>" hidden />
                    <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                    <label for="data" class="form-radio-label ps-4">Nuova Data</label>
                    <input type="date" id="data" name="data" value="data"><br /><br />
                    <textarea id="descrizione" name="descrizione" rows="10" cols="120" maxlength="300"
                    class="form-control"></textarea><br /><br />
                    <input type="submit" name="modificaTorneo" value="Conferma Modifica" class="btn btn-primary rounded-pill btn-sm">
                </form>
                <button class="btn btn-primary rounded-pill px-4 btn-torneo-update-expand mx-1">Modifica Torneo</button>
                <button class="btn btn-primary rounded-pill px-4 btn-torneo-update-collapse d-none mx-1">Annulla</button>
            <?php endif; ?>
        </section>

        <?php if (!isActive("profilo-tornei.php")): ?>
            <div class="position-absolute bottom-0 end-0 m-3">
                <form action="tornei.php" method="POST">
                    <input type="text" value="<?php echo $torneo["codiceGioco"]; ?>" name="codiceGioco" hidden />
                    <input type="text" value="<?php echo $torneo["codiceTorneo"]; ?>" name="codiceTorneo" hidden />
                    <?php if ($torneo["iscritto"]): ?>
                        <button type="submit" name="azione" value="disiscrizione" class="btn btn-secondary btn-sm">
                            Iscritto
                        </button>
                    <?php else: ?>
                        <button type="submit" name="azione" value="iscrizione" class="btn btn-primary btn-sm">
                            Iscriviti
                        </button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endif; ?>
    </article>
<?php endforeach; ?>
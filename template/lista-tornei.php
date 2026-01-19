<?php if (isActive("profilo-tornei.php")): ?>
    <?php if (!empty($_SESSION) && ($_SESSION["admin"] == true)): ?>
        <?php if (empty($templateParams["tornei"])): ?>
            <p>Al momento non hai creato nessun Torneo</p>
        <?php endif; ?>

        <div class="mb-4 d-flex gap-2 flex-wrap">
            <?php if (isset($templateParams["indietro"])): ?>
                <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4">
                    Torna al profilo
                </a>
            <?php endif; ?>
            <a href="creazione-torneo.php" class="btn btn-primary rounded-pill px-4">
                Nuovo Torneo
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php foreach ($templateParams["tornei"] as $torneo): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div class="card-body position-relative">

            <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="text-break">
                    <h2 class="card-title fw-bold mb-1">
                        <?php echo $torneo["nomeTorneo"]; ?>
                    </h2>
                    <p class="card-subtitle text-muted small mb-0">
                        Torneo di <?php echo $torneo["nomeGioco"]; ?> ·
                        <?php echo $torneo["data"]; ?>
                    </p>
                </div>

                <?php if (!empty($_SESSION) && ($_SESSION["email"] === $torneo["email"])): ?>
                    <form action="tornei.php" method="POST">
                        <input type="text" name="cancellaTorneo" value="<?php echo $torneo["codiceTorneo"]; ?>" hidden>
                        <input type="submit" name="elimina" value="Elimina" class="btn btn-danger px-3">
                    </form>
                <?php endif; ?>
            </div>

            <section class="card-text mb-3">
                <p class="mb-2"><?php echo $torneo["descrizione"]; ?></p>

                <p class="text-muted small mb-0">
                    Aggiunto da:
                    <?php if ($_SESSION["email"] === $torneo["email"]): ?>
                        <?php echo $torneo["email"]; ?>
                    <?php else: ?>
                        <a href="dettaglio_profilo.php?email=<?php echo urlencode($torneo['email']); ?>" class="text-decoration-none">
                            <?php echo htmlspecialchars($torneo["email"]); ?>
                        </a>
                    <?php endif; ?>
                </p>


            </section>

            <?php if (!empty($_SESSION) && (($_SESSION["email"] === $torneo["email"]))): ?>
                <section class="mt-3">
                    <form action="modifica-contenuto.php" method="POST" class="form-modifica-torneo d-none">
                        <input type="text" name="codiceTorneo" value="<?php echo $torneo["codiceTorneo"]; ?>" hidden>
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden>

                        <div class="mb-2">
                            <label class="form-label fw-semibold">Nuova data</label>
                            <input type="date" name="data" value="<?php echo $torneo["data"]; ?>" class="form-control">
                        </div>

                        <textarea name="descrizione" rows="5" maxlength="300"
                            class="form-control mb-2"><?php echo $torneo["descrizione"]; ?></textarea>

                        <input type="submit" name="modificaTorneo" value="Conferma Modifica"
                            class="btn btn-primary rounded-pill px-4">

                        <input type="reset" value="Annulla"
                            class="btn btn-secondary rounded-pill px-4 btn-torneo-update-collapse d-none">
                    </form>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary rounded-pill px-4 btn-torneo-update-expand">
                            Modifica Torneo
                        </button>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!isActive("profilo-tornei.php")): ?>
                <div class="d-flex justify-content-end mt-3">
                    <form action="tornei.php" method="POST">
                        <input type="text" name="codiceGioco" value="<?php echo $torneo["codiceGioco"]; ?>" hidden>
                        <input type="text" name="codiceTorneo" value="<?php echo $torneo["codiceTorneo"]; ?>" hidden>

                        <?php if ($torneo["iscritto"]): ?>
                            <button type="submit" name="azione" value="disiscrizione" class="btn btn-secondary rounded-pill px-4">
                                Iscritto
                            </button>
                        <?php else: ?>
                            <button type="submit" name="azione" value="iscrizione" class="btn btn-primary rounded-pill px-4">
                                Iscriviti
                            </button>
                        <?php endif; ?>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </article>
<?php endforeach; ?>
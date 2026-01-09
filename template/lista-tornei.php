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
            <h2 class="h5"><?php echo $torneo["nomeTorneo"]; ?></h2>
            <p class="text-muted mb-2">
                Torneo di <?php echo $torneo["nomeGioco"]; ?> –
                <?php echo $torneo["data"]; ?>
            </p>
        </div>

        <section>
            <p><?php echo $torneo["descrizione"]; ?></p>
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
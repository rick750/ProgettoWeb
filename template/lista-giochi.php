<?php require_once 'bootstrap.php';?>

<?php if (empty($templateParams["libreriaGiochiFunc"])): ?>
    <?php if(isset($templateParams["indietro"])): ?>
        <p>Al momento non hai pubblicato Giochi in Libreria</p>
    <?php else: ?>
        <p>Al momento non ci sono giochi in libreria con i tag selezionati </p>
    <?php endif; ?>
<?php endif; ?>

<?php if (isset($templateParams["indietro"])): ?>
    <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 mb-3"> Torna al
        profilo</a>
<?php endif; ?>

<?php if (isset($templateParams["indietro"]) && $_SESSION["admin"]): ?>
    <a href="creazione-gioco.php" class="btn btn-primary rounded-pill px-4 mb-3">Aggiungi Gioco</a>
<?php endif; ?>

<?php if (isset($templateParams["indietro"]) && $_SESSION["admin"]): ?>
    <form action="creazione-tag.php" method="POST">
        <fieldset class=" flex-wrap align-items-center gap-3">
                <label for="tag" class="form-textarea-label">Aggiungi un nuovo Tag:</label><br />
                <input type="text" name="tag">
                <input type="text" name="nuovo_tag" value="nuovo_tag" hidden>
        </fieldset>
        <input type="submit" value="Aggiungi" class="btn btn-primary rounded-pill px-4">
        <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
    </form>
<?php endif; ?>


<div class="row mt-3">
    <?php foreach ($templateParams["libreriaGiochiFunc"] as $gioco): ?>
        <?php $recensioniUtenti = $dbh->getStatisticheRecensioniGioco($gioco["codiceGioco"]); ?>
        <div class="col-12 col-md-6 mb-4">
            <article class="card h-100 shadow-sm border-0 border-start border-4 border-primary">
                <div>
                    <img class="img-fluid" src="upload/<?php echo $gioco["immagine"]; ?>"
                        alt="immagine di <?php echo $gioco["nome"]; ?>">
                </div>

                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h2 class="card-title fw-bold mb-1"><?php echo $gioco["nome"]; ?></h2>
                        <p class="badge bg-primary mb-2">
                            Valutazione: <?php echo $gioco["valutazioneGiornalistica"]; ?>
                        </p>
                        <p class="badge bg-primary mb-2">
                            <?php if($recensioniUtenti["media"] === NULL): ?>
                                Valutazione Utenti: -
                            <?php else: ?>
                                Valutazione Utenti: <?php echo $recensioniUtenti["media"]; ?> (<?php echo $recensioniUtenti["numero"]; ?>)
                            <?php endif;?>
                        </p>
                    </div>

                    <section class="card-text">
                        <p class="fw-semibold mb-2">Tag: <?php echo $gioco["listaTag"]; ?></p>
                    </section>

                    <div class="extra-info d-none">
                        <p>Data di rilascio: <?php echo $gioco["annoDiPubblicazione"]; ?></p>
                        <p>Software House/Sviluppatore: <?php echo $gioco["softwareHouse"]; ?></p>
                        <p>Descrizione: <?php echo $gioco["descrizione"]; ?></p>
                    </div>

                    <div class="mt-auto d-flex justify-content-end">
                        <?php if (isActive("profilo-giochi.php")): ?>
                            <a href="profilo-giochi.php?action=recensioni&id=<?php echo $gioco['codiceGioco']; ?>"
                                class="btn btn-primary rounded-pill px-4 mx-1"> Recensioni </a>
                        <?php else: ?>
                            <a href="giochi.php?action=recensioni&id=<?php echo $gioco['codiceGioco']; ?>"
                                class="btn btn-primary rounded-pill px-4 mx-1"> Recensioni </a>
                        <?php endif; ?>
                        <button class="btn btn-primary rounded-pill px-4 btn-expand mx-1">Espandi</button>
                        <button class="btn btn-primary rounded-pill px-4 btn-collapse d-none mx-1">Riduci</button>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>
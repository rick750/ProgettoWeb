<article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
    <div class="card-body">
        <header class="mb-3">
            <h2 class="card-title fw-bold mb-1">
                <?php echo $templateParams["post"]["titolo"]; ?>
            </h2>
            <p class="card-subtitle text-muted small">
                <?php echo $templateParams["post"]["data"]; ?> · <?php echo $templateParams["post"]["crea_email"]; ?>
            </p>
        </header>
        <section class="card-text generic-extra-info">
            <p class="mb-0">
                <?php echo $templateParams["post"]["testo"]; ?>
            </p>
        </section>
    </div>
</article>

<form action="creazione-commento.php" method="POST">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci il nuovo Commento:</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
            <label for="testo" class="form-textarea-label"></label><br />
            <textarea id="testo" name="testo" value="testo" rows="10" cols="120" maxlength="500"
                class="form-control"></textarea><br /><br />
            <input type="text" name="autorePost" value="<?php echo $templateParams["post"]["crea_email"];?>" hidden>
            <input type="text" name="codicePost" value="<?php echo $templateParams["post"]["codicePost"];?>" hidden>
    </fieldset>
    <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 my-4">Indietro</a>
    </div>
<?php endif; ?>
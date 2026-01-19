<article class="card mb-5 shadow-sm border-0 border-start border-4 border-primary">
    <div class="card-body p-4">
        <header class="mb-3">
            <h2 class="card-title fw-bold mb-1">
                <?php echo $templateParams["post"]["titolo"]; ?>
            </h2>
            <p class="card-subtitle text-muted small">
                <?php echo $templateParams["post"]["data"]; ?> ·
                <?php echo $templateParams["post"]["crea_email"]; ?>
            </p>
        </header>

        <section class="card-text generic-extra-info">
            <p class="mb-0">
                <?php echo $templateParams["post"]["testo"]; ?>
            </p>
        </section>
    </div>
</article>

<div class="container my-5">
    <div class="justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="creazione-commento.php" method="POST">

                    <h1 class="fw-bold text-uppercase text-primary mb-4 text-center">
                        Inserisci il nuovo commento
                    </h1>

                    <fieldset class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">

                            <div class="mb-4">
                                <label for="testo" class="form-label fw-semibold">
                                    Commento
                                </label>
                                <textarea id="testo" name="testo" rows="6" maxlength="500" class="form-control"
                                    placeholder="Scrivi qui il tuo commento..."></textarea>
                            </div>

                            <input type="text" name="autorePost"
                                value="<?php echo $templateParams["post"]["crea_email"]; ?>" hidden>
                            <input type="text" name="codicePost"
                                value="<?php echo $templateParams["post"]["codicePost"]; ?>" hidden>

                            <div class="d-flex gap-3 justify-content-end flex-wrap">
                                <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
                                <input type="reset" value="Cancella" class="btn btn-secondary rounded-pill px-4">
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <?php if (isset($templateParams["indietro"])): ?>
            <div class="text-center mt-4">
                <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-secondary rounded-pill px-4">
                    Indietro
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
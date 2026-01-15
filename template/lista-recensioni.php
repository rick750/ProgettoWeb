<?php if (empty($templateParams["recensioni"])): ?>
    <p>Al momento Non hai scritto Recensioni</p>
<?php endif; ?>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
        <a href="creazione-post.php" class="btn btn-primary rounded-pill px-4"> Nuovo Post</a>
    </div>
<?php endif; ?>

<?php foreach ($templateParams["recensioni"] as $recensioni): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div class="card-body">
            <div class="mb-3">
                <h2 class="card-title fw-bold mb-1">
                    <?php echo $recensioni["titolo"]; ?>
                </h2>
                <?php if (!empty($_SESSION) && ($_SESSION["admin"] || ($_SESSION["email"] === $recensioni["crea_email"]))): ?>
                    <form action="eliminazione-contenuto.php" method="POST">
                        <input type="text" name="cancellaCreaEmail" value="<?php echo $recensioni["crea_email"]; ?>" hidden />
                        <input type="text" name="cancellaCodicePost" value="<?php echo $recensioni["codicePost"]; ?>" hidden />
                        <input type="text" name="cancellaTipoPost" value="R" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                        <input type="submit" name="eliminaPost" value="Elimina Recensione"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-3">
                    </form>
                <?php endif; ?>
                <p class="card-subtitle text-muted small">
                    <?php echo $recensioni["data"]; ?> · <?php echo $recensioni["crea_email"]; ?>
                </p>
            </div>

            <section class="card-text recensione-extra-info d-none">
                <p class="fw-semibold mb-1">
                    <?php echo $recensioni["nome"]; ?>
                </p>

                <p class="badge bg-primary mb-2">
                    Valutazione: <?php echo $recensioni["valutazione"]; ?>
                </p>

                <p class="mt-2 mb-0">
                    <?php echo $recensioni["testo"]; ?>
                </p>
            </section>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary rounded-pill px-4 btn-recensione-expand">Espandi</button>
                <button class="btn btn-primary rounded-pill px-4 btn-recensione-collapse d-none">Riduci</button>
            </div>
        </div>
    </article>
<?php endforeach; ?>
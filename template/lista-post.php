<?php if (empty($templateParams["post"])): ?>
    <p>Al momento Non hai pubblicato Post</p>
<?php endif; ?>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
    <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
    <a href="creazione-post.php" class="btn btn-primary rounded-pill px-4"> Nuovo Post</a>
</div>
<?php endif; ?>

<?php foreach ($templateParams["post"] as $post): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div class="card-body">
            <header class="mb-3">
                <h2 class="card-title fw-bold mb-1">
                    <?php echo $post["titolo"]; ?>
                </h2>
                <p class="card-subtitle text-muted small">
                    <?php echo $post["data"]; ?> · <?php echo $post["crea_email"]; ?>
                </p>
            </header>

            <section class="card-text generic-extra-info d-none">
                <p class="mb-0">
                    <?php echo $post["testo"]; ?>
                </p>
            </section>

            <section class="card-text generic-answers d-none mt-3">
                <?php foreach ($post["commenti"] as $answer): ?>
                    <div class="p-3 mb-3 border rounded bg-light">
                        <p class="fw-bold mb-1 text-primary">
                            <?php echo htmlspecialchars($answer["email"]); ?>
                        </p>
                        <p class="mb-0">
                            <?php echo nl2br(htmlspecialchars($answer["testo"])); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($post["commenti"])): ?>
                    <p class="text-muted fst-italic">Nessuna risposta presente.</p>
                <?php endif; ?>
            </section>

            <div class="d-flex justify-content-end mt-3">
                <a href="creazione-commento.php?action=commento&id=<?php echo $post['codicePost']; ?>&crea_email=<?php echo $post['crea_email']; ?>"class="btn btn-primary rounded-pill px-4 mx-1"> Rispondi </a>
                <button class="btn btn-primary rounded-pill px-4 btn-generic-show-answer mx-1 d-none">Mostra Risposte</button>
                <button class="btn btn-primary rounded-pill px-4 btn-generic-hid-answer d-none mx-1">Nascondi Risposte</button>
                <button class="btn btn-primary rounded-pill px-4 btn-generic-expand mx-1">Espandi</button>
                <button class="btn btn-primary rounded-pill px-4 btn-generic-collapse d-none mx-1">Riduci</button>
            </div>
        </div>
    </article>
<?php endforeach; ?>
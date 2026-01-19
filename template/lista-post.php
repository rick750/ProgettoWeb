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
        <div class="card-body position-relative">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="text-break">
                    <h2 class="card-title fw-bold mb-1"><?php echo htmlspecialchars($post["titolo"]); ?></h2>
                    <p class="card-subtitle text-muted small mb-0">
                        <?php echo htmlspecialchars($post["data"]); ?> ·
                        <?php if ($_SESSION["email"] !== $post["crea_email"]): ?>
                            <a href="dettaglio_profilo.php?email=<?php echo urlencode($post['crea_email']); ?>">
                                <?php echo htmlspecialchars($post["crea_email"]); ?>
                            </a>
                        <?php else: ?>
                            <?php echo htmlspecialchars($post["crea_email"]); ?>
                        <?php endif; ?>
                    </p>
                </div>

                <?php if (!empty($_SESSION) && ($_SESSION["admin"] || ($_SESSION["email"] === $post["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST" class="ms-3">
                        <input type="text" name="cancellaCreaEmail" value="<?php echo $post["crea_email"]; ?>" hidden />
                        <input type="text" name="cancellaCodicePost" value="<?php echo $post["codicePost"]; ?>" hidden />
                        <input type="text" name="cancellaTipoPost" value="<?php echo $post["GENERICO"]; ?>" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                        <input type="submit" name="eliminaPost" value="Elimina Post" class="btn btn-danger btn-sm flex-shrink-0">
                    </form>
                <?php endif; ?>
            </div>

            <section class="card-text generic-extra-info d-none">
                <p class="mb-3"><?php echo nl2br(htmlspecialchars($post["testo"])); ?></p>

                <?php if (!empty($_SESSION) && (($_SESSION["email"] === $post["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST" class="form-modifica-generico d-none">
                        <input type="text" name="creaEmail" value="<?php echo $post["crea_email"]; ?>" hidden />
                        <input type="text" name="codicePost" value="<?php echo $post["codicePost"]; ?>" hidden />
                        <input type="text" name="tipoPost" value="<?php echo $post["GENERICO"]; ?>" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />

                        <textarea id="testo_post" name="testo_post" rows="6" maxlength="1000" class="form-control mb-2"><?php echo htmlspecialchars($post["testo"]); ?></textarea>

                        <div class="d-flex gap-2">
                            <input type="submit" name="modificaPost" value="Conferma Modifica" class="btn btn-primary btn-sm rounded-pill">
                            <button type="button" class="btn btn-secondary btn-sm rounded-pill btn-cancel-modifica btn-generic-update-collapse d-none">Annulla</button>
                        </div>
                    </form>

                    <div class="d-flex gap-2 mt-2">
                        <button class="btn btn-primary rounded-pill btn-sm btn-generic-update-expand">Modifica Post</button>
                    </div>
                <?php endif; ?>
            </section>

            <section class="card-text generic-answers d-none mt-3">
                <?php foreach ($post["commenti"] as $answer): ?>
                    <div class="p-3 mb-3 border rounded bg-light position-relative">
                        <p class="fw-bold mb-1 text-primary"><?php echo htmlspecialchars($answer["email"]); ?></p>
                        <p class="mb-3"><?php echo nl2br(htmlspecialchars($answer["testo"])); ?></p>

                        <?php if (!empty($_SESSION) && ($_SESSION["admin"] || ($_SESSION["email"] === $answer["email"]))): ?>
                            <form action="modifica-contenuto.php" method="POST" class="position-absolute bottom-0 end-0 m-2">
                                <input type="text" name="cancellaCreaEmail" value="<?php echo $answer["crea_email"]; ?>" hidden />
                                <input type="text" name="cancellaCodicePost" value="<?php echo $answer["codicePost"]; ?>" hidden />
                                <input type="text" name="cancellaCodiceCommento" value="<?php echo $answer["codiceCommento"]; ?>" hidden />
                                <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                                <input type="submit" name="eliminaCommento" value="Elimina" class="btn btn-danger btn-sm flex-shrink-0">
                            </form>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION) && (($_SESSION["email"] === $answer["email"]))): ?>
                            <form action="modifica-contenuto.php" method="POST" class="form-modifica-commento d-none">
                                <input type="text" name="creaEmail" value="<?php echo $answer["crea_email"]; ?>" hidden />
                                <input type="text" name="codicePost" value="<?php echo $answer["codicePost"]; ?>" hidden />
                                <input type="text" name="codiceCommento" value="<?php echo $answer["codiceCommento"]; ?>" hidden />
                                <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />

                                <textarea id="testo_commento" name="testo_commento" rows="4" maxlength="500" class="form-control mb-2"><?php echo htmlspecialchars($answer["testo"]); ?></textarea>

                                <div class="d-flex gap-2">
                                    <input type="submit" name="modificaCommento" value="Conferma Modifica" class="btn btn-primary btn-sm rounded-pill">
                                    <button type="button" class="btn btn-secondary btn-sm rounded-pill btn-commento-update-collapse d-none">Annulla</button>
                                </div>
                            </form>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm rounded-pill btn-commento-update-expand">Modifica Commento</button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($post["commenti"])): ?>
                    <p class="text-muted fst-italic">Nessuna risposta presente.</p>
                <?php endif; ?>
            </section>

            <div class="d-flex justify-content-end gap-2 mt-3 flex-wrap">
                <?php if (!empty($_SESSION)): ?>
                    <a href="creazione-commento.php?action=commento&id=<?php echo $post['codicePost']; ?>&crea_email=<?php echo $post['crea_email']; ?>"
                        class="btn btn-primary rounded-pill px-4">Rispondi</a>
                <?php endif; ?>

                <button class="btn btn-primary rounded-pill px-4 btn-generic-show-answer d-none">Mostra Risposte</button>
                <button class="btn btn-primary rounded-pill px-4 btn-generic-hid-answer d-none">Nascondi Risposte</button>

                <button class="btn btn-primary rounded-pill px-4 btn-generic-expand">Espandi</button>
                <button class="btn btn-secondary rounded-pill px-4 btn-generic-collapse d-none">Riduci</button>
            </div>
        </div>
    </article>
<?php endforeach; ?>

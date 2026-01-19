<?php if (empty($templateParams["recensioni"])): ?>
    <p>Al momento Non hai scritto Recensioni</p>
<?php endif; ?>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4">Torna al profilo</a>
        <a href="creazione-post.php" class="btn btn-primary rounded-pill px-4">Nuovo Post</a>
    </div>
<?php endif; ?>

<?php foreach ($templateParams["recensioni"] as $recensione): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div class="card-body position-relative">

            <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="text-break">
                    <h2 class="card-title fw-bold mb-1">
                        <?php echo htmlspecialchars($recensione["titolo"]); ?>
                    </h2>
                    <p class="card-subtitle text-muted small mb-0">
                        <?php echo htmlspecialchars($recensione["data"]); ?> ·
                        <?php echo htmlspecialchars($recensione["crea_email"]); ?>
                    </p>
                </div>

                <?php if (!empty($_SESSION) && ($_SESSION["admin"] || ($_SESSION["email"] === $recensione["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST" class="ms-3">
                        <input type="text" name="cancellaCreaEmail" value="<?php echo $recensione["crea_email"]; ?>" hidden />
                        <input type="text" name="cancellaCodicePost" value="<?php echo $recensione["codicePost"]; ?>" hidden />
                        <input type="text" name="cancellaTipoPost" value="R" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                        <input type="submit" name="eliminaPost"
                               value="Elimina Recensione"
                               class="btn btn-danger btn-sm flex-shrink-0">
                    </form>
                <?php endif; ?>
            </div>

            <section class="card-text recensione-extra-info d-none">
                <p class="fw-semibold mb-1 text-primary">
                    <?php echo htmlspecialchars($recensione["nome"]); ?>
                </p>

                <span class="badge bg-primary">
                    Valutazione: <?php echo htmlspecialchars($recensione["valutazione"]); ?>
                </span>

                <p class="text-break mt-1">
                    <?php echo nl2br(htmlspecialchars($recensione["testo"])); ?>
                </p>

                <?php if (!empty($_SESSION) && (($_SESSION["email"] === $recensione["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST" class="form-modifica-recensione d-none mt-4">
                        <input type="text" name="creaEmail" value="<?php echo $recensione["crea_email"]; ?>" hidden />
                        <input type="text" name="codicePost" value="<?php echo $recensione["codicePost"]; ?>" hidden />
                        <input type="text" name="tipoPost" value="R" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />

                        <div class="mb-2">
                            <select id="voto" name="voto" class="form-select form-select-sm">
                                <?php
                                for ($voto = 5; $voto >= 0; $voto -= 0.1) {
                                    $v = number_format($voto, 1);
                                    $selected = ($recensione["valutazione"] == $v) ? "selected" : "";
                                    echo "<option value=\"$v\" $selected>$v</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <textarea id="testo_post"
                                  name="testo_post"
                                  rows="6"
                                  maxlength="1000"
                                  class="form-control mb-2"><?php echo htmlspecialchars($recensione["testo"]); ?></textarea>

                        <div class="d-flex gap-2">
                            <input type="submit"
                                   name="modificaPost"
                                   value="Conferma Modifica"
                                   class="btn btn-primary btn-sm rounded-pill">
                            <button type="button"
                                    class="btn btn-secondary btn-sm rounded-pill btn-rec-update-collapse d-none">
                                Annulla
                            </button>
                        </div>
                    </form>

                    <div class="d-flex gap-2 mt-2">
                        <button class="btn btn-primary btn-sm rounded-pill btn-rec-update-expand">
                            Modifica Recensione
                        </button>
                    </div>
                <?php endif; ?>
            </section>

            <div class="d-flex justify-content-end gap-2 mt-3">
                <button class="btn btn-primary rounded-pill px-4 btn-recensione-expand">Espandi</button>
                <button class="btn btn-secondary rounded-pill px-4 btn-recensione-collapse d-none">Riduci</button>
            </div>

        </div>
    </article>
<?php endforeach; ?>

<?php if (empty($templateParams["recensioni"])): ?>
    <p>Al momento Non hai scritto Recensioni</p>
<?php endif; ?>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
        <a href="creazione-post.php" class="btn btn-primary rounded-pill px-4"> Nuovo Post</a>
    </div>
<?php endif; ?>

<?php foreach ($templateParams["recensioni"] as $recensione): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div class="card-body">
            <div class="mb-3">
                <h2 class="card-title fw-bold mb-1">
                    <?php echo $recensione["titolo"]; ?>
                </h2>
                <?php if (!empty($_SESSION) && ($_SESSION["admin"] || ($_SESSION["email"] === $recensione["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST">
                        <input type="text" name="cancellaCreaEmail" value="<?php echo $recensione["crea_email"]; ?>" hidden />
                        <input type="text" name="cancellaCodicePost" value="<?php echo $recensione["codicePost"]; ?>" hidden />
                        <input type="text" name="cancellaTipoPost" value="R" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                        <input type="submit" name="eliminaPost" value="Elimina Recensione"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-3">
                    </form>
                <?php endif; ?>
                <p class="card-subtitle text-muted small">
                    <?php echo $recensione["data"]; ?> · <?php echo $recensione["crea_email"]; ?>
                </p>
            </div>

            <section class="card-text recensione-extra-info d-none">
                <p class="fw-semibold mb-1">
                    <?php echo $recensione["nome"]; ?>
                </p>

                <p class="badge bg-primary mb-2">
                    Valutazione: <?php echo $recensione["valutazione"]; ?>
                </p>

                <p class="mt-2 mb-0">
                    <?php echo $recensione["testo"]; ?>
                </p>
                <?php if (!empty($_SESSION) && (($_SESSION["email"] === $recensione["crea_email"]))): ?>
                    <form action="modifica-contenuto.php" method="POST" class="form-modifica-recensione d-none">
                        <input type="text" name="creaEmail" value="<?php echo $recensione["crea_email"]; ?>" hidden />
                        <input type="text" name="codicePost" value="<?php echo $recensione["codicePost"]; ?>" hidden />
                        <input type="text" name="tipoPost" value="R" hidden />
                        <input type="text" name="paginaDiRitorno" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" hidden />
                        <select id="voto" name="voto" class="form-select">
                            <?php
                            for ($voto = 5; $voto >= 0; $voto -= 0.1) {
                                $v = number_format($voto, 1);
                                $str1 = "<option value=\"$v\"";
                                if ($recensione["valutazione"] == $v) {
                                    $str2 = "selected";
                                } else {
                                    $str2 = "";
                                }
                                $str3 = ">$v</option>";
                                echo $str1.$str2.$str3;
                            }
                            ?>
                        </select><br /><br />
                        <textarea id="testo_post" name="testo_post" rows="20" cols="120" maxlength="1000"
                            class="form-control"><?php echo $recensione["testo"] ?></textarea><br /><br />
                        <input type="submit" name="modificaPost" value="Conferma Modifica"
                            class="btn btn-primary rounded-pill btn-sm">
                    </form>
                    <button class="btn btn-primary rounded-pill px-4 btn-rec-update-expand mx-1">Modifica Recensione</button>
                    <button class="btn btn-primary rounded-pill px-4 btn-rec-update-collapse d-none mx-1">Annulla</button>
                <?php endif; ?>
            </section>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary rounded-pill px-4 btn-recensione-expand">Espandi</button>
                <button class="btn btn-primary rounded-pill px-4 btn-recensione-collapse d-none">Riduci</button>
            </div>
        </div>
    </article>
<?php endforeach; ?>
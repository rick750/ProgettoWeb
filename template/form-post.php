<?php if (isset($templateParams["errore_post"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_post"]; ?>
    </div>
<?php endif; ?>

<div class="container my-5">
    <div class="justify-content-center">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="creazione-post.php" method="POST">
                        <fieldset>
                            <legend class="fw-bold text-uppercase text-primary mb-4 text-center">Nuovo Post</legend>                            
                            <div class="mb-4">
                                <label for="titolo" class="form-label fw-semibold">Titolo</label>
                                <input type="text" id="titolo" name="titolo" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tipo di post</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="generico" name="tipo_post" value="generico">
                                    <label class="form-check-label" for="generico">
                                        Generico
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="recensione" name="tipo_post" value="recensione">
                                    <label class="form-check-label" for="recensione">
                                        Recensione
                                    </label>
                                </div>
                            </div>

                            <div id="sezione_recensione_videogioco" class="border rounded p-3 mb-4">
                                <p class="fw-semibold text-primary mb-3">Dettagli recensione</p>

                                <div class="mb-3">
                                    <label for="scelta_gioco" class="form-label">Videogioco</label>
                                    <select id="scelta_gioco" name="scelta_gioco" class="form-select">
                                        <option value="" disabled selected>-- Seleziona un videogioco --</option>
                                        <?php foreach ($templateParams["giochi"] as $gioco): ?>
                                            <option value="<?php echo $gioco["codiceGioco"]; ?>">
                                                <?php echo $gioco["nome"]; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="voto" class="form-label">Voto</label>
                                    <select id="voto" name="voto" class="form-select">
                                        <option value="" disabled selected>-- Seleziona un voto --</option>
                                        <?php
                                        for ($voto = 5; $voto >= 0; $voto -= 0.1) {
                                            $v = number_format($voto, 1);
                                            echo "<option value=\"$v\">$v</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div>
                                    <label for="testo_rec" class="form-label">Testo della recensione</label>
                                    <textarea id="testo_rec" name="testo_rec" rows="8" maxlength="1000"
                                            class="form-control"></textarea>
                                </div>
                            </div>

                            <div id="sezione_generico" class="border rounded p-3 mb-4">
                                <p class="fw-semibold text-primary mb-3">Contenuto post</p>

                                <label for="testo_post" class="form-label">Testo del post</label>
                                <textarea id="testo_post" name="testo_post" rows="8" maxlength="1000"
                                        class="form-control"></textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
                                <input type="reset" value="Cancella" class="btn btn-secondary rounded-pill px-4">
                            </div>
                        </fieldset>
                    </form>                        
                </div>
            </div>

            <?php if (isset($templateParams["indietro"])): ?>
                <div class="text-center mt-4">
                    <a href="<?php echo $templateParams["indietro"]; ?>"
                       class="btn btn-secondary rounded-pill px-4">
                        Indietro
                    </a>
                </div>
            <?php endif; ?>

        </div>
</div>

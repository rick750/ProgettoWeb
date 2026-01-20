<?php if (isset($templateParams["errore_gioco"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_gioco"]; ?>
    </div>
<?php endif; ?>

<div class="container my-5">
    <div class="justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="creazione-gioco.php" method="POST" enctype="multipart/form-data">
                    <h1 class="fw-bold text-uppercase text-primary mb-4 text-center">
                        Inserisci i dati del nuovo gioco
                    </h1>

                    <fieldset class=" justify-content-center">

                        <div class="mb-3">
                            <label for="nome" class="form-label fw-semibold">
                                Nome
                            </label>
                            <input type="text" id="nome" name="nome" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="pubblicazione" class="form-label fw-semibold">
                                Anno di pubblicazione
                            </label>
                            <input type="date" id="pubblicazione" name="pubblicazione" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="softwareHouse" class="form-label fw-semibold">
                                Software House
                            </label>
                            <input type="text" id="softwareHouse" name="softwareHouse" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="valutazione" class="form-label fw-semibold">
                                Valutazione giornalistica
                            </label>
                            <select id="valutazione" name="valutazione" class="form-select">
                                <option value="" disabled selected>
                                    -- Seleziona una valutazione --
                                </option>
                                <?php
                                for ($voto = 5; $voto >= 0; $voto -= 0.1) {
                                    $v = number_format($voto, 1);
                                    echo "<option value=\"$v\">$v</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Tag
                            </label>
                            <div class="d-flex flex-wrap gap-3">
                                <?php foreach ($templateParams["tags"] as $tag): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                            value="<?php echo($tag["codiceTag"]); ?>" id="<?php echo($tag["codiceTag"]); ?>">
                                        <label class="form-check-label" for="<?php echo($tag["codiceTag"]); ?>">
                                            <?php echo(ucfirst($tag["nome"])); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="descrizione" class="form-label fw-semibold">
                                Descrizione
                            </label>
                            <textarea id="descrizione" name="descrizione" rows="6" maxlength="500" class="form-control"
                                placeholder="Inserisci una breve descrizione del gioco"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="immagine" class="form-label fw-semibold">
                                Immagine del gioco
                            </label>
                            <input type="file" name="immagine" id="immagine" accept="image/*" class="form-control" required>
                        </div>

                        <input type="hidden" id="gioco" name="gioco" value="gioco">

                        <div class="d-flex gap-3 justify-content-end flex-wrap">
                            <input type="submit" value="Aggiungi" class="btn btn-primary rounded-pill px-4">
                            <input type="reset" value="Cancella" class="btn btn-secondary rounded-pill px-4">
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
<?php if (isset($templateParams["errore_torneo"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_torneo"]; ?>
    </div>
<?php endif; ?>
<div class="container my-5">
    <div class="justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="creazione-torneo.php" method="POST">
                    <h1 class="fw-bold text-uppercase text-primary mb-4 text-center">
                        Inserisci i dati del nuovo Torneo
                    </h1>

                    <fieldset class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">

                            <div class="mb-3">
                                <label for="scelta_gioco" class="form-label fw-semibold">
                                    Scegli il gioco
                                </label>
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
                                <label for="data" class="form-label fw-semibold">
                                    Data del torneo
                                </label>
                                <input type="date" id="data" name="data" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label for="descrizione" class="form-label fw-semibold">
                                    Descrizione
                                </label>
                                <textarea id="descrizione" name="descrizione" rows="6" maxlength="300"
                                    class="form-control"
                                    placeholder="Inserisci una breve descrizione del torneo"></textarea>
                            </div>

                            <input type="hidden" name="torneo" value="torneo">

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
                    <a href="<?php echo $templateParams["indietro"]; ?>"
                       class="btn btn-secondary rounded-pill px-4">
                        Indietro
                    </a>
                </div>
            <?php endif; ?>
    </div>
</div>


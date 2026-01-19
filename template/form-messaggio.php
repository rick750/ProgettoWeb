<?php if (isset($templateParams["errore_messaggio"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_messaggio"]; ?>
    </div>
<?php endif; ?>

<div class="container my-5">
    <div class="justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="creazione-messaggio.php" method="POST">

                    <h1 class="text-center fw-bold text-uppercase text-primary mb-4">
                        Scrivi il nuovo messaggio
                    </h1>

                    <fieldset class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-8">

                            <div class="mb-3">
                                <label for="scelta_destinatario" class="form-label fw-semibold">
                                    Destinatario
                                </label>
                                <select id="scelta_destinatario" name="scelta_destinatario" class="form-select">
                                    <?php if (strlen($templateParams["destinatarioObbligato"]) > 5): ?>
                                        <option value="<?php echo $templateParams["destinatarioObbligato"]; ?>" selected>
                                            <?php echo $templateParams["destinatarioObbligato"]; ?>
                                        </option>
                                    <?php else: ?>
                                        <?php if ($_SESSION["admin"]): ?>
                                            <option value="" disabled selected>-- Scrivi a --</option>
                                            <option value="tutti">Invia a tutti</option>
                                        <?php endif; ?>
                                        <?php foreach ($templateParams["utenti"] as $utente): ?>
                                            <option value="<?php echo $utente["email"]; ?>">
                                                <?php echo $utente["email"]; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="testo" class="form-label fw-semibold">
                                    Testo del messaggio
                                </label>
                                <textarea id="testo"
                                          name="testo"
                                          rows="6"
                                          maxlength="600"
                                          class="form-control"
                                          placeholder="Scrivi qui il messaggio..."></textarea>
                            </div>

                            <input type="text" value="messaggio" name="messaggio" hidden>
                            <input type="hidden" name="destinatarioObbligato"
                                   value="<?php echo $templateParams['destinatarioObbligato']; ?>">
                            <input type="hidden" name="indietro"
                                   value="<?php echo $templateParams['indietro']; ?>">

                            <div class="d-flex gap-3 justify-content-end flex-wrap">
                                <input type="submit" value="Invia"
                                       class="btn btn-primary rounded-pill px-4">
                                <input type="reset" value="Cancella"
                                       class="btn btn-secondary rounded-pill px-4">
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

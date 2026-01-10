<?php if (isset($templateParams["errore_messaggio"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_messaggio"]; ?>
    </div>
<?php endif; ?>
<form action="creazione-messaggio.php" method="POST">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Scrivi il nuovo Messaggio:</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
            <select id="scelta_destinatario" name="scelta_destinatario" class="form-select">
                <option value="" disabled selected>-- Scrivi a --</option>
                <?php if($_SESSION["admin"]): ?>
                    <option value="tutti">
                        Invia a tutti
                    </option>
                <?php endif;?>
                <?php foreach ($templateParams["utenti"] as $utente): ?>
                    <option value="<?php echo $utente["email"]; ?>">
                        <?php echo $utente["email"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br /><br />
            <label for="testo" class="form-textarea-label">Testo</label><br />
            <textarea id="testo" name="testo" value="testo" rows="10" cols="120" maxlength="600"
                class="form-control"></textarea><br /><br />
            <input type="text" value="messaggio" name="messaggio" hidden>
    </fieldset>
    <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 my-4">Indietro</a>
    </div>
<?php endif; ?>
<?php if (isset($templateParams["errore_torneo"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_torneo"]; ?>
    </div>
<?php endif; ?>

<form action="creazione-torneo.php" method="POST">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci i dati del nuovo Torneo</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
        <div id="sezione_scelta_gioco" class="container-fluid text-center">
            <label for="scelta_gioco" class="form-label">Scegli il gioco:</label>
            <select id="scelta_gioco" name="scelta_gioco" class="form-select">
                <option value="" disabled selected>-- Seleziona un videogioco --</option>
                <?php foreach ($templateParams["giochi"] as $gioco): ?>
                    <option value="<?php echo $gioco["codiceGioco"]; ?>">
                        <?php echo $gioco["nome"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br /><br />
            <label for="data" class="form-radio-label ps-4">Data</label>
            <input type="date" id="data" name="data" value="data"><br /><br />
            <label for="descrizione" class="form-textarea-label">Descrizione</label><br />
            <textarea id="descrizione" name="descrizione" value="descrizione" rows="10" cols="120" maxlength="300"
                class="form-control"></textarea><br /><br />
            
            <input type="text" name="torneo" value="torneo" hidden>
        </div>
    </fieldset>
    <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 my-4">Indietro</a>
    </div>
<?php endif; ?>
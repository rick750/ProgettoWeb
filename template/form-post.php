<form action="creazione-post.php" method="POST">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci i dati del nuovo Post</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
        <label for="titolo" class="form-text-label">Titolo</label><br />
        <input type="text" id="titolo" name="titolo" class="form-text-input" /><br /><br />
        <label class="form-label">Tipo di post</label><br />
        <label for="generico" class="form-radio-label">Generico</label>
        <input type="radio" id="generico" name="tipo_post" value="generico" class="form-radio-input">
        <label for="recensione" class="form-radio-label ps-4">Recensione</label>
        <input type="radio" id="recensione" name="tipo_post" value="recensione" class="form-radio-input"><br /><br />

        <div id="sezione_recensione_videogioco" class="container-fluid text-center">
            <label for="scelta_gioco" class="form-label">Scegli il gioco da recensire:</label>
            <select id="scelta_gioco" name="scelta_gioco" class="form-select">
                <option value="" disabled selected>-- Seleziona un videogioco --</option>
                <?php foreach ($templateParams["giochi"] as $gioco): ?>
                    <option value="<?php echo $gioco["codiceGioco"]; ?>">
                        <?php echo $gioco["nome"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br /><br />

            <label for="voto" class="form-label">Valuta il gioco secondo la tua opinione:</label>
            <select id="voto" name="voto" class="form-select">
                <option value="" disabled selected>-- Seleziona un voto --</option>
                <?php
                for ($voto = 0; $voto <= 5; $voto += 0.5) {
                    $v = number_format($voto, 1);
                    echo "<option value=\"$v\">$v</option>";
                }
                ?>
            </select><br /><br />
            <label for="testo_rec" class="form-textarea-label">Testo della recensione</label><br />
            <textarea id="testo_rec" name="testo_rec" rows="20" cols="120" maxlength="1000"
                class="form-control"></textarea><br /><br />
        </div>

        <div id="sezione_generico" class="container-fluid text-center">
            <label for="testo_post" class="form-label">Testo del post</label><br />
            <textarea id="testo_post" name="testo_post" rows="20" cols="120" maxlength="1000"
                class="form-control"></textarea><br /><br />
        </div>


    </fieldset>
    <input type="submit" value="Invia" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 my-4"> Torna al profilo</a>
    </div>
<?php endif; ?>
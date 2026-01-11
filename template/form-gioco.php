<?php if (isset($templateParams["errore_gioco"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_gioco"]; ?>
    </div>
<?php endif; ?>

<form action="creazione-gioco.php" method="POST" enctype="multipart/form-data">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci i dati del nuovo gioco</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
        <label for="nome" class="form-text-label">Nome</label><br />
        <input type="text" id="nome" name="nome" /><br /><br />
        <label for="pubblicazione" class="form-data-label">Anno di pubblicazione</label><br />
        <input type="date" id="pubblicazione" name="pubblicazione"><br /><br />
        <label for="softwareHouse" class="form-text-label">Software House</label><br />
        <input type="text" id="softwareHouse" name="softwareHouse"><br /><br />
        <select id="valutazione" name="valutazione" class="form-select">
                <option value="" disabled selected>-- Seleziona una valutazione --</option>
                <?php
                for ($voto = 5; $voto >= 0; $voto -= 0.1) {
                    $v = number_format($voto, 1);
                    echo "<option value=\"$v\">$v</option>";
                }
                ?>
        </select><br /><br />
        <label for="tags">Seleziona uno o più tag:</label><br/>
        <?php foreach ($templateParams["tags"] as $tag): ?>
            <label class="mx-2">
                <input  type="checkbox" name="tags[]" value="<?= $tag["codiceTag"]?>">
                <?= ucfirst($tag["nome"]) ?>
            </label> 
        <?php endforeach; ?><br /><br />
        <label for="descrizione" class="form-textarea-label">Descrizione</label><br />
        <textarea id="descrizione" name="descrizione" value="descrizione" rows="10" cols="120" maxlength="500"
            class="form-control"></textarea><br /><br />

        <label for="immagine" class="form-file-label">Seleziona immagine:</label>
        <input type="file" name="immagine" accept="image/*" required>
        <input type="text" id="gioco" name="gioco" value="gioco" hidden>
    </fieldset>
    <input type="submit" value="Aggiungi" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>

<?php if (isset($templateParams["indietro"])): ?>
    <div class="mb-3">
        <a href="<?php echo $templateParams["indietro"]; ?>" class="btn btn-primary rounded-pill px-4 my-4">Indietro</a>
    </div>
<?php endif; ?>
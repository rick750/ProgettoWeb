<?php if (isset($templateParams["errore_login"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_login"]; ?>
    </div>
<?php endif; ?>

<?php if (isset($templateParams["errore_registrazione"])): ?>
    <div class="alert alert-danger">
        <?php echo $templateParams["errore_registrazione"]; ?>
    </div>
<?php endif; ?>

<form action="registrazione.php" method="POST">
    <h1 class="fw-bold text-uppercase text-primary mb-0">Inserisci i dati del tuo nuovo profilo</h1>
    <fieldset class=" flex-wrap align-items-center gap-3">
        <label for="nome" class="form-text-label">Nome</label><br />
        <input type="text" id="nome" name="nome" /><br /><br />
        <label for="cognome" class="form-text-label">Cognome</label><br />
        <input type="text" id="cognome" name="cognome"><br /><br />
        <label for="data_nascita" class="form-data-label">Data di nascita</label><br />
        <input type="date" id="data_nascita" name="data_nascita"><br /><br />
        <label for="matricola" class="form-number-label">Matricola</label><br />
        <input type="number" id="matricola" name="matricola"><br /><br />
        <label for="email" class="form-text-label">Mail istituzionale</label><br />
        <input type="text" id="email" name="email"><br /><br />
        <label for="password" class="form-text-label">Password</label><br />
        <input type="password" id="password" name="password"><br /><br />
        <label for="corso" class="form-label">Corso di laurea seguito:</label>
        <select id="corso" name="codiceCorso" class="form-select">
            <option value="" disabled selected>-- Seleziona un corso di laurea --</option>
            <?php foreach ($templateParams["corsi"] as $corso): ?>
                <option id="<?php echo getValueFromCorso($corso["nome"]); ?>" value="<?php echo ($corso["codiceCorso"]); ?>">
                    <?php echo $corso["nome"]; ?></option>
            <?php endforeach; ?>
        </select><br /><br />
        <label for="descr" class="form-label">Dicci qualcosa di te!</label><br />
        <textarea id="descr" name="descr" rows="5" cols="50" maxlength="200"
            class="form-control"></textarea><br /><br />
    </fieldset>
    <input type="submit" value="Registrati" class="btn btn-primary rounded-pill px-4">
    <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
</form>
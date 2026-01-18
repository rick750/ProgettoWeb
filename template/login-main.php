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

<div class="container py-3">
    <div class="row justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="fw-bold text-uppercase text-primary mb-4 text-center">
                    Inserisci i dati del tuo nuovo profilo
                </h1>

                <form action="registrazione.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="cognome" class="form-label">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_nascita" class="form-label">Data di nascita</label>
                        <input type="date" id="data_nascita" name="data_nascita" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="matricola" class="form-label">Matricola</label>
                        <input type="number" id="matricola" name="matricola" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Mail istituzionale</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="corso" class="form-label">Corso di laurea seguito:</label>
                        <select id="corso" name="codiceCorso" class="form-select" required>
                            <option value="" disabled selected>-- Seleziona un corso di laurea --</option>
                            <?php foreach ($templateParams["corsi"] as $corso): ?>
                                <option id="<?php echo getValueFromCorso($corso["nome"]); ?>" value="<?php echo $corso["codiceCorso"]; ?>">
                                    <?php echo $corso["nome"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="descr" class="form-label">Dicci qualcosa di te!</label>
                        <textarea id="descr" name="descr" rows="5" maxlength="200" class="form-control"></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <input type="submit" value="Registrati" class="btn btn-primary rounded-pill px-4">
                        <input type="reset" value="Cancella" class="btn btn-outline-primary rounded-pill px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


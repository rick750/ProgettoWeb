<?php if (isset($templateParams["errore_login"])): ?>
    <div class="alert alert-danger text-center">
        <?php echo $templateParams["errore_login"]; ?>
    </div>
<?php endif; ?>

<?php if (isset($templateParams["errore_registrazione"])): ?>
    <div class="alert alert-danger text-center">
        <?php echo $templateParams["errore_registrazione"]; ?>
    </div>
<?php endif; ?>

<a href="#aside"
   class="d-block d-md-none text-center mb-3 fw-semibold link-primary text-decoration-none">
    Sei già registrato? Vai al login
</a>

<div class="container my-2">
    <div class="justify-content-center">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h2 class="fw-bold text-uppercase text-primary mb-4 text-center">
                    Inserisci i dati del tuo nuovo profilo
                </h2>

                <form action="registrazione.php" method="POST" novalidate>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nome:<input type="text" name="nome" class="form-control" required></label>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cognome:<input type="text" name="cognome" class="form-control" required></label>
                            
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Data di nascita:<input type="date" name="data_nascita" class="form-control" required></label>
                            
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Matricola:<input type="text" name="matricola" class="form-control" required></label>
                            
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Mail istituzionale:<input type="email" name="email" class="form-control" required></label>
                            
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Password:<input type="password" name="password" class="form-control" required></label>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold" for="scelta_corso">Corso di laurea</label>
                            <select name="codiceCorso" class="form-select" id="scelta_corso" required>
                                <option value="" disabled selected>-- Seleziona un corso di laurea --</option>
                                <?php foreach ($templateParams["corsi"] as $corso): ?>
                                    <option value="<?php echo $corso["codiceCorso"]; ?>">
                                        <?php echo $corso["nome"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold" for="descrizione">Dicci qualcosa di te</label>
                            <textarea name="descr" rows="4" maxlength="200" class="form-control" id="descrizione"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <input type="submit" value="Registrati" class="btn btn-primary rounded-pill px-4">
                        <input type="reset" value="Cancella" class="btn btn-secondary rounded-pill px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
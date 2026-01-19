<article class="card h-100 shadow-sm border-0">
    <div class="card-body p-4">
        <h5 class="card-title fw-bold text-center mb-4">
            Dati Utente
        </h5>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <span class="text-muted small">Nome</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["nome"]; ?>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <span class="text-muted small">Cognome</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["cognome"]; ?>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <span class="text-muted small">Data di nascita</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["dataDiNascita"]; ?>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <span class="text-muted small">Matricola</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["matricola"]; ?>
                </p>
            </div>

            <div class="col-12">
                <span class="text-muted small">Email</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["email"]; ?>
                </p>
            </div>

            <div class="col-12">
                <span class="text-muted small">Corso</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["nomeCorso"]; ?>
                </p>
            </div>

            <div class="col-12">
                <span class="text-muted small">Descrizione</span>
                <p class="fw-semibold mb-0">
                    <?php echo $templateParams["utente"]["descrizione"]; ?>
                </p>
            </div>
        </div>
        <?php if (isset($_SESSION["pagina_precedente"])): ?>
            <div class="d-flex justify-content-end mt-5">
                <a href="<?php echo $_SESSION["pagina_precedente"]; ?>" class="btn btn-primary rounded-pill px-4">
                    Indietro
                </a>
            </div>
        <?php endif; ?>

    </div>
</article>
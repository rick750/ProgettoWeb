<?php if ((basename($_SERVER['PHP_SELF']) === 'profilo.php') && !empty($_SESSION)): ?>
    <div class="row">
        <div class="col-3 d-grid"></div>
        <div class="mb-3 col-6 d-grid">
            <button id="logout" class="btn fw-bold rounded-pill py-2 btn-info">Log Out</button>
        </div>
    </div>
<?php endif; ?>

<?php foreach ($templateParams["giochiRandomFunc"] as $giocoRandom): ?>
    <article class="card mb-3 shadow-sm border-0">

        <div class="card-body p-3 text-center">
            <header class="mb-2">
                <h2 class="card-title h6 fw-bold mb-1">
                    <?php echo $giocoRandom["nome"]; ?>
                </h2>
            </header>
            <section class="card-text small text-muted">
                <img class="img-fluid" src="upload/<?php echo $giocoRandom["immagine"]; ?>"
                    alt="immagine di <?php echo $giocoRandom["nome"]; ?>" />
                <p class="badge bg-primary mb-2">
                    Valutazione: <?php echo $giocoRandom["valutazioneGiornalistica"]; ?>
                </p>
                <p class="mb-0">
                    <?php echo $giocoRandom["listaTag"]; ?>
                </p>
            </section>
        </div>
    </article>
<?php endforeach; ?>
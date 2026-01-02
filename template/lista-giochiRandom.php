<?php foreach($templateParams["giochiRandomFunc"] as $giocoRandom): ?>
<article class="card mb-3 shadow-sm border-0 border-start border-3 border-primary">
    <div class="card-body p-3 text-center">
        <header class="mb-2">
            <h2 class="card-title h6 fw-bold mb-1">
                <?php echo $giocoRandom["nome"]; ?>
            </h2>
        </header>
        <section class="card-text small text-muted">
            <p class="mb-1">
                <?php echo $giocoRandom["valutazioneGiornalistica"]; ?>
            </p>
            <p class="mb-0">
                <?php echo $giocoRandom["listaTag"]; ?>
            </p>
        </section>
    </div>
</article>
<?php endforeach; ?>

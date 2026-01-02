<?php foreach($templateParams["libreriaGiochiFunc"] as $gioco): ?>
<article class="border rounded p-4 text-center bg-light">
    <header>
        <h2><?php echo $gioco["nome"]; ?></h2>
    </header>
    <section>
        <p><?php echo $gioco["valutazioneGiornalistica"]; ?></p>
        <p><?php echo $gioco["listaTag"]; ?></p>
    </section>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary rounded-pill px-4">
            Espandi
        </button>
    </div>

</article>
<?php endforeach; ?>
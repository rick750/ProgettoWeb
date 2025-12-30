<?php foreach($templateParams["giochiRandomFunc"] as $giocoRandom): ?>
<article class="border rounded p-4 text-center bg-light">
    <header>
        <h2><?php echo $giocoRandom["nome"]; ?></h2>
    </header>
    <section>
        <p><?php echo $giocoRandom["valutazioneGiornalistica"]; ?></p>
        <p><?php echo $giocoRandom["listaTag"]; ?></p>
    </section>
</article>
<?php endforeach; ?>
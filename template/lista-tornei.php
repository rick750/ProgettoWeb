<?php foreach($templateParams["tornei"] as $torneo): ?>
<article>
    <header>
        <h2><?php echo $torneo["nomeTorneo"]; ?></h2>
        <p>Torneo di <?php echo $torneo["nomeGioco"]; ?> - In data <?php echo $torneo["data"]; ?></p>
    </header>
    <section>
        <p><?php echo $torneo["descrizione"]; ?></p>
    </section>
</article>
<?php endforeach; ?>
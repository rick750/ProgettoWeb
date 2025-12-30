<?php foreach ($templateParams["tornei"] as $torneo): ?>
<article class="border rounded p-3 mb-4 position-relative">
    <header>
        <h2 class="h5"><?php echo $torneo["nomeTorneo"]; ?></h2>
        <p class="text-muted mb-2">
            Torneo di <?php echo $torneo["nomeGioco"]; ?> – 
            <?php echo $torneo["data"]; ?>
        </p>
    </header>

    <section>
        <p><?php echo $torneo["descrizione"]; ?></p>
    </section>

    <div class="position-absolute bottom-0 end-0 m-3">
        <button type="submit" class="btn btn-primary btn-sm">
            Iscriviti
        </button>
    </div>
</article>
<?php endforeach; ?>

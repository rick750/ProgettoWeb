<div class="mb-3">
    <div class="text-center">
    <h3 class="mb-2">Recensioni di:</h4>
        <a href="#<?php echo getIdFromStringa($templateParams["nomeGioco"]); ?>"
            class="badge bg-primary text-decoration-none fs-6 px-3 py-2 rounded-pill">
            <?php echo htmlspecialchars($templateParams["nomeGioco"]); ?>
        </a>
    </div>
</div>


<?php if (empty($templateParams["recensioni"])): ?>
    <p>Nessuna recensione disponibile per il gioco selezionato </p>
<?php else: ?>
    <?php foreach ($templateParams["recensioni"] as $rec): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="fw-bold"><?php echo $rec["crea_email"]; ?></h5>
                <p><?php echo $rec["data"]; ?></p>
                <p class="badge bg-primary">Valutazione Utente: <?php echo $rec["valutazione"]; ?></p>
                <p><?php echo $rec["testo"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
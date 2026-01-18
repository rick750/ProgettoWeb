<h2 class="mb-4">Recensioni di:</h2>
<a href="#<?php echo getIdFromGioco($templateParams["nomeGioco"]);?>"><?php echo($templateParams["nomeGioco"]);?></a>

<?php if (empty($templateParams["recensioni"])): ?>
    <p>Nessuna recensione disponibile per il gioco selezionato </p>
<?php else: ?>
    <?php foreach ($templateParams["recensioni"] as $rec): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="fw-bold"><?php echo $rec["crea_email"]; ?></h5>
                <p><?php echo $rec["data"]; ?></p>
                <span class="badge bg-primary">Valutazione Utente: <?php echo $rec["valutazione"]; ?></span>
                <p><?php echo $rec["testo"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
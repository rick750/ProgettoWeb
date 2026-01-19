<article id="notifiche">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-6 d-grid mb-3">
                <button class="btn btn-primary rounded-pill px-4 btn-messaggi-inviati d-none">Mostra Messaggi
                    Inviati</button>
                <button class="btn btn-primary rounded-pill px-4 btn-messaggi-ricevuti">Mostra Messaggi
                    Ricevuti</button>
            </div>
            <div class="col-6 d-grid mb-3"></div>
        </div>
    </div>
    <section class="messaggi-inviati">
        <p class="fw-bold">Messaggi Inviati:</p>
        <?php if (empty($templateParams["messaggi_inviati"])): ?>
            <p class="text-muted fst-italic">Non hai ancora inviato messaggi.</p>
        <?php else: ?>
            <?php foreach ($templateParams["messaggi_inviati"] as $messaggioInviato): ?>
                <article class="px-4 py-3 card mb-4 shadow-sm border-0 border-start border-4 border-primary">
                    <div>
                        <h5 >A: <?php echo $messaggioInviato["email"]; ?></h5>
                    </div>

                    <section>
                        <p><?php echo $messaggioInviato["testo"]; ?></p>
                    </section>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <section class="messaggi-ricevuti d-none">
        <p class="fw-bold">Messaggi Ricevuti:</p>
        <?php if (empty($templateParams["messaggi_ricevuti"])): ?>
            <p class="text-muted fst-italic">Non hai ancora ricevuto messaggi.</p>
        <?php else: ?>
            <?php foreach ($templateParams["messaggi_ricevuti"] as $messaggioRicevuto): ?>
                <article class="px-4 py-3 card mb-4 shadow-sm border-0 border-start border-4 border-primary">
                    <div>
                        <h5>Da: <?php echo $messaggioRicevuto["email"]; ?></h5>
                    </div>

                    <section>
                        <p><?php echo $messaggioRicevuto["testo"]; ?></p>
                    </section>
                    <div class="d-flex justify-content-end mt-3">
                    <a href="creazione-messaggio.php?email=<?php echo $messaggioRicevuto['email']; ?>"
                        class="btn btn-primary rounded-pill px-4 mx-1"> Rispondi </a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

</article>
<?php foreach($templateParams["libreriaGiochiFunc"] as $gioco): ?>
    <article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
        <div>
            <img class="img-fluid" src="upload/<?php echo $gioco["immagine"]; ?>" alt="immagine di <?php echo $gioco["nome"]; ?>">
        </div>
        <div class="card-body">
            <header class="mb-3">
                <h2 class="card-title fw-bold mb-1"><?php echo $gioco["nome"]; ?></h2> 
                <span class="badge bg-primary mb-2">
                    Valutazione: <?php echo $gioco["valutazioneGiornalistica"]; ?>
                </span>
            </header>
            <section class="card-text">
                 <p class="fw-semibold mb-2"> Tag: <?php echo $gioco["listaTag"]; ?> </p>
            </section>

            <div class="extra-info d-none">
                <section>
                    <p>Data di rilascio: <?php echo $gioco["annoDiPubblicazione"]; ?></p>
                </section>
                <section>
                    <p>Software House/Sviluppatore: <?php echo $gioco["softwareHouse"]; ?></p>
                </section>
                <section>
                    <p>Descrizione: <?php echo $gioco["descrizione"]; ?></p>
                </section>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary rounded-pill px-4 btn-expand">Espandi</button>
                <button class="btn btn-primary rounded-pill px-4 btn-collapse d-none">Riduci</button>
            </div>
        </div>
    </article>
<?php endforeach; ?>
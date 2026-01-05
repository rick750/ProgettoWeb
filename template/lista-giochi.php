<?php if(empty($templateParams["libreriaGiochiFunc"])): ?>
    <p>Al momento Non hai pubblicato Giochi in Libreria</p>
<?php endif;?>

<?php if (isset($templateParams["indietro"])):?>
    <a href="<?php echo $templateParams["indietro"];?>"
        class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
<?php endif;?>

<div class="row">
<?php foreach($templateParams["libreriaGiochiFunc"] as $gioco): ?>
    <div class="col-12 col-md-6 mb-4">
        <article class="card h-100 shadow-sm border-0 border-start border-4 border-primary">
            <div>
                <img class="img-fluid" src="upload/<?php echo $gioco["immagine"]; ?>" alt="immagine di <?php echo $gioco["nome"]; ?>">
            </div>

            <div class="card-body d-flex flex-column">
                <header class="mb-3">
                    <h2 class="card-title fw-bold mb-1"><?php echo $gioco["nome"]; ?></h2> 
                    <span class="badge bg-primary mb-2">
                        Valutazione: <?php echo $gioco["valutazioneGiornalistica"]; ?>
                    </span>
                </header>

                <section class="card-text">
                    <p class="fw-semibold mb-2">Tag: <?php echo $gioco["listaTag"]; ?></p>
                </section>

                <div class="extra-info d-none">
                    <p>Data di rilascio: <?php echo $gioco["annoDiPubblicazione"]; ?></p>
                    <p>Software House/Sviluppatore: <?php echo $gioco["softwareHouse"]; ?></p>
                    <p>Descrizione: <?php echo $gioco["descrizione"]; ?></p>
                </div>

                <div class="mt-auto d-flex justify-content-end">
                    <button class="btn btn-primary rounded-pill px-4 btn-expand">Espandi</button>
                    <button class="btn btn-primary rounded-pill px-4 btn-collapse d-none">Riduci</button>
                    <a href="giochi.php?action=recensioni&id=<?php echo $gioco['codiceGioco']; ?>"
                     class="btn btn-primary rounded-pill px-4"> Recensioni </a>
                </div>
            </div>
        </article>
    </div>
<?php endforeach; ?>
</div>


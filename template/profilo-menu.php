<div class="col-12 mb-4">
    <div>
        <p> Benvenuto/a <?php echo $_SESSION["nome"]; ?>
            <?php if ($_SESSION["admin"] == true): ?>
                - Amministratore
            <?php else: ?>
                - Utente
            <?php endif; ?>
        </p>
    </div>
    <article class="card h-100 shadow-sm ">
        <div class="card-body">

            <div class="row g-3">
                <div class="col-3 d-grid"></div>

                <div class="col-6 d-grid">
                    <a href="creazione-messaggio.php" class="btn fw-bold rounded-pill py-2 btn-info">Nuovo Messaggio</a>
                </div>
                <div class="col-3 d-grid"></div>


                <div class="col-6 d-grid">
                    <a href="profilo-post.php" class="btn btn-primary rounded-pill px-4">Post Generici</a>
                </div>

                <div class="col-6 d-grid">
                    <a href="profilo-recensioni.php" class="btn btn-primary rounded-pill px-4">Recensioni</a>
                </div>

                <?php if ($_SESSION["admin"] == true): ?>
                    <div class="col-6 d-grid">
                        <a href="profilo-tornei.php" class="btn btn-primary rounded-pill px-4">Tornei Aggiunti</a>
                    </div>
                <?php endif; ?>

                <?php if ($_SESSION["admin"] == true): ?>
                    <div class="col-6 d-grid">
                        <a href="profilo-giochi.php" class="btn btn-primary rounded-pill px-4">Giochi Aggiunti</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </article>
</div>
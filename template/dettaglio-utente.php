<article class="card h-100 shadow-sm ">
    <div class="card-body">
        <p class="fw-bold text-center">Dati Utente:</p>
        <p>Nome: <?php echo $templateParams["utente"]["nome"]; ?></p>
        <p>Cognome: <?php echo $templateParams["utente"]["cognome"]; ?></p>
        <p>Data di Nascita: <?php echo $templateParams["utente"]["dataDiNascita"]; ?></p>
        <p>Matricola: <?php echo $templateParams["utente"]["matricola"]; ?></p>
        <p>Email: <?php echo $templateParams["utente"]["email"]; ?></p>
        <p>Corso: <?php echo $templateParams["utente"]["nomeCorso"]; ?></p>
        <p>Descrizione: <?php echo $templateParams["utente"]["descrizione"]; ?></p>
        <?php if (isset($_SESSION["pagina_precedente"])): ?>
            <div class="mb-3">
                <a href="<?php echo $_SESSION["pagina_precedente"]; ?>"
                    class="btn btn-primary rounded-pill px-4 my-4">Indietro</a>
            </div>
        <?php endif; ?>
    </div>
</article>
<?php if(empty($templateParams["tornei"])): ?>
    <p>Al momento non hai creato nessun Torneo</p>
<?php endif;?>

<?php if($_SESSION["admin"] == true): ?>
        <a href="#"class="btn btn-primary rounded-pill px-4"> Nuovo Torneo</a>
<?php endif;?>

<?php if (isset($templateParams["indietro"])):?>
    <a href="<?php echo $templateParams["indietro"];?>"
        class="btn btn-primary rounded-pill px-4"> Torna al profilo</a>
<?php endif;?>

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


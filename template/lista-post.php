<?php foreach($templateParams["post"] as $post): ?>
<article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
    <div class="card-body">
        <header class="mb-3">
            <h2 class="card-title fw-bold mb-1">
                <?php echo $post["titolo"]; ?>
            </h2>
            <p class="card-subtitle text-muted small">
                <?php echo $post["data"]; ?> · <?php echo $post["crea_email"]; ?>
            </p>
        </header>

        <section class="card-text">
            <p class="mb-0">
                <?php echo $post["testo"]; ?>
            </p>
        </section>
    </div>
</article>
<?php endforeach; ?>


<?php foreach($templateParams["recensioni"] as $recensioni): ?>
<article class="card mb-4 shadow-sm border-0 border-start border-4 border-primary">
    <div class="card-body">
        <header class="mb-3">
            <h2 class="card-title fw-bold mb-1">
                <?php echo $recensioni["titolo"]; ?>
            </h2>
            <p class="card-subtitle text-muted small">
                <?php echo $recensioni["data"]; ?> · <?php echo $recensioni["crea_email"]; ?>
            </p>
        </header>

        <section class="card-text">
            <p class="fw-semibold mb-1">
                <?php echo $recensioni["nome"]; ?>
            </p>

            <span class="badge bg-primary mb-2">
                Valutazione: <?php echo $recensioni["valutazione"]; ?>
            </span>

            <p class="mt-2 mb-0">
                <?php echo $recensioni["testo"]; ?>
            </p>
        </section>
    </div>
</article>
<?php endforeach; ?>

        <?php ?>
        <?php foreach($templateParams["post"] as $post): ?>
        <article>
            <header>
                <h2><?php echo $post["titolo"]; ?></h2>
                <p><?php echo $post["data"]; ?> - <?php echo $post["crea_email"]; ?></p>
            </header>
            <section>
                <p><?php echo $post["testo"]; ?></p>
            </section>
        </article>
        <?php endforeach; ?>
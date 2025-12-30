        <?php ?>
        <?php foreach($templateParams["recensioni"] as $recensioni): ?>
        <article>
            <header>
                <h2><?php echo $recensioni["titolo"]; ?></h2>
                <p><?php echo $recensioni["data"]; ?> - <?php echo $recensioni["crea_email"]; ?></p>
            </header>
            <section>
                <p><?php echo $recensioni["nome"]; ?></p>
                <p><?php echo $recensioni["valutazione"]; ?></p>
                <p><?php echo $recensioni["testo"]; ?></p>
            </section>
        </article>
        <?php endforeach; ?>
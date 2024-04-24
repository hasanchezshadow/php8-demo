<?php
global $data;
global $untilMessage
?>
<main>
    <section>
        <img
                src="<?= $data['poster_url']; ?>"
                alt="Poster de <?= $data['title']; ?>"
                width="200"
                style="border-radius: 16px"
        />
    </section>
    <hgroup>
        <h3>
            <?= $data['title']; ?> - <?= $untilMessage; ?>
            <p>Fecha de estreno: <?= $data['release_date'] ?></p>
            <p>La siguiente es: <?= $data['following_production']['title']; ?></p>
        </h3>
    </hgroup>
</main>

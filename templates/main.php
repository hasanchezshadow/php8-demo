<main>
    <section>
        <img
                src="<?= $poster_url; ?>"
                alt="Poster de <?= $title; ?>"
                width="200"
                style="border-radius: 16px"
        />
    </section>
    <hgroup>
        <h3>
            <?= $title; ?> - <?= $untilMessage; ?>
            <p>Fecha de estreno: <?= $release_date ?></p>
            <p>La siguiente es: <?= $nextMovieTitle; ?></p>
        </h3>
    </hgroup>
</main>

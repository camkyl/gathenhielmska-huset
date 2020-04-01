<?php get_header();  ?>

<section class="landing-page">

    <div class="landing-page__hero">
        <h1>Gathenhielmska</h1>
        <p>This is where the hero image will be. </p>
    </div>

    <div class="landing-page__program">
        <h2>Program</h2>
        <p>Program listed here</p>
    </div>

    <div class="landing-page__about">
        <h2>ett hus ur tiden i tiden</h2>

        <p>
            Vi är ett kulturarv som trots tidens gång förblir lika levande idag.
            Vi öppnar upp och bjuder in till en fristad där människor kan mötas, inspireras och skapa.
            Vi hyllar vårt ursprung, omfamnar det okända och står som en symbol för tidlös kreativitet i mötet mellandåtid, samtid och framtid.
        </p>
    </div>

    <div class="landing-page__news">
        <h2>News</h2>
        <article>
            <h3>title of news</h3>
            <p>text pf news</p>
            <p>image of news</p>
        </article>
    </div>

    <?php

    $args = [
        'post_type' => 'program',
        "category" => "Teater"
    ];

    $music = get_posts($args);

    foreach ($music as $post) {
        echo $post->post_title;
        echo $post->post_content;
    }

    ?>
</section>

<?php get_footer(); ?>

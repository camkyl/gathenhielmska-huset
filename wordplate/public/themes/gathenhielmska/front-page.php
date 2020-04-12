<?php get_header();  ?>

<section class="landing-page">

    <section class="landing-page__hero">
        <h1>Gathenhielmska</h1>
    </section>

    <section class="landing-page__program">
        <div class="landing-page__program__wrapper">
            <div class="heading-wrapper">
                <div class="heading-wrapper__left"></div>
                <h3>Program</h3>
                <div class="heading-wrapper__right"></div>
            </div>

            <p>Program listed here</p>

            <?php

            $args = [
                'post_type' => 'program',
                'numberposts' => 2, // change number
                'order' => 'desc'
                // 'category' => ''
            ];

            $music = get_posts($args);

            foreach ($music as $post) {
                echo $post->post_title;
                echo $post->post_content;
            }

            ?>

            <div class="landing-page__button-wrapper">
                <a href="<?php the_permalink(); ?>">
                    <button>Se hela programmet</button>
                </a>
            </div>
        </div>
    </section>

    <section class="landing-page__about">
        <div class="landing-page__about__wrapper">
            <h3>Ett hus ur tiden i tiden</h3>

            <p>
                Vi är ett kulturarv som trots tidens gång förblir lika levande idag. Vi öppnar upp och bjuder in till en fristad där människor kan mötas, inspireras och skapa.
            </p>
            <p>
                Vi hyllar vårt ursprung, omfamnar det okända och står som en symbol för tidlös kreativitet i mötet mellandåtid, samtid och framtid.
            </p>

            <div class="landing-page__button-wrapper">
                <a href="<?php echo get_bloginfo('url'); ?>/om-huset">
                    <button>Läs mer om huset</button>
                </a>
            </div>
        </div>
    </section>

    <section class="landing-page__news">
        <!--using same styling as in news page-->
        <div class="news">
            <div class="heading-wrapper">
                <div class="heading-wrapper__left"></div>
                <h3>Nyheter</h3>
                <div class="heading-wrapper__right"></div>
            </div>

            <?php $args = ['post_type' => 'news', 'numberposts' => 2, 'order' => 'desc']; ?>
            <?php $news = get_posts($args); ?>

            <?php foreach ($news as $post) : setup_postdata($post) ?>
                <!--using same styling as in news page-->
                <article class="news__article">
                    <?php the_content(); ?>
                </article>
            <?php endforeach; ?>

            <div class="landing-page__button-wrapper">
                <a href="<?php echo get_bloginfo('url'); ?>/news">
                    <button>Läs fler nyheter</button>
                </a>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>

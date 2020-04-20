<?php get_header();  ?>

<section class="landing-page">

    <section class="landing-page__hero">
        <div class="landing-page__hero-video-mobile">
            <img src="<?php echo bloginfo('template_url'); ?>/herovideo/GH-Ingela-Herovideo-Mobile.gif" alt="Ingela Gathenhielmska hero motion">
        </div>

        <div class="landing-page__hero-video-desktop">
            <video autoplay muted loop>
                <source src="<?php echo bloginfo('template_url'); ?>/herovideo/GH_Ingela_Herovideo_Desktop.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>

        <a href="#program" class="arrow">
            <div class="landing-page__arrow"></div>
        </a>
    </section>

    <section class="landing-page__program" id="program">
        <div class="landing-page__program__wrapper">
            <div class="heading-wrapper">
                <div class="heading-wrapper__left"></div>
                <h3>Program</h3>
                <div class="heading-wrapper__right"></div>
            </div>

            <?php $args = ['post_type' => 'program', 'numberposts' => 5, 'order' => 'desc']; ?>
            <?php $events = get_posts($args); ?>

            <div class="landing-page__program__container">
                <?php foreach ($events as $post) : setup_postdata($post) ?>
                    <article class="landing-page__program__event">
                        <?php echo the_content(); ?>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="landing-page__button-wrapper">
                <a href="<?php echo get_bloginfo('url'); ?>/program" class="button">Se hela programmet</a>
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
                <a href="<?php echo get_bloginfo('url'); ?>/om-huset" class="button">Läs mer om huset</a>
            </div>
        </div>
    </section>

    <section class="landing-page__news">
        <!--using same styling as in news page-->
        <div class="news">
            <div class="heading-wrapper">
                <div class="heading-wrapper__left"></div>
                <h3>Aktuellt</h3>
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
                <a href="<?php echo get_bloginfo('url'); ?>/news" class="button">Läs fler nyheter</a>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>

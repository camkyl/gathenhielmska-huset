<?php get_header(); ?>

<section class="single-news">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
            <div class="single-news__title">
                <h3>Aktuellt</h3>
            </div>
            <!--the_content() is what's in template-parts/blocks/news/news.php-->
            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php endif; ?>

</section>

<?php get_footer(); ?>

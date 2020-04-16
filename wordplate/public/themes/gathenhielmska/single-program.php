<?php get_header(); ?>

<section class="single-program">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

            <a href="#" class="button">Boka biljetter</a>
        <?php endwhile; ?>

    <?php endif; ?>
    <a></a>
</section>

<?php get_footer(); ?>

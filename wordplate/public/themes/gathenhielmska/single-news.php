<?php
// This template is used when a visitor requests a single post from the news post type.
?>

<?php get_header(); ?>

<section>
    <p>single-news.php</p>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <p>Publicerad <?php the_date(); ?></p>

            <h2><?php the_title(); ?></h2>

            <!--the_content() is what's in template-parts/blocks/news/news.php-->
            <p><?php the_content(); ?></p>

        <?php endwhile; ?>

    <?php endif; ?>

</section>

<?php get_footer(); ?>

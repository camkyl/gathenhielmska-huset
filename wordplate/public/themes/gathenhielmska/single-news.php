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

            <p>-------------</p>
            <?php $content = get_the_content(); ?>
            <?php //var_dump($content);
            ?>

            <?php $parts = explode(',', get_the_content()); ?>
            <?php var_dump($parts); ?>
            <p>-------------</p>

            <p><?php the_content(); ?></p>

        <?php endwhile; ?>

    <?php endif; ?>

</section>

<?php get_footer(); ?>

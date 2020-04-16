<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<!--The content in the admin page-->
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>

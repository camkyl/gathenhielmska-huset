<?php /* Template Name: Businesses */ ?>

<?php get_header(); ?>

<section class="businesses">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <div class="heading-wrapper">
                <div class="heading-wrapper__left"></div>
                <h3><?php the_title(); ?></h3>
                <div class="heading-wrapper__right"></div>
            </div>

            <!--the_content() is what's in template-parts/blocks/businesses/businesses.php-->
            <div class="businesses__content-wrapper">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>
</section>

<?php get_footer(); ?>

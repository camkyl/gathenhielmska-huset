<?php get_header(); ?>

<!--In this file we style the page. Content is added in the sidebar in Program/students (we need to add ACF to plugins)-->

<section class="single-program">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <!--This will be the title of the student, in our case the program or a person working at gathenhielmska-->
            <?php the_content(); ?>

        <?php endwhile; ?>

    <?php endif; ?>
</section>


<?php get_footer(); ?>

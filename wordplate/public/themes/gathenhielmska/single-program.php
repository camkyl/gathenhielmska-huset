<?php get_header(); ?>

<!--In this file we style the page. Content is added in the sidebar in Program/students (we need to add ACF to plugins)-->

<section>
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <!--This will be the title of the student, in our case the program or a person working at gathenhielmska-->
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

            <div class="program-image">
                <?php if (get_field('image')) : ?>
                    <?php $image = get_field('image'); ?>
                    <img src="<?php echo $image['url']; ?>" alt="something">
                <?php else : ?>
                    <img src="" alt="placeholder">
                <?php endif; ?>
            </div>

            <p><?php the_content(); ?></p>

            <small><?php the_date(); ?></small>

        <?php endwhile; ?>

    <?php endif; ?>
</section>


<?php get_footer(); ?>

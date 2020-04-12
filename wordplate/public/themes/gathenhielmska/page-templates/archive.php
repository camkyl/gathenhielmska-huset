<?php /* Template Name: Archive */ ?>

<?php get_header(); ?>

<?php $imgArgs = ['post_type' => 'images', 'numberposts' => '-1']; ?>
<?php $images = get_posts($imgArgs); ?>

<?php $vidArgs = ['post_type' => 'videos']; ?>
<?php $videos = get_posts($vidArgs); ?>

<section class="archive">

    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3><?php the_title(); ?></h3>
        <div class="heading-wrapper__right"></div>
    </div>

    <div class="archive__alternatives">
        <div class="archive__alternatives-images">
            <a href="<?php echo the_permalink() . 'images.php'; ?>">Bilder</a>
        </div>
        <div class="archive__alternatives-videos">
            <a href="">Filmer</a>
        </div>
    </div>

    <?php //the_permalink();
    ?>

    <div class="archive__images">

        <?php foreach ($images as $post) :  setup_postdata($post) ?>
            <article class="archive__images--single-image">
                <!--the_content styrs av template-parts/blocks/archives/images.php-->
                <?php the_content(); ?>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php get_footer(); ?>

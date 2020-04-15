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
        <div class="archive__alternatives-images fetch-images">
            <a href="<?php echo the_permalink() . 'images'; ?>">Bilder</a>
        </div>
        <div class="archive__alternatives-videos fetch-videos">
            <a href="<?php echo the_permalink() . 'videos'; ?>">Filmer</a>
        </div>
    </div>

    <section class="archive__images"></section>
    <section class="archive__videos"></section>

</section>

<?php get_footer(); ?>

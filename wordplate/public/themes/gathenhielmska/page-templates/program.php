<?php /* Template Name: Program */ ?>

<?php get_header(); ?>

<?php $args = ["post_type" => "program"]; ?>

<?php $posts = get_posts($args); ?>

<div class="page-title program-title">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Program</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<section class="events">
    <?php foreach ($posts as $post) : setup_postdata($post) ?>
        <?php the_content(); ?>
    <?php endforeach; ?>
</section>
<?php get_footer(); ?>

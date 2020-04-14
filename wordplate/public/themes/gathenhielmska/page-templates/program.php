<?php /* Template Name: Program */ ?>


<?php get_header(); ?>


<?php $args = ["post_type" => "program"];

$posts = get_posts($args);
?>

<?php ?>

<div class="page-title">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Program</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<?php foreach ($posts as $post) : setup_postdata($post) ?>
    <section class="events">
        <?php the_content(); ?>
        <button>
            <a href="<?php the_permalink(); ?>">Läs mer</a>
        </button>
    </section>
<?php endforeach; ?>

<?php get_footer(); ?>

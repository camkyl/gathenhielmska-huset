<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<?php $args = ['post_type' => 'news']; ?>
<?php $news = get_posts($args); ?>

<section class="news">

    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3><?php the_title(); ?></h3>
        <div class="heading-wrapper__right"></div>
    </div>

    <!--utseendet i the_content styrs av template-parts/blocks/news/news.php-->
    <?php foreach ($news as $post) :  setup_postdata($post) ?>
        <article class="news__article">
            <?php the_content(); ?>
        </article>
    <?php endforeach; ?>
</section>

<?php get_footer(); ?>

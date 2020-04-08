<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<?php $args = ['post_type' => 'news']; ?>
<?php $news = get_posts($args); ?>

<section>
    <?php foreach ($news as $post) :  setup_postdata($post) ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <!--the_content styrs av template-parts/blocks/news/news.php-->
            <div><?php the_content(); ?></div>
        </article>
    <?php endforeach; ?>
</section>

<?php get_footer(); ?>

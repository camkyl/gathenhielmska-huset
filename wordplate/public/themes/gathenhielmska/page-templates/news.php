<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<?php $args = ['post_type' => 'news']; ?>
<?php $news = get_posts($args); ?>

<section>
    <?php foreach ($news as $post) :  setup_postdata($post) ?>
        <article>
            <!--the_content styrs av template-parts/blocks/news/news.php-->
            <a href="<?php the_permalink(); ?>">
                <div><?php the_content(); ?></div>
            </a>
        </article>
    <?php endforeach; ?>
</section>

<?php get_footer(); ?>

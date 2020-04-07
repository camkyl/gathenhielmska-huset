<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<section>

    <?php $args = ['post_type' => 'news']; ?>
    <?php $news = get_posts($args); ?>
    <?php // var_dump($news);
    ?>

    <article>
        <p>hallåååå WTF</p>
        <?php foreach ($news as $article) : ?>
            <?php // var_dump($article);
            ?>

            <h2><a href="<?php the_permalink($article); ?>"><?php echo $article->post_title; ?></a></h2>
            <p class="skit"><?php echo $article->post_content; ?></p>
        <?php endforeach;
        ?>
    </article>


    <?php
    /*
    var_dump($news);

    ["post_title"]=> string(7) "Nyhet 1"
    ["post_excerpt"]=> string(0) "
    ["post_status"]=> string(7) "publish"
    ["comment_status"]=> string(6) "closed"
    ["ping_status"]=> string(6) "closed"
    ["post_password"]=> string(0) ""
    ["post_name"]=> string(7) "nyhet-1"
    ["to_ping"]=> string(0) ""
    ["pinged"]=> string(0) ""
    ["post_modified"]=> string(19) "2020-04-03 20:28:42"
    ["post_modified_gmt"]=> string(19) "2020-04-03 20:28:42"
    ["post_content_filtered"]=> string(0) ""
    ["post_parent"]=> int(0)
    ["guid"]=> string(47) "http://localhost:8000/?post_type=news&p=38"
    ["menu_order"]=> int(0)
    ["post_type"]=> string(4) "news"
    ["post_mime_type"]=> string(0) ""
    ["comment_count"]=> string(1) "0"
    ["filter"]=> string(3) "raw"
    */

    ?>


</section>

<?php get_footer(); ?>

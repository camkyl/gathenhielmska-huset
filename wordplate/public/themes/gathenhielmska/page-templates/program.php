<?php /* Template Name: Program */ ?>


<?php get_header(); ?>

<?php $args = ["post_type" => "program"];

$posts = get_posts($args);
?>

<?php foreach ($posts as $post) : ?>

    <h2><?php echo $post->post_title; ?></h2>
    <p><?php echo $post->post_content; ?></p>


<?php endforeach; ?>

<?php get_footer(); ?>

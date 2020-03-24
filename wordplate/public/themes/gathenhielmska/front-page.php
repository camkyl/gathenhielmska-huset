<?php get_header();  ?>

<p>Detta är förstasidan</p>


<?php

$args = [
    'post_type' => 'program',
    "category" => "Teater"
];

$music = get_posts($args);

foreach ($music as $post) {
    echo $post->post_title;
    echo $post->post_content;
}

?>


<?php get_footer(); ?>

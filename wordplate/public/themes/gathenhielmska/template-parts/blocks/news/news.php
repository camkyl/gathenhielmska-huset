<?php

/**
 * News Block Template.
 *
 */

$image = get_field('image');
$news = get_field('article');
// Categories seems to have a bug somewhere, maybe has to do with the error messages in the dashboard
// $categories = get_field('category');

?>
<div class="news__article-img">
    <img src="<?php echo $image['url']; ?>" alt="test">
</div>
<div class="news__article-content">
    <p class="date"><?php the_date(); ?></p>
    <h4><?php the_title(); ?></h4>
    <p><?php echo $news; ?></p>
    <a href="<?php the_permalink(); ?>">Läs mer</a>
</div>

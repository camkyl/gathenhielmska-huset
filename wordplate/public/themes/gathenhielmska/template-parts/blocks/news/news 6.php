<?php

/**
 * News Block Template.
 *
 */

$image = get_field('image');
$news = get_field('article');
// Categories seems to have a bug somewhere, maybe has to do with the error messages in the dashboard
$categories = get_field('category');

?>

<article>
    <img src="<?php echo $image['url']; ?>" alt="test">
    <p><?php echo $news; ?></p>
    <p><?php //var_dump($categories);
        ?></p>
    <?php foreach ($categories as $category) : ?>
        <p><?php echo $category->name; ?></p>
    <?php endforeach; ?>
</article>

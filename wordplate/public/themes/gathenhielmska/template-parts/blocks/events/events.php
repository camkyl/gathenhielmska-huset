<?php

/**
 * Events Block Template.
 *
 */

$image = get_field('image');
$categories = get_field('category');
$date = get_field("date");
$description = get_field("description");
// Categories seems to have a bug somewhere, maybe has to do with the error messages in the dashboard


?>

    <img class="events__img" src="<?php echo $image['url']; ?>" alt="test">
    <div class="events__wrapper">
        <?php foreach ($categories as $category) : ?>
            <p><?php echo $category->name; ?></p>
        <?php endforeach; ?>
        <div class="events__wrapper__straight-line"></div>
        <h2><?php echo the_title(); ?></h2>
        <p><?php echo $date; ?></p>
        <p><?php echo $description; ?></p>
    </div>


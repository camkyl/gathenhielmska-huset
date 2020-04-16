<?php

/**
 * Events Block Template.
 *
 */

$image = get_field('image');
$categories = get_field('category');
$date = get_field("date");
$description = get_field("description");


?>

<div class="events__wrapper">
    <img class="events__wrapper__img" src="<?php echo $image['url']; ?>" alt="test">
    <?php foreach ($categories as $category) : ?>
        <p class="events__wrapper__category"><?php echo $category->name; ?></p>
    <?php endforeach; ?>
    <div class="events__wrapper__straight-line"></div>
    <h2 class="events__wrapper__title"><?php echo the_title(); ?></h2>
    <p class="events__wrapper__date"><?php echo $date; ?></p>
    <p class="events__wrapper__text"><?php echo $description; ?></p>
    <button class="program-btn">
        <a class="program-btn__a" href="<?php the_permalink(); ?>">Läs mer</a>
    </button>
</div>

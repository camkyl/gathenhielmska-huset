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
    <div class="events__wrapper__img">
        <img src="<?php echo $image['url']; ?>" alt="image of event">
    </div>
    <div class="events__wrapper__content">
        <?php foreach ($categories as $category) : ?>
            <p class="events__wrapper__category"><?php echo $category->name; ?></p>
        <?php endforeach; ?>
        <div class="events__wrapper__straight-line"></div>
        <h2 class="events__wrapper__title"><?php echo the_title(); ?></h2>
        <p class="events__wrapper__date"><?php echo $date; ?></p>
        <div class="single-event-line"></div>
        <p class="events__wrapper__text"><?php echo $description; ?></p>
    </div>
    <button class="program-btn">
        <a class="program-btn__a" href="<?php the_permalink(); ?>">Läs mer</a>
    </button>
</div>

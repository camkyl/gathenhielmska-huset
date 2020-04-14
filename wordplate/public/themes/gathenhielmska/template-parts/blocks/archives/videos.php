<?php

/**
 * Videos Archive Block Template.
 *
 */

$image = get_field('image');
$imageTitle = get_field('image_title');
$imageText = get_field('image_text');
$imageDate = get_field('date');
 
?>

<article class="archive__images-wrapper">
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $imageTitle; ?>">
</article>

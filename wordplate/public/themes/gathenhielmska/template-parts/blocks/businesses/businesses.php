<?php

/**
 * Businesses Block Template.
 *
 */

$name = get_field('name');
$role = get_field('role');
$website = get_field('website');

?>

<article class="businesses__article">
    <p class="--title"><?php echo $name; ?></p>
    <p class="--role"><?php echo $role; ?></p>
    <a class="--website"><?php echo $website; ?></a>
</article>

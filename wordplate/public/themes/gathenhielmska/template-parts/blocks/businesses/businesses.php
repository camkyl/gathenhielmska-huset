<?php

/**
 * Businesses Block Template.
 *
 */

$name = get_field('name');
$role = get_field('role');

?>

<article class="businesses__article">
    <p class="--title"><?php echo $name; ?></p>
    <p class="--role"><?php echo $role; ?></p>
</article>

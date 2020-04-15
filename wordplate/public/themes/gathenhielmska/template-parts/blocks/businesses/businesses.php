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
    <h4 class="--title"><a href="<?php echo $website; ?>" class="--website"><?php echo $name; ?></a></h4>
    <p class="--role"><?php echo $role; ?></p>
</article>

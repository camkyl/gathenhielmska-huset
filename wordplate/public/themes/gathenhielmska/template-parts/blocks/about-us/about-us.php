<?php

/**
 * About us Block Template.
 *
 */

$description = get_field("description");
$image = get_field("image");

?>

<div class="page-title">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Om huset</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<div class="about-us">

    <p class="about-us__para"><?php echo $description; ?></p>
    <img class="about-us__img" src="<?php echo $image["url"]; ?>" alt="Timeline of Gathenhielmska">

</div>

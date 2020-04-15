<?php

/**
 * Videos Archive Block Template.
 *
 */

$videoUrl = get_field('video_url');
$videoDescription = get_field('video_description');

?>

<div class="iframe-wrapper">
    <iframe src="<?php echo $videoUrl; ?>" loading="lazy"></iframe>
</div>

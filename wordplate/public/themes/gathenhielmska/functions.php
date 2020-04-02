<?php

declare(strict_types=1);

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

// Hide admin bar on the front end
add_filter('show_admin_bar', '__return_false');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . "/assets/styles/app.css");
    wp_enqueue_script("script", get_template_directory_uri() . "/assets/scripts/app.js");
});

require get_template_directory() . "/plate.php";
require get_template_directory() . "/post-types/event.php";
require get_template_directory() . "/taxonomies/program.php";
require get_template_directory() . "/fields/program.php";

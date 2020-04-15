<?php

declare(strict_types=1);

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

// Hide admin bar on the front end
add_filter('show_admin_bar', '__return_false');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . "/assets/styles/app.css");
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/scripts/app.js', [], false, true);
});

function post_remove()
{
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');


require get_template_directory() . "/plate.php";
require get_template_directory() . "/post-types/event.php";
require get_template_directory() . "/post-types/news.php";
require get_template_directory() . "/post-types/images.php";
require get_template_directory() . "/post-types/videos.php";
require get_template_directory() . "/taxonomies/program.php";
require get_template_directory() . "/taxonomies/news.php";
require get_template_directory() . "/fields/program.php";

// Gutenberg with ACF
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register news block.
        acf_register_block_type(array(
            'name'              => 'news', // the slug, what is used in code
            'title'             => __('News-template'), // human readable thing
            'description'       => __('Template used for news articles'),
            'render_template'   => 'template-parts/blocks/news/news.php', // important!
            'icon' => 'format-aside', // icon that appears in the editor
            'keywords' => ['news', 'article'] // to make it more searchable, max 3
        ));

        // Register businesses block.
        acf_register_block_type(array(
            'name'              => 'businesses', // the slug, what is used in code
            'title'             => __('Businesses-template'), // human readable thing
            'description'       => __('Template used to display businesses at Gathenhielmska'),
            'render_template'   => 'template-parts/blocks/businesses/businesses.php', // important!
            'icon' => 'welcome-write-blog', // icon that appears in the editor
            'keywords' => ['businesses', 'gathenhielmska', 'company'] // to make it more searchable, max 3
        ));

        // Register event block.
        acf_register_block_type(array(
            'name'              => 'events', // the slug, what is used in code
            'title'             => __('Event-template'), // human readable thing
            'description'       => __('Template used to display events at Gathenhielmska'),
            'render_template'   => 'template-parts/blocks/events/events.php', // important!
            'icon' => 'calendar-alt', // icon that appears in the editor
            'keywords' => ['events', 'gathenhielmska', 'company'] // to make it more searchable, max 3
        ));

        // Register archive (images) block.
        acf_register_block_type(array(
            'name'              => 'archive-images', // the slug, what is used in code
            'title'             => __('Template, Archive - images'), // human readable thing
            'description'       => __('Template used to display archive of images at Gathenhielmska'),
            'render_template'   => 'template-parts/blocks/archives/images.php', // important!
            'icon' => 'format-image', // icon that appears in the editor
            'keywords' => ['images', 'gathenhielmska', 'photography'] // to make it more searchable, max 3
        ));

        // Register archive (videos) block.
        acf_register_block_type(array(
            'name'              => 'archive-videos', // the slug, what is used in code
            'title'             => __('Template, Archive - videos'), // human readable thing
            'description'       => __('Template used to display archive of videos at Gathenhielmska'),
            'render_template'   => 'template-parts/blocks/archives/videos.php', // important!
            'icon' => 'video-alt2', // icon that appears in the editor
            'keywords' => ['videos', 'gathenhielmska'] // to make it more searchable, max 3
        ));

        // Register about us block.
        acf_register_block_type(array(
            'name'              => 'about-us', // the slug, what is used in code
            'title'             => __('Template, About us'), // human readable thing
            'description'       => __('Template used to display information about at Gathenhielmska'),
            'render_template'   => 'template-parts/blocks/about-us/about-us.php', // important!
            'icon' => 'info', // icon that appears in the editor
            'keywords' => ['about', 'gathenhielmska'] // to make it more searchable, max 3
        ));
    }
}

// Fetch
// function fetch_posts()
// {
//     $data = get_posts(['post_type' => 'videos']);
//     echo json_encode($data);
//     wp_die();
// };
// add_action('wp_ajax_nopriv_fetch_posts', 'fetch_posts');
// add_action('wp_ajax_fetch_posts', 'fetch_posts');

// function my_enqueue()
// {
//     wp_enqueue_script('ajax-script', get_template_directory_uri() . '/../../resources/scripts/app.js', array('jquery'));
//     wp_localize_script('ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
// }
// add_action('wp_enqueue_scripts', 'my_enqueue');

<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('news', [
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-welcome-write-blog', // change this!
        'labels' => [
            'add_new_item' => __('Add news article'),
            'edit_item' => __('Edit news article'),
            'name' => __('News'),
            'search_items' => __('Search news'),
            'singular_name' => __('News'),
        ],
        'supports' => [
            'title',
            'editor',
        ],
        'menu_position' => 10,
        'public' => true,
    ]);
});

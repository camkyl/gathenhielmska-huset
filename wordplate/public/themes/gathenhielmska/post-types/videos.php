<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('videos', [
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-video-alt2', // change this!
        'labels' => [
            'add_new_item' => __('Add videos'),
            'edit_item' => __('Edit videos'),
            'name' => __('Videos'),
            'search_items' => __('Search videos'),
            'singular_name' => __('Video'),
        ],
        'supports' => [
            'title',
            'editor',
        ],
        'menu_position' => 10,
        'public' => true,
    ]);
});

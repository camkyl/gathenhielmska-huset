<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('program', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add new course'),
            'edit_item' => __('Edit course'),
            'name' => __('Program'),
            'search_items' => __('Search courses'),
            'singular_name' => __('Course'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 20,
        'public' => true,
        'show_in_rest' => true,
    ]);
});

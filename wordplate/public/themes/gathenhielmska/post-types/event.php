<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('program', [
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-calendar-alt',
        'labels' => [
            'add_new_item' => __('Add new program'),
            'edit_item' => __('Edit program'),
            'name' => __('Program'),
            'search_items' => __('Search program'),
            'singular_name' => __('Program'),
        ],
        'supports' => [
            'title',
            'editor',
        ],
        'menu_position' => 0,
        'public' => true,
    ]);
});

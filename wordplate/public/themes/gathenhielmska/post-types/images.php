<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('images', [
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-image',
        'labels' => [
            'add_new_item' => __('Add images'),
            'edit_item' => __('Edit images'),
            'name' => __('Images'),
            'search_items' => __('Search images'),
            'singular_name' => __('Image'),
        ],
        'supports' => [
            'title',
            'editor',
        ],
        'menu_position' => 10,
        'public' => true,
    ]);
});

<?php

declare(strict_types=1);

add_action('init', function () {
    register_taxonomy('Category', ['program'], [
        'hierarchical' => true,
        'labels' => [
            'add_new_item' => __('Add new category'),
            'edit_item' => __('Edit category'),
            'name' => __('Categories'),
            'search_items' => __('Search categories'),
            'singular_name' => __('Category'),
        ],
        'show_admin_column' => true,
        'show_in_rest' => true,
    ]);
});

<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('news', [
        'show_in_rest' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups', // change this!
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
            'thumbnail',
        ],
        'menu_position' => 10,
        'public' => true,
        'template' => [
            ['core/image', [
                'attributes' => [
                    'selector' => 'left',
                ]
                //
            ]],
            ['core/paragraph', [
                'placeholder' => 'Add a your news article here',
            ]],
        ],
        'template_lock' => 'all', // read more about options here under "Lockings": https://developer.wordpress.org/block-editor/developers/block-api/block-templates/
    ]);
});

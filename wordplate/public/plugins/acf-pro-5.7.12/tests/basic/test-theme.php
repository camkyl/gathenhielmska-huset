<?php 

// Add post formats.
add_theme_support( 'post-formats', 
	array( 
		'aside', 
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) 
);
add_post_type_support( 'post', 'post-formats' );
add_post_type_support( 'page', 'post-formats' );

// Register post type.
add_action('init', function(){
	register_post_type( 'event', array(
      'public' => true,
      'label'  => 'Events',
      'supports' => array( 'title', 'editor', 'revisions' )
    ));
});

if( function_exists('register_field_group') ):

register_field_group(array(
	'key' => 'group_5ba9b9d19efed2',
	'title' => 'Options2',
	'fields' => array(
		array(
			'key' => 'field_5ba9b9d46c7902',
			'label' => 'Test',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'asdasdasd',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
<?php 

// Test adding options pages.
add_action('acf/init', function(){
	
	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'My Options Page',
		'redirect'		=> false,
	));
	
	// add sub page
	acf_add_options_sub_page(array(
		'title' 		=> 'Sub 1',
		'parent_slug' 	=> $parent['menu_slug'],
	));
	
	// add sub page
	acf_add_options_sub_page(array(
		'title' 		=> 'Post ID 100',
		'parent_slug' 	=> $parent['menu_slug'],
		'post_id'		=> 100
	));
});

// Test value functions.
/*
add_action('acf/init', function(){
	acf_log( get_field('user', 'options') );
});
*/
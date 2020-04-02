<?php 

// Add test.
acf_register_test( 'acf_test_field_groups', 'Test Field Groups' );

/**
 * acf_test_field_groups
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_field_groups() {
	
	test_acf_get_field_group();
	test_acf_get_raw_field_group();
	test_acf_get_field_group_post();
	test_acf_is_field_group_key();
	test_acf_validate_field_group();
	test_acf_get_raw_field_groups();
	test_acf_get_field_groups();
	test_acf_update_field_group();
	test_acf_trash_field_group();
	test_acf_is_field_group();
	test_acf_duplicate_field_group();
	test_acf_get_field_group_edit_link();
	test_acf_prepare_field_group_for_export();
	test_acf_import_field_group();
	
}


/**
 * test_acf_get_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_group() {
	
	$field_group = acf_get_field_group( 668 );
	acf_log_test( "acf_get_field_group(668)", (is_array($field_group) && isset($field_group['ID']) && $field_group['ID'] === 668) );
	
	$field_group = acf_get_field_group( 'group_5be37562bea47' );
	acf_log_test( "acf_get_field_group('group_5be37562bea47')", (is_array($field_group) && isset($field_group['key']) && $field_group['key'] === 'group_5be37562bea47') );
	
	$field_group = acf_get_field_group( 'dont_work' );
	acf_log_test( "acf_get_field_group('dont_work')", ($field_group === false) );
}

/**
 * test_acf_get_raw_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_raw_field_group() {
	
	$field_group = acf_get_raw_field_group( 668 );
	acf_log_test( "acf_get_raw_field_group(668)", (is_array($field_group) && isset($field_group['ID']) && $field_group['ID'] === 668) );
	
	$field_group = acf_get_raw_field_group( 'group_5be37562bea47' );
	acf_log_test( "acf_get_raw_field_group('group_5be37562bea47')", (is_array($field_group) && isset($field_group['key']) && $field_group['key'] === 'group_5be37562bea47') );
	
	$field_group = acf_get_raw_field_group( 'dont_work' );
	acf_log_test( "acf_get_raw_field_group('dont_work')", ($field_group === false) );
}

/**
 * test_acf_get_field_group_post
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_group_post() {
	
	$field_group = acf_get_field_group_post( 668 );
	acf_log_test( "acf_get_field_group_post(668)", ($field_group instanceof WP_Post) );
	
	$field_group = acf_get_field_group_post( 'group_5be37562bea47' );
	acf_log_test( "acf_get_field_group_post('group_5be37562bea47')", ($field_group instanceof WP_Post) );
	
	$field_group = acf_get_field_group_post( 'dont_work' );
	acf_log_test( "acf_get_field_group_post('dont_work')", ($field_group === false) );
}

/**
 * test_acf_is_field_group_key
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_field_group_key() {
	
	acf_log_test( "acf_is_field_group_key('group_123456')", acf_is_field_group_key('group_123456'), true );
	acf_log_test( "acf_is_field_group_key('dont_work')", acf_is_field_group_key('dont_work'), false );
	acf_log_test( "acf_is_field_group_key(8)", acf_is_field_group_key(8), false );
}

/**
 * test_acf_validate_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_validate_field_group() {
	
	$field_group = acf_validate_field_group();
	acf_log_test( "acf_validate_field_group()", (is_array($field_group) && isset($field_group['key'])) );
	
	$field_group = acf_validate_field_group(array( 'title' => 'test_name' ));
	acf_log_test( "acf_validate_field_group(array( 'title' => 'test_name' ))", (is_array($field_group) && isset($field_group['title']) && $field_group['title'] === 'test_name') );
}

/**
 * test_acf_get_raw_field_groups
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_raw_field_groups() {
	
	$field_groups = acf_get_raw_field_groups();
	acf_log_test( "acf_get_raw_field_groups()", !empty($field_groups) );
}

/**
 * test_acf_get_field_groups
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_groups() {
	
	$field_groups = acf_get_field_groups();
	acf_log_test( "test_acf_get_field_groups()", !empty($field_groups)  );
	
	$field_groups2 = acf_get_field_groups(array('post_type' => 'post'));
	acf_log_test( "test_acf_get_field_groups(array('post_type' => 'post'))", !empty($field_groups2) && count($field_groups2) < $field_groups );
}

/**
 * test_acf_update_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_update_field_group() {
	
	$field_group = array(
		'key'	=> 'group_123456',
		'label'	=> 'Test 1',
	);
	$field_group = wp_slash( $field_group );
	$field_group = acf_update_field_group( $field_group );
	acf_log_test( 'acf_update_field_group($field_group)', (is_array($field_group) && isset($field_group['ID'])) );
	
	// Delete
	$result = acf_delete_field_group( $field_group['ID'] );
	acf_log_test( 'acf_delete_field_group( $field_group[\'ID\'] )', $result );
}

/**
 * test_acf_trash_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_trash_field_group() {
	
	$field_group = acf_get_field_group( 668 );
	
	// Trash
	$result = acf_trash_field_group( $field_group['ID'] );
	$post = get_post( $field_group['ID'] );
	acf_log_test( 'acf_trash_field_group( $field_group[\'ID\'] )', ($result && $post->post_status === 'trash') );
	
	// Untrash
	$result = acf_untrash_field_group( $field_group['ID'] );
	$post = get_post( $field_group['ID'] );
	acf_log_test( 'acf_untrash_field_group( $field_group[\'ID\'] )', ($result && $post->post_status === 'publish') );
	
}

/**
 * test_acf_is_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_field_group() {
	
	// Get group field_group
	$parent = acf_get_field_group(668);
	if( !$parent ) {
		return acf_log_test( 'acf_get_field_group(668)... No group field_group found', false );
	}
	
	acf_log_test( 'acf_is_field_group($parent)', acf_is_field_group($parent), true );
	acf_log_test( 'acf_is_field_group(array())', acf_is_field_group(array()), false );
	acf_log_test( 'acf_is_field_group(false)', acf_is_field_group(false), false );
	acf_log_test( 'acf_is_field_group(true)', acf_is_field_group(true), false );
	acf_log_test( 'acf_is_field_group(\'test\')', acf_is_field_group('test'), false );
}

/**
 * test_acf_duplicate_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_duplicate_field_group() {
	
	$field_group = acf_get_field_group( 668 );
	$fields = acf_get_raw_fields( $field_group['ID'] );
	
	$duplicate = acf_duplicate_field_group( $field_group['ID'] );
	$duplicate_fields = acf_get_raw_fields( $duplicate['ID'] );
	
	acf_log_test( 'acf_duplicate_field_group( $field_group )', acf_is_field_group($duplicate) && $duplicate['key'] !== $field_group['key'] );
	acf_log_test( '- Comparing fields', count($fields), count($duplicate_fields) );

	acf_delete_field_group( $duplicate['ID'] );
}

/**
 * test_acf_get_field_group_edit_link
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_group_edit_link() {
	acf_log_test( 'acf_get_field_group_edit_link(668)', acf_get_field_group_edit_link(668), admin_url('post.php?post=668&action=edit') );
}

/**
 * test_acf_prepare_field_group_for_export
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_prepare_field_group_for_export() {
	$field_group = acf_get_field_group( 668 );
	$field_group = acf_prepare_field_group_for_export( $field_group );
	acf_log_test( 'acf_prepare_field_group_for_export( $field_group )', is_array($field_group) && empty($field_group['ID']) );
}

/**
 * test_acf_import_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_import_field_group() {
	
	$field_group = array(
		'key' => 'group_5be37562bea472',
		'title' => 'Attachment2',
		'fields' => array(
			array(
				'key' => 'field_5be3756541a1c2',
				'label' => 'Taxonomy2',
				'name' => 'taxonomy',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'taxonomy' => 'category',
				'field_type' => 'multi_select',
				'allow_null' => 0,
				'add_term' => 1,
				'save_terms' => 0,
				'load_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array(
				'key' => 'field_5c3ec0da7e8142',
				'label' => 'Color2',
				'name' => 'color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
			),
			array(
				'key' => 'field_5bf4efc39f95f2',
				'label' => 'Rep2',
				'name' => 'rep',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5bf4efc79f9602',
						'label' => 'Thing2',
						'name' => 'thing',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'attachment',
					'operator' => '==',
					'value' => 'image/jpeg',
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
	);
	
	$imported = acf_import_field_group( $field_group );
	acf_log_test( 'acf_import_field_group( $field_group )', acf_is_field_group($imported) );
	acf_log_test( '- Counting children', count(acf_get_fields($imported)), 3 );
	acf_delete_field_group( $imported['ID'] );
}






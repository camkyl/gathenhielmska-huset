<?php 

// Add test.
acf_register_test( 'acf_test_local_fields', 'Test Local Fields' );

/**
 * acf_test_local_fields
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_local_fields() {
	
	test_register_field_group();
	test_acf_add_local_field_group();
	test_acf_is_local_field_group();
	test_acf_get_local_field_group();
	test_acf_get_local_fields();
	test_acf_have_local_fields();
	test_acf_count_local_fields();
	test_acf_add_local_field();
	test_acf_is_local_field();
	test_acf_get_local_field();
	test__acf_apply_get_local_field_groups();
	test__acf_apply_is_local_field_key();
	
	test_acf_is_local_enabled();
	test_acf_remove_local_field();
	test_acf_remove_local_field_group();
}


/**
 * test_acf_is_local_enabled
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_local_enabled() {
	
	// Default.
	acf_log_test( "acf_is_local_enabled()", acf_is_local_enabled(), true );
	acf_log_test( "- Count field groups", acf_count_local_field_groups(), 1 );
	
	// Disable.
	acf_disable_local();
	acf_log_test( "acf_disable_local()", acf_is_local_enabled(), false );
	acf_log_test( "- Count field groups", acf_count_local_field_groups(), 0 );
	
	// Enable.
	acf_enable_local();
	acf_log_test( "acf_enable_local()", acf_is_local_enabled(), true );
	acf_log_test( "- Count field groups", acf_count_local_field_groups(), 1 );
	
	// Setting.
	acf_update_setting('local', false);
	acf_log_test( "acf_update_setting('local', false)", acf_is_local_enabled(), false );
	acf_log_test( "- Count fields", acf_count_local_fields('group_5be37562bea47'), 0 );
	
	acf_update_setting('local', true);
	acf_log_test( "acf_update_setting('local', true)", acf_is_local_enabled(), true );
	acf_log_test( "- Count fields", acf_count_local_fields('group_5be37562bea47'),4 );
}

/**
 * test_acf_add_local_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_add_local_field_group() {
	
	// Reset for tests.
	acf_reset_local();
	
	// Test before.
	acf_log('Testing acf_add_local_field_group()');
	acf_log_test( "acf_get_local_field_groups()", acf_get_local_field_groups() === array() );
	acf_log_test( "acf_have_local_field_groups()", acf_have_local_field_groups(), false );
	acf_log_test( "acf_count_local_field_groups()", acf_count_local_field_groups(), 0 );
	
	// Add local field group.
	acf_add_local_field_group(array(
		'key' => 'group_5be37562bea47',
		'title' => 'Attachment',
		'fields' => array(
			array(
				'key' => 'field_5be3756541a1c',
				'label' => 'Taxonomy',
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
				'key' => 'field_5c3ec0da7e814',
				'label' => 'Color',
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
				'key' => 'field_5bf4efc39f95f',
				'label' => 'Rep',
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
						'key' => 'field_5bf4efc79f960',
						'label' => 'Thing',
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
		'active' => 1,
		'description' => '',
	));
	
	// Test After.
	$groups = acf_get_local_field_groups();
	acf_log_test( "acf_get_local_field_groups()", !empty($groups) );
	acf_log_test( "acf_have_local_field_groups()", acf_have_local_field_groups(), true );
	acf_log_test( "acf_count_local_field_groups()", acf_count_local_field_groups(), 1 );
}

/**
 * test_register_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_register_field_group() {
	
	// Reset for tests.
	acf_reset_local();
	
	// Test before.
	acf_log('Testing register_field_group()');
	acf_log_test( "acf_get_local_field_groups()", acf_get_local_field_groups() === array() );
	acf_log_test( "acf_have_local_field_groups()", acf_have_local_field_groups(), false );
	acf_log_test( "acf_count_local_field_groups()", acf_count_local_field_groups(), 0 );
	
	// Add local field group.
	register_field_group(array(
		'key' => 'group_5be37562bea47',
		'title' => 'Attachment',
		'fields' => array(),
		'location' => array(),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
	
	// Test After.
	$groups = acf_get_local_field_groups();
	acf_log_test( "acf_get_local_field_groups()", !empty($groups) );
	acf_log_test( "acf_have_local_field_groups()", acf_have_local_field_groups(), true );
	acf_log_test( "acf_count_local_field_groups()", acf_count_local_field_groups(), 1 );
}

/**
 * test_acf_is_local_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_local_field_group() {
	acf_log_test( "acf_is_local_field_group('group_5be37562bea47')", acf_is_local_field_group('group_5be37562bea47'), true );
	acf_log_test( "acf_is_local_field_group('no_group')", acf_is_local_field_group('no_group'), false );
}

/**
 * test_acf_get_local_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_local_field_group() {
	$group = acf_get_local_field_group('group_5be37562bea47');
	acf_log_test( "acf_get_local_field_group('group_5be37562bea47')", is_array($group) && isset($group['key']) && $group['key'] === 'group_5be37562bea47' );
	acf_log_test( "acf_get_local_field_group('no_group')", acf_get_local_field_group('no_group'), null );
}

/**
 * test_acf_remove_local_field_group
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_remove_local_field_group() {
	acf_remove_local_field_group('group_5be37562bea47');
	acf_log_test( "acf_remove_local_field_group('group_5be37562bea47')", acf_is_local_field_group('group_5be37562bea47'), false );
}

/**
 * test_acf_get_local_fields
 *
 * description
 *
 * @date	23/1/19
 * @since	5.7.10
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function test_acf_get_local_fields() {
	$fields = acf_get_local_fields('group_5be37562bea47');
	acf_log_test( "acf_get_local_fields('group_5be37562bea47')", count($fields) === 3 );
	
	$fields = acf_get_local_fields('field_5bf4efc39f95f');
	acf_log_test( "acf_get_local_fields('field_5bf4efc39f95f')", count($fields) === 1 );
	
	$fields = acf_get_local_fields('no_group');
	acf_log_test( "acf_get_local_fields('no_group')", empty($fields) );
}

/**
 * test_acf_have_local_fields
 *
 * description
 *
 * @date	23/1/19
 * @since	5.7.10
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function test_acf_have_local_fields() {
	acf_log_test( "acf_have_local_fields('group_5be37562bea47')", acf_have_local_fields('group_5be37562bea47'), true );
	acf_log_test( "acf_have_local_fields('field_5bf4efc39f95f')", acf_have_local_fields('field_5bf4efc39f95f'), true );
	acf_log_test( "acf_have_local_fields('no_group')", acf_have_local_fields('no_group'), false );
}

/**
 * test_acf_count_local_fields
 *
 * description
 *
 * @date	23/1/19
 * @since	5.7.10
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function test_acf_count_local_fields() {
	acf_log_test( "acf_count_local_fields('group_5be37562bea47')", acf_count_local_fields('group_5be37562bea47'), 3 );
	acf_log_test( "acf_count_local_fields('field_5bf4efc39f95f')", acf_count_local_fields('field_5bf4efc39f95f'), 1 );
	acf_log_test( "acf_count_local_fields('no_group')", acf_count_local_fields('no_group'), 0 );
}

/**
 * test_acf_add_local_field
 *
 * description
 *
 * @date	23/1/19
 * @since	5.7.10
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function test_acf_add_local_field() {
	
	// Add local field.
	acf_add_local_field(array(
		'key' => 'field_5bf4efc39f95f2',
		'label' => 'Rep2',
		'name' => 'rep2',
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
				'name' => 'thing2',
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
		'parent' => 'group_5be37562bea47'
	));
	
	acf_log_test( "acf_add_local_field()", acf_count_local_fields('group_5be37562bea47'), 4 );
	acf_log_test( "acf_add_local_field()", acf_count_local_fields('field_5bf4efc39f95f'), 1 );
	acf_log_test( "acf_add_local_field()", acf_count_local_fields('field_5bf4efc39f95f2'), 1 );
}

/**
 * test_acf_is_local_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_local_field() {
	acf_log_test( "acf_is_local_field('field_5bf4efc39f95f2')", acf_is_local_field('field_5bf4efc39f95f2'), true );
	acf_log_test( "acf_is_local_field('rep2')", acf_is_local_field('rep2'), true );
	acf_log_test( "acf_is_local_field('no_field')", acf_is_local_field('no_field'), false );
}

/**
 * test_acf_get_local_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_local_field() {
	
	$field = acf_get_local_field('field_5bf4efc39f95f2');
	acf_log_test( "acf_get_local_field('field_5bf4efc39f95f2')", is_array($field) && isset($field['key']) && $field['key'] === 'field_5bf4efc39f95f2' );
	
	$field = acf_get_local_field('rep2');
	acf_log_test( "acf_get_local_field('rep2')", is_array($field) && isset($field['key']) && $field['key'] === 'field_5bf4efc39f95f2' );
	
	acf_log_test( "acf_get_local_field('no_field')", acf_get_local_field('no_field'), null );
	
}

/**
 * test_acf_remove_local_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_remove_local_field() {
	acf_remove_local_field('field_5bf4efc39f95f2');
	acf_log_test( "acf_remove_local_field('field_5bf4efc39f95f2')", acf_is_local_field('field_5bf4efc39f95f2'), false );
}

/**
 * test__acf_apply_get_local_field_groups
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test__acf_apply_get_local_field_groups() {
	
	$groups = array(
		array(
			'key' => 'group_5be37562bea473',
			'title' => 'Attachment2',
			'fields' => array(),
			'location' => array(),
			'menu_order' => -1,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		)
	);
	
	$all_groups = _acf_apply_get_local_field_groups($groups);
	
	acf_log_test( "acf_append_local_field_groups()", !empty($all_groups) );
	acf_log_test( "acf_append_local_field_groups(): Count", count($all_groups) > count($groups) );
	acf_log_test( "acf_append_local_field_groups(): Order", $all_groups[0]['title'] === 'Attachment2' && $all_groups[1]['title'] = 'Attachment1' );
}

/**
 * test__acf_apply_is_local_field_key
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test__acf_apply_is_local_field_key() {
	acf_log_test( "_acf_apply_is_local_field_key(false, 'field_5bf4efc39f95f2')", _acf_apply_is_local_field_key(false, 'field_5bf4efc39f95f2') );
	acf_log_test( "_acf_apply_is_local_field_key(false, 'field_5bf4efc39f95f3')", _acf_apply_is_local_field_key(false, 'field_5bf4efc39f95f3'), false );
	
	// Temporarily commented out until a core solution is found.
	//acf_log_test( "_acf_apply_is_local_field_key(false, 'rep2')", _acf_apply_is_local_field_key(false, 'rep2'), false );
}




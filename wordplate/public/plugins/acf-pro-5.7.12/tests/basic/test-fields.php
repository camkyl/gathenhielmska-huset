<?php 

// Add test.
acf_register_test( 'acf_test_fields', 'Test fields' );

/**
 * acf_test_fields
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_fields() {
	
	test_acf_get_field();
	test_acf_get_raw_field();
	test_acf_get_field_post();
	test_acf_is_field_key();
	test_acf_validate_field();
	test_acf_get_raw_fields();
	test_acf_get_fields();
	test_acf_prepare_field();
	test_acf_update_field();
	test_acf_trash_field();
	test_acf_prefix_fields();
	test_acf_is_field();
	test_acf_get_sub_field();
	test_acf_get_field_ancestors();
	test_acf_duplicate_field();
	test_acf_duplicate_fields();
	test_acf_prepare_fields_for_export();
	test_acf_prepare_fields_for_import();
	
}

/**
 * test_acf_get_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field() {
	
	$field = acf_get_field( 8 );
	acf_log_test( "acf_get_field(8)", (is_array($field) && isset($field['ID']) && $field['ID'] === 8) );
	
	$field = acf_get_field( 'field_5ae69b1527aa7' );
	acf_log_test( "acf_get_field('field_5ae69b1527aa7')", (is_array($field) && isset($field['key']) && $field['key'] === 'field_5ae69b1527aa7') );
	
	$field = acf_get_field( 'condition_trigger' );
	acf_log_test( "acf_get_field('condition_trigger')", (is_array($field) && isset($field['key']) && $field['name'] === 'condition_trigger') );
	
	$field = acf_get_field( 'dont_work' );
	acf_log_test( "acf_get_field('dont_work')", ($field === false) );
}

/**
 * test_acf_get_raw_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_raw_field() {
	
	$field = acf_get_raw_field( 8 );
	acf_log_test( "acf_get_raw_field(8)", (is_array($field) && isset($field['ID']) && $field['ID'] === 8) );
	
	$field = acf_get_raw_field( 'field_5ae69b1527aa7' );
	acf_log_test( "acf_get_raw_field('field_5ae69b1527aa7')", (is_array($field) && isset($field['key']) && $field['key'] === 'field_5ae69b1527aa7') );
	
	$field = acf_get_raw_field( 'condition_trigger' );
	acf_log_test( "acf_get_raw_field('condition_trigger')", (is_array($field) && isset($field['key']) && $field['name'] === 'condition_trigger') );
	
	$field = acf_get_raw_field( 'dont_work' );
	acf_log_test( "acf_get_raw_field('dont_work')", ($field === false) );
}

/**
 * test_acf_get_field_post
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_post() {
	
	$field = acf_get_field_post( 8 );
	acf_log_test( "acf_get_field_post(8)", ($field instanceof WP_Post) );
	
	$field = acf_get_field_post( 'field_5ae69b1527aa7' );
	acf_log_test( "acf_get_field_post('field_5ae69b1527aa7')", ($field instanceof WP_Post) );
	
	$field = acf_get_field_post( 'condition_trigger' );
	acf_log_test( "acf_get_field_post('condition_trigger')", ($field instanceof WP_Post) );
	
	$field = acf_get_field_post( 'dont_work' );
	acf_log_test( "acf_get_field_post('dont_work')", ($field === false) );
}

/**
 * test_acf_is_field_key
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_field_key() {
	
	acf_log_test( "acf_is_field_key('field_123456')", acf_is_field_key('field_123456'), true );
	acf_log_test( "acf_is_field_key('dont_work')", acf_is_field_key('dont_work'), false );
	acf_log_test( "acf_is_field_key(8)", acf_is_field_key(8), false );
}

/**
 * test_acf_validate_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_validate_field() {
	
	$field = acf_validate_field();
	acf_log_test( "acf_validate_field()", (is_array($field) && isset($field['key'])) );
	
	$field = acf_validate_field(array( 'name' => 'test_name' ));
	acf_log_test( "acf_validate_field(array( 'name' => 'test_name' ))", (is_array($field) && isset($field['name']) && $field['name'] === 'test_name') );
}

/**
 * test_acf_get_raw_fields
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_raw_fields() {
	
	$fields = acf_get_raw_fields( 61 );
	acf_log_test( "acf_get_raw_fields( 61 )", !empty($fields) );
	
	$fields = acf_get_raw_fields( 1 );
	acf_log_test( "acf_get_raw_fields( 1 )", empty($fields) );
}

/**
 * test_acf_get_raw_fields
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_fields() {
	
	$fields = acf_get_fields('test');
	acf_log_test( "test_acf_get_fields('test')", empty($fields)  );
	
	$fields = acf_get_fields(668);
	acf_log_test( "test_acf_get_fields(668)", !empty($fields)  );
	
	$fields = acf_get_fields('group_5be37562bea47');
	acf_log_test( "test_acf_get_fields('group_5be37562bea47')", !empty($fields)  );
	
	$fields = acf_get_fields(array('key' => 'group_123', 'ID' => 61));
	acf_log_test( "test_acf_get_fields(array('key' => 'group_123', 'ID' => 61))", !empty($fields) );
}

/**
 * test_acf_prepare_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_prepare_field() {
	
	$field = acf_get_field( 8 );
	$prepared = acf_prepare_field( $field );
	acf_log_test( 'acf_prepare_field($field)', ($field['name'] === 'condition_trigger' && $prepared['name'] === 'acf[field_5ae69b1527aa7]')  );
	
}

/**
 * test_acf_update_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_update_field() {
	
	$field = array(
		'key'	=> 'field_123456',
		'name'	=> 'test1',
		'label'	=> 'Test 1',
	);
	$field = wp_slash( $field );
	$field = acf_update_field( $field );
	acf_log_test( 'acf_update_field($field)', (is_array($field) && isset($field['ID'])) );
	
	// Delete
	$result = acf_delete_field( $field['ID'] );
	acf_log_test( 'acf_delete_field( $field[\'ID\'] )', $result );
}

/**
 * test_acf_trash_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_trash_field() {
	
	$field = array(
		'key'	=> 'field_1234567',
		'name'	=> 'test2',
		'label'	=> 'Test 2',
	);
	$field = wp_slash( $field );
	$field = acf_update_field( $field );
	acf_log_test( 'acf_update_field($field)', (is_array($field) && isset($field['ID'])) );
	
	// Trash
	$result = acf_trash_field( $field['ID'] );
	$post = get_post( $field['ID'] );
	acf_log_test( 'acf_trash_field( $field[\'ID\'] )', ($result && $post->post_status === 'trash') );
	
	// Untrash
	$result = acf_untrash_field( $field['ID'] );
	$post = get_post( $field['ID'] );
	acf_log_test( 'acf_untrash_field( $field[\'ID\'] )', ($result && $post->post_status === 'publish') );
	
	$result = acf_delete_field( $field['ID'] );
	acf_log_test( 'acf_delete_field( $field[\'ID\'] )', $result );
}

/**
 * test_acf_prefix_fields
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_prefix_fields() {
	
	$fields = acf_get_fields(array('key' => 'group_123', 'ID' => 61));
	$check1 = true;
	foreach( $fields as $field ) {
		$field = acf_prepare_field( $field );
		if( $field['name'] !== "acf[{$field['key']}]" ) {
			$check1 = false;
		}
	}
	
	acf_prefix_fields( $fields, 'test' );
	
	$check2 = true;
	foreach( $fields as $field ) {
		$field = acf_prepare_field( $field );
		if( $field['name'] !== "test[{$field['key']}]" ) {
			$check2 = false;
		}
	}
	
	acf_log_test( 'acf_prefix_fields()', ($check1 && $check2) );
}

/**
 * test_acf_is_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_is_field() {
	
	// Get group field
	$parent = acf_get_field('group');
	if( !$parent ) {
		return acf_log_test( 'test_acf_is_field()... No group field found', false );
	}
	
	acf_log_test( 'acf_is_field($parent)', acf_is_field($parent), true );
	acf_log_test( 'acf_is_field(array())', acf_is_field(array()), false );
	acf_log_test( 'acf_is_field(false)', acf_is_field(false), false );
	acf_log_test( 'acf_is_field(true)', acf_is_field(true), false );
	acf_log_test( 'acf_is_field(\'test\')', acf_is_field('test'), false );
}

/**
 * test_acf_get_sub_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_sub_field() {
	
	// Get group field
	$parent = acf_get_field('field_5c369798e35b0');
	if( !$parent ) {
		return acf_log_test( 'test_acf_get_sub_field()... No group field found', false );
	}
	
	$child = acf_get_sub_field('sub_1', $parent);
	acf_log_test( 'acf_get_sub_field(\'sub_1\', $parent)', acf_is_field($child) );
	
	$child = acf_get_sub_field('field_5c369798ef228', $parent);
	acf_log_test( 'acf_get_sub_field(\'field_5c369798ef228\', $parent)', acf_is_field($child) );
	
	$child = acf_get_sub_field('no_field', $parent);
	acf_log_test( 'acf_get_sub_field(\'no_field\', $parent)', !acf_is_field($child) );
}

/**
 * test_acf_get_field_ancestors
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_field_ancestors() {
	
	$child = acf_get_field('sub_1');
	$ancestors = acf_get_field_ancestors( $child );
	acf_log_test( 'acf_get_field_ancestors( $child )', !empty($ancestors) );
	
	$parent = acf_get_field( $ancestors[0] );
	$ancestors2 = acf_get_field_ancestors( $parent );
	acf_log_test( 'acf_get_field_ancestors( $parent )', $ancestors2, array() );
	
}

/**
 * test_acf_duplicate_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_duplicate_field() {
	
	$field = acf_get_field('sub_1');
	$duplicate = acf_duplicate_field( $field['ID'] );
	acf_log_test( 'acf_duplicate_field( $field )', acf_is_field($duplicate) && $duplicate['key'] !== $field['key'] && $duplicate['parent'] === $field['parent'] );
	acf_delete_field( $duplicate['ID'] );
	
	$duplicate = acf_duplicate_field( $field['ID'], 123 );
	acf_log_test( 'acf_duplicate_field( $field, 123 )', acf_is_field($duplicate) && $duplicate['key'] !== $field['key'] && $duplicate['parent'] === 123 );
	acf_delete_field( $duplicate['ID'] );
}

/**
 * test_acf_duplicate_fields
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_duplicate_fields() {
	
	$fields = acf_get_fields(array('key' => 'group_123', 'ID' => 61));
	$duplicates = acf_duplicate_fields( $fields );
	acf_log_test( 'acf_duplicate_fields( $fields )', !empty($duplicates) );
	
	// Check
	$check1 = true;
	foreach( $duplicates as $i => $duplicate ) {
		$field = $fields[ $i ];
		if( acf_is_field($duplicate) && $duplicate['key'] !== $field['key'] && $duplicate['parent'] === $field['parent'] ) {
			// success
		} else {
			$check1 = false;
		}
	}
	acf_log_test( '- Same parent', $check1 );
	
	foreach( $duplicates as $duplicate ) {
		acf_delete_field( $duplicate['ID'] );
	}
	
	
	// Check2
	$duplicates = acf_duplicate_fields( $fields, 123 );
	$check2 = true;
	foreach( $duplicates as $i => $duplicate ) {
		$field = $fields[ $i ];
		if( acf_is_field($duplicate) && $duplicate['key'] !== $field['key'] && $duplicate['parent'] === 123 ) {
			// success
		} else {
			$check2 = false;
		}
	}
	acf_log_test( '- New parent', $check2 );
	
	foreach( $duplicates as $duplicate ) {
		acf_delete_field( $duplicate['ID'] );
	}
}

/**
 * test_acf_prepare_fields_for_export
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_prepare_fields_for_export() {
	
	$fields = acf_get_fields(array('key' => 'group_123', 'ID' => 61));
	$field2 = acf_prepare_fields_for_export( $fields );
	$check = !empty( $field2 );
	foreach( $field2 as $field ) {
		if( acf_is_field($field) && !isset($field['ID']) ) {
			// success
		} else {
			$check = false;
		}
	}
	
	acf_log_test( 'acf_duplicate_fields( $fields )', $check );
}

/**
 * test_acf_prepare_fields_for_import
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_prepare_fields_for_import() {
	
	// Get group field
	$parent = acf_get_field('group');
	if( !$parent ) {
		return acf_log_test( 'test_acf_get_sub_field()... No group field found', false );
	}
	
	$fields = acf_prepare_fields_for_import( array($parent) );
	$check = is_array( $fields ) && count($fields) > 1;
	acf_log_test( 'acf_prepare_fields_for_import( array($parent) )', $check );
	
}






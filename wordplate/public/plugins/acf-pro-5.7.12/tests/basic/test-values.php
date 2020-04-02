<?php 

// Add test.
acf_register_test( 'acf_test_values', 'Test Values' );

/**
 * acf_test_values
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_values() {
	
	test_acf_get_reference();
	test_acf_get_value();
	test_acf_format_value();
	test_acf_update_value();
	test_acf_delete_value();
	test_acf_preview_value();
	
}


/**
 * test_acf_get_reference
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_reference() {
	
	acf_log_test( "acf_get_reference( 'text', 188 )", acf_get_reference( 'text', 188 ), 'field_596c341650622' );
	acf_log_test( "acf_get_reference( 'no_field', 188 )", acf_get_reference( 'no_field', 188 ), null );
	
	acf_log_test( "acf_get_reference( 'text', 'options' )", acf_get_reference( 'text', 'options' ), 'field_596c341650622' );
	acf_log_test( "acf_get_reference( 'color', 'widget_recent-posts-2' )", acf_get_reference( 'color', 'widget_recent-posts-2' ), 'field_5bab115a568df' );
}

/**
 * test_acf_get_value
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_value() {
	
	$field_key = acf_get_reference( 'number', 188 );
	$field = acf_get_field( $field_key );
	acf_log_test( 'acf_get_value( 188, $field )', acf_get_value( 188, $field ), '3' );
	
	$field2 = acf_get_valid_field(array(
		'key'	=> 'field_123',
		'name'	=> 'my_field2',
		'type'	=> ''
	));
	acf_log_test( 'acf_get_value( 188, $field2 )', acf_get_value( 188, $field2 ), null );
	
	$field3 = acf_get_valid_field(array(
		'key'	=> 'field_123',
		'name'	=> 'my_field3',
		'type'	=> 'text',
		'default_value'	=> 'Default'
	));
	acf_log_test( 'acf_get_value( 188, $field3 )', acf_get_value( 188, $field3 ), 'Default' );
}

/**
 * test_acf_format_value
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_format_value() {
	
	$post_id = 188;
	$field = acf_get_valid_field(array(
		'key'	=> 'field_123',
		'name'	=> 'my_field',
		'type'	=> 'true_false'
	));
	acf_log_test( 'acf_format_value( $value, $post_id, $field )', acf_format_value( '1', $post_id, $field ), true );
	
	$field['name'] = 'my_field2';
	acf_log_test( 'acf_format_value( $value, $post_id, $field )', acf_format_value( '0', $post_id, $field ), false );
}

/**
 * test_acf_update_value
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_update_value() {
	
	$field_key = acf_get_reference( 'text', 188 );
	$field = acf_get_field( $field_key );
	$before = acf_get_value( 188, $field );
	$result = acf_update_value( uniqid(), 188, $field );
	$after = acf_get_value( 188, $field );
	acf_log_test( 'acf_update_field( uniqid(), 188, $field )', $result );
	acf_log( "- $before > $after" );
	
}

/**
 * test_acf_delete_value
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_delete_value() {
	
	$post_id = 188;
	$field = acf_get_valid_field(array(
		'key'	=> 'field_123',
		'name'	=> 'my_field',
		'type'	=> ''
	));
	acf_update_value( uniqid(), $post_id, $field );
	$before = acf_get_value( $post_id, $field );
	$result = acf_delete_value( 188, $field );
	$after = acf_get_value( $post_id, $field );
	acf_log_test( 'acf_delete_value( 188, $field )', $result && $after === null );
	
}

/**
 * test_acf_preview_value
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_preview_value() {
	
	$post_id = 188;
	$field = acf_get_valid_field(array(
		'key'	=> 'field_123',
		'name'	=> 'my_field',
		'type'	=> ''
	));
	$value = 'Test';
	$value = acf_preview_value( $value, $post_id, $field );
	acf_log_test( 'acf_preview_value( value, $post_id, $field )', $value === 'Test' );
	
}



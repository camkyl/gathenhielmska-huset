<?php 

// Add test.
acf_register_test( 'acf_test_meta', 'Test Meta' );

/**
 * acf_test_meta
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_meta() {
	
	test_acf_decode_post_id();
	test_acf_get_meta();
	test_acf_get_meta_field();
	test_acf_get_option_meta();
	test_acf_get_metadata();
	test_acf_update_metadata();
	test_acf_delete_metadata();
	test_acf_copy_metadata();
	
}

/**
 * test_acf_decode_post_id
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_decode_post_id() {
	
	acf_log_test( "acf_decode_post_id(123)", acf_decode_post_id(123), array( 'type' => 'post', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('post_123')", acf_decode_post_id('post_123'), array( 'type' => 'post', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('user_123')", acf_decode_post_id('user_123'), array( 'type' => 'user', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('term_123')", acf_decode_post_id('term_123'), array( 'type' => 'term', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('category_123')", acf_decode_post_id('term_123'), array( 'type' => 'term', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('comment_123')", acf_decode_post_id('comment_123'), array( 'type' => 'comment', 'id' => 123 ) );
	acf_log_test( "acf_decode_post_id('widget_123')", acf_decode_post_id('widget_123'), array( 'type' => 'option', 'id' => 'widget_123' ) );
	acf_log_test( "acf_decode_post_id('option')", acf_decode_post_id('option'), array( 'type' => 'option', 'id' => 'option' ) );
	acf_log_test( "acf_decode_post_id('thing')", acf_decode_post_id('thing'), array( 'type' => 'option', 'id' => 'thing' ) );
}

/**
 * test_acf_get_meta
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_meta() {
	
	$meta = acf_get_meta( 1205 );
	acf_log_test( "test_acf_get_meta(1205)", !empty($meta) && isset($meta['color'], $meta['_color']) );
	
	$meta = acf_get_meta( 9999999 );
	acf_log_test( "test_acf_get_meta(9999999)", empty($meta) );
	
	$meta = acf_get_meta( 'user_1' );
	acf_log_test( "test_acf_get_meta('user_1')", !empty($meta) );
	
	$meta = acf_get_meta( 'options' );
	acf_log_test( "test_acf_get_meta('options')", !empty($meta) );
}

/**
 * test_acf_get_option_meta
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_option_meta() {
	
	$meta = acf_get_option_meta( 'options' );
	acf_log_test( "acf_get_option_meta( 'options' )", !empty($meta) );
	
	$meta = acf_get_option_meta( 'widget_search-2' );
	acf_log_test( "acf_get_option_meta( 'widget_search-2' )", !empty($meta) );
}

/**
 * test_acf_get_metadata
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_metadata() {
	
	acf_log_test( "acf_get_metadata( 1205, 'color' )", acf_get_metadata( 1205, 'color' ), '#3058d1' );
	acf_log_test( "acf_get_metadata( 1205, 'color', true )", acf_get_metadata( 1205, 'color', true ), 'field_5c3ec326cac04' );
	acf_log_test( "acf_get_metadata( 1205, '_color' )", acf_get_metadata( 1205, '_color' ), 'field_5c3ec326cac04' );
	
	acf_log_test( "acf_get_metadata( 'options', 'text' )", acf_get_metadata( 'options', 'text' ), 'show' );
	acf_log_test( "acf_get_metadata( 'options', 'text', true )", acf_get_metadata( 'options', 'text', true ), 'field_596c341650622' );
	
	acf_log_test( "acf_get_metadata( 'widget_recent-posts-2', 'color' )", acf_get_metadata( 'widget_recent-posts-2', 'color' ), '#46e253' );
	
}

/**
 * test_acf_copy_metadata
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_copy_metadata() {
	
	$meta = acf_get_meta( 1205 );
	$post_id = wp_insert_post(array(
		'post_title'	=> 'Test Post',
		'post_content'	=> 'Test Content',
	));
	
	acf_copy_metadata( 1205, $post_id );
	$meta2 = acf_get_meta( $post_id );
	acf_log_test( "acf_copy_metadata( 1205, $post_id )", $meta, $meta2 );
	
	wp_delete_post( $post_id, true );
}

/**
 * test_acf_get_meta_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_get_meta_field() {
	
	acf_log_test( "test_acf_get_meta_field( 'color', 1205 )", !empty(acf_get_meta_field( 'color', 1205 )) );
	acf_log_test( "test_acf_get_meta_field( 'color2', 1205 )", acf_get_meta_field( 'color2', 1205 ), false );
}

/**
 * test_acf_update_metadata
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_update_metadata() {
	
	$before = acf_get_metadata( 188, 'text' );
	$result = acf_update_metadata( 188, 'text', uniqid() );
	$after = acf_get_metadata( 188, 'text' );
	acf_log_test( "acf_update_metadata( 188, 'text', uniqid() )", $result );
	acf_log( "- $before > $after" );
	
	$before = acf_get_metadata( 188, 'text', true );
	$result = acf_update_metadata( 188, 'text', 'new_value', true );
	$after = acf_get_metadata( 188, 'text', true );
	acf_log_test( "acf_update_metadata( 188, 'text', 'new_value', true )", $result );
	acf_log( "- $before > $after" );
	$result = acf_update_metadata( 188, 'text', $before, true );
}

/**
 * test_acf_delete_metadata
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_delete_metadata() {
	
	acf_update_metadata( 188, 'temp_meta', uniqid() );
	$result = acf_delete_metadata( 188, 'temp_meta' );
	$after = acf_get_metadata( 188, 'temp_meta' );
	acf_log_test( "acf_delete_metadata( 188, 'temp_meta' )", $result && $after === null );
	
	$result = acf_delete_metadata( 188, 'temp_meta2' );
	acf_log_test( "acf_delete_metadata( 188, 'temp_meta2' )", !$result );
	
}




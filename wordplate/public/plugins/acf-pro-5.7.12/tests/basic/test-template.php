<?php 

// Add test.
acf_register_test( 'acf_test_templates', 'Test Templates' );

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
function acf_test_templates() {
	
	test_acf_get_valid_post_id();
	test_acf_maybe_get_field();
	test_acf_maybe_get_sub_field();
	
	test_get_field();
	test_get_field_object();
	test_get_fields();
	test_have_rows();
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
function test_acf_get_valid_post_id() {
	
	acf_log_test( "acf_get_valid_post_id( 188 )", acf_get_valid_post_id( 188 ), 188 );
	
	$post = get_post( 188 );
	acf_log_test( 'acf_get_valid_post_id( $post )', acf_get_valid_post_id( $post ), 188 );
	
	$user = get_user_by( 'ID', 1 );
	acf_log_test( 'acf_get_valid_post_id( $user )', acf_get_valid_post_id( $user ), "user_1" );
	
	$term = get_term( 2 );
	acf_log_test( 'acf_get_valid_post_id( $term )', acf_get_valid_post_id( $term ), "term_2" );
	
	$comment_id = 1;
	$comment = get_comment( $comment_id );
	acf_log_test( 'acf_get_valid_post_id( $comment )', acf_get_valid_post_id( $comment ), "comment_1" );
	
	acf_log_test( 'acf_get_valid_post_id( "option" )', acf_get_valid_post_id( "option" ), "options" );
}

/**
 * test_acf_maybe_get_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_maybe_get_field() {
	
	$field = acf_maybe_get_field( "image", 188 );
	acf_log_test( 'acf_maybe_get_field( "image", 188 )', acf_is_field($field) && $field['key'] === 'field_58f2fae6761ff' );
	
	$field = acf_maybe_get_field( "image2", 188 );
	acf_log_test( 'acf_maybe_get_field( "image2", 188 )', $field, false );
}

/**
 * test_acf_maybe_get_sub_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_maybe_get_sub_field() {
	
	$field = acf_maybe_get_sub_field( array("simple_rep", 0, "image"), 188 );
	acf_log_test( 'acf_maybe_get_sub_field( array("simple_rep", 0, "image")', acf_is_field($field) && $field['key'] === 'field_5b29a97d21c2b' );
	
	$field = acf_maybe_get_sub_field( array("simple_rep", 0, "image2"), 188 );
	acf_log_test( 'acf_maybe_get_sub_field( array("simple_rep", 0, "image2"), 188 )', $field, false );
}

/**
 * test_get_field
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_get_field() {
	
	$value = get_field( "image", 188 );
	acf_log_test( 'get_field( "image", 188 )', is_array($value) );
	
	$value2 = get_field( "image", 188, false );
	acf_log_test( 'get_field( "image", 188, false )', is_numeric($value2) );
	
	acf_log_test( 'get_field( "image2", 188 )', get_field( "image2", 188 ), null );
}

/**
 * test_get_field_object
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_get_field_object() {
	
	$field = get_field_object( "image", 188 );
	acf_log_test( 'get_field_object( "image", 188 )', acf_is_field($field) && is_array($field['value']) );
	
	$field = get_field_object( "image", 188, false );
	acf_log_test( 'get_field_object( "image", 188, false )', acf_is_field($field) && is_numeric($field['value']) );
	
	$field = get_field_object( "field_58f2fae6761ff", 188 );
	acf_log_test( 'get_field_object( "field_58f2fae6761ff", 188 )', acf_is_field($field) && is_array($field['value']) );
	
	acf_log_test( 'get_field_object( "image2", 188 )', get_field_object( "image2", 188 ), false );
}

/**
 * test_get_fields
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_get_fields() {
	
	$fields = get_fields( 188 );
	acf_log_test( 'get_fields( 188 )', is_array($fields) && is_array($fields['image']) );
	
	$fields2 = get_fields( 188, false );
	acf_log_test( 'get_fields( 188, false )', is_array($fields2) && is_numeric($fields2['image']) );
}

/**
 * test_have_rows
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_have_rows() {
	
	$have_row = have_rows("simple_rep", 188);
	acf_log_test( 'have_rows("simple_rep", 188)', $have_row );
	
	if( $have_row ) {
		while ( have_rows("simple_rep", 188) ) {
			$the_row = the_row();
			acf_log_test( 'the_row()', is_array($the_row) );
			
			$sub_value = get_sub_field( "image" );
			acf_log_test( 'get_sub_field( "image" )', is_array($sub_value) );
			
			$sub_value2 = get_sub_field( "image", false);
			acf_log_test( 'get_sub_field( "image", false )', is_numeric($sub_value2) );
		}
	}
	
	// Run again
	$counter = 0;
	if( have_rows("simple_rep", 188) ) {
		while ( have_rows("simple_rep", 188) ) {
			the_row();
			$counter++;
		}
	}
	acf_log_test( 'Again: have_rows("simple_rep", 188)', $counter, 2 );
	
}

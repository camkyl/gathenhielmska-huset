<?php 

// Add test.
acf_register_test( 'acf_test_hooks', 'Test Hooks' );

/**
 * acf_test_hooks
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_hooks() {
	
	test_acf_add_filter_variations();
	test_acf_add_deprecated_filter();
	
}

/**
 * test_acf_add_filter_variations
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_add_filter_variations() {
	
	$field = array(
		'key' => 'field_5ae69b1527aa7',
		'label' => 'Condition Trigger',
		'name' => 'condition_trigger',
		'type' => 'true_false',
		'instructions' => '',
		'required' => 1,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '50',
			'class' => '',
			'id' => '',
		),
		'message' => '',
		'default_value' => 0,
		'ui' => 0,
		'ui_on_text' => '',
		'ui_off_text' => '',
	);
	$count = 0;
	
	// Create callbacks.
	add_filter('acf/test_count', function( $arg0 ){
		return $arg0+1;
	});
	add_filter('acf/test_count/type=true_false', function( $arg0 ){
		return $arg0+1;
	});
	add_filter('acf/test_count/name=condition_trigger', function( $arg0 ){
		return $arg0+1;
	});
	add_filter('acf/test_count/key=field_5ae69b1527aa7', function( $arg0 ){
		return $arg0+1;
	});
	
	// The 'all' filter callback will recieve the filter name as $arg0.
	function temp_all_callback( $filter, $arg1 ) {
		acf_log( 'Current filter:', $filter );
	}
	
	// Add variation.
	acf_add_filter_variations( 'acf/test_count', array('type', 'name', 'key'), 1 );
	
	// Log before / after.
	//add_filter( 'acf/test_field', function(){ acf_log('BEFORE'); }, 0 );
	//add_filter( 'acf/test_field', function(){ acf_log('AFTER'); }, 20 );
	
	// Apply filter.
	add_filter('all', 'temp_all_callback');
	$count = apply_filters( 'acf/test_count', $count, $field );
	remove_filter('all', 'temp_all_callback');
	
	acf_log_test( "acf_add_filter_variations()", $count, 4 );
}

/**
 * test_acf_add_deprecated_filter
 *
 * Runs tests for this function.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function test_acf_add_deprecated_filter() {
	
	// Deprecated a filter.
	acf_add_deprecated_filter( 'old_filter', '1.0.2', 'new_filter' );
	
	// Hook into old filter.
	add_filter('old_filter', function( $arg0 ){
		return $arg0+1;
	});
	
	// Hook into new filter.
	add_filter('new_filter', function( $arg0 ){
		return $arg0+1;
	});
	
	// Apply filters.
	$count = apply_filters( 'new_filter', 0 );
	
	// Test
	acf_log_test( "acf_add_deprecated_filter()", $count, 2 );
}

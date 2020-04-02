<?php 

// Add test.
acf_register_test( 'acf_test_helpers', 'Test Helpers' );

/**
 * acf_test_helpers
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_helpers() {
	
	// Test acf_parse_type().
	acf_log_test( "acf_parse_type('Word ')", acf_parse_type('Word '), 'Word' );
	acf_log_test( "acf_parse_type('Word')", acf_parse_type('Word'), 'Word' );
	acf_log_test( "acf_parse_type('123')", acf_parse_type('123'), 123 );
	acf_log_test( "acf_parse_type('123.4')", acf_parse_type('123.4'), '123.4' );
	acf_log_test( "acf_parse_type('1,123')", acf_parse_type('1,123'), '1,123' );
	acf_log_test( "acf_parse_type(true)", acf_parse_type(true), true );
	acf_log_test( "acf_parse_type(false)", acf_parse_type(false), false );
	
	// Test acf_parse_types().
	acf_log_test( "acf_parse_types(array('123', 'Test '))", acf_parse_types(array('123', 'Test ')), array(123, 'Test') );
	
}

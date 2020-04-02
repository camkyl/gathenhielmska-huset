<?php 

// Bail early if not in development environment.
if( !defined( 'ACF_DEV' ) ) {
	return;
}

// Register store.
acf_register_store( 'test-results', array(
	'total' 	=> 0,
	'pass' 		=> 0,
	'fail' 		=> 0
));


/**
 * acf_log_test
 *
 * Logs a testing result within a helpful message.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	string $description The description of the test.
 * @param	string $result The test result.
 * @param	string $expected The expected result used to match against $result.
 * @return	void
 */
function acf_log_test( $description = '', $result = true, $expected = true ) {
	
	// Determine if test passed.
	$pass = ($result === $expected);
	
	// Log output
	acf_log(sprintf(
		'[%s] Testing %s... [%s === %s] %s',
		$pass ? 'x' : ' ',
		$description,
		json_encode($result),
		json_encode($expected),
		$pass ? '(Pass)' : '(Fail)'
	));
	
	// Append to store.
	$data = acf_get_store( 'test-results' )->get();
	$data['total']++;
	$pass ? $data['pass']++ : $data['fail']++;
	acf_get_store( 'test-results' )->set( $data );
}

/**
 * acf_log_test_results
 *
 * Logs a testing result within a helpful message.
 *
 * @date	22/1/19
 * @since	5.7.10
 *
 * @param	string $description The description of the test.
 * @param	string $result The test result.
 * @param	string $expected The expected result used to match against $result.
 * @return	void
 */
function acf_log_test_results() {
	
	// Get data
	extract( acf_get_store( 'test-results' )->get() );
	
	// Log output
	acf_log(sprintf(
		'========== Testing Complete. [%s]/[%s] Passed. [%s] Failed.',
		$pass,
		$total,
		$fail
	));
}

/**
 * acf_include_basic_tests
 *
 * Includes basic tests.
 *
 * @date	15/1/19
 * @since	5.7.10
 *
 * @param	void
 * @return	void
 */
function acf_include_basic_tests() {
	
	// Vars.
	$path = acf_get_path('tests/basic');
	
	// read
	$dir = opendir( $path );
	while(false !== ( $file = readdir($dir)) ) {
	
		// Check file type.
		if( strpos($file, '.php') === false ) {
			continue;
		}
		
		// Ignore disabled files.
		if( substr($file, 0, 1) === '_' ) {
			continue;
		}
		
		// Include test.
		include( "{$path}/{$file}" );
	}
}

// Include tests after all plugins are loaded.
add_action('plugins_loaded', 'acf_include_basic_tests');

// Register store.
acf_register_store( 'tests' );

/**
 * acf_register_test
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_register_test( $callback = '', $label = '' ) {
	acf_get_store( 'tests' )->set( $callback, $label );
}

/**
 * acf_add_admin_bar_tests
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_add_admin_bar_tests( $wp_admin_bar ) {
		
	// Add parent.
	$parent = $wp_admin_bar->add_menu(array(
		'id'	=> 'acf-tests',
		'title'	=> 'Tests',
	));
	
	// Add "all".
	$wp_admin_bar->add_menu(array(
		'parent'	=> 'acf-tests',
		'id'		=> "acf-test-all",
		'title'		=> "Test All",
		'href'		=> add_query_arg('acf-test', "all"),
	));
	
	// Add tests.
	foreach( acf_get_store( 'tests' )->get() as $callback => $label ) {
		$wp_admin_bar->add_menu(array(
			'parent'	=> 'acf-tests',
			'id'		=> "acf-test-$callback",
			'title'		=> $label,
			'href'		=> add_query_arg('acf-test', $callback),
		));
	}
}

// Add filter.
add_action('admin_bar_menu', 'acf_add_admin_bar_tests', 100);

/**
 * acf_run_tests
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_run_tests() {
	
	// Get test or bail early.
	if( isset($_GET['acf-test']) ) {
		$callback = $_GET['acf-test'];
	} else {
		return;
	}
	
	// Clear log.
	acf_clear_log();
		
	// Handle "all" tests.
	if( $callback === 'all' ) {
		foreach( acf_get_store( 'tests' )->get() as $callback => $label ) {
			call_user_func( $callback );
		}
		
	// Check if test exists.	
	} elseif( acf_get_store( 'tests' )->has($callback) ) {
		call_user_func( $callback );
	}
	
	// Log results.
	acf_log_test_results();
}

// Add action.
add_action( 'acf/init', 'acf_run_tests' );
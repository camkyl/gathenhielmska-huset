<?php 

// Bail early if not testing
if( !isset($_GET['test-data']) ) {
	return;
}

// Start memory
$start_memory = memory_get_usage();
$store = acf_register_store( 'test' );

$store->set( 'foo', get_post(188) );
$store->alias( 'foo', 'foo2' );

$store->set( 'foo2', 'bar2' );

acf_log( 'foo:', $store->get( 'foo' ) );
acf_log( 'foo2:', $store->get( 'foo2' ) );
acf_log( $store );


// End memory
acf_log( 'memory:', memory_get_usage() - $start_memory );

// Results
// Old: 1552
// New 1544

// No alias: 6448
// 2 alias: 6472 | 6480
// 3 alias: 6472 | 6512

// Issue with using & is that if another field has name "image", this could override existing data with that name but also affect the ID and key version.
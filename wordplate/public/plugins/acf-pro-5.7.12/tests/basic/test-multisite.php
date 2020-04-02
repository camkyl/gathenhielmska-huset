<?php 

// Add test.
if( is_multisite() ) {
	acf_register_test( 'acf_test_multisite', 'Test Multisite' );
}

/**
 * acf_test_misc
 *
 * description
 *
 * @date	31/1/19
 * @since	5.7.11
 *
 * @param	type $var Description. Default.
 * @return	type Description.
 */
function acf_test_multisite() {
	
	// Get all sites.
	$sites = acf_get_sites();
	
	// Switch to site1.
	$blog_id = get_current_blog_id();
	switch_to_blog(1);
	
	// Register defaul store.
	$store = acf_register_store('store1');
	$multistore = acf_register_store('store2')->prop( 'multisite', true );
	acf_log_test( '$store->set("foo", "bar")->get("foo")', $store->set("foo", "bar")->get("foo"), 'bar' );
	acf_log_test( '$store->set("foo", "baz")->get("foo")', $store->set("foo", "baz")->get("foo"), 'baz' );
	acf_log_test( '$multistore->set("foo", "muli1")->get("foo")', $multistore->set("foo", "muli1")->get("foo"), 'muli1' );
	
	// Switch to site2.
	switch_to_blog(2);
	acf_log( 'switch_to_blog(2)' );
	acf_log_test( '$store->get("foo")', $store->get("foo"), 'baz' );
	acf_log_test( '$store->set("foo", "bar2")->get("foo")', $store->set("foo", "bar2")->get("foo"), 'bar2' );
	acf_log_test( '$multistore->get("foo")', $multistore->get("foo"), null );
	acf_log_test( '$multistore->set("foo", "muli2")->get("foo")', $multistore->set("foo", "muli2")->get("foo"), 'muli2' );
	
	// Swicth back to site1.
	switch_to_blog(1);
	acf_log( 'switch_to_blog(1)' );
	acf_log_test( '$store->get("foo")', $store->get("foo"), 'bar2' );
	acf_log_test( '$multistore->get("foo")', $multistore->get("foo"), 'muli1' );
	
	// Switch to site2.
	switch_to_blog(2);
	acf_log( 'switch_to_blog(2)' );
	acf_log_test( '$store->get("foo")', $store->get("foo"), 'bar2' );
	acf_log_test( '$multistore->get("foo")', $multistore->get("foo"), 'muli2' );
		
	// loop over sites
	$values = array();
	if( $sites ) {
	foreach( $sites as $site ) {
			
		// switch blog
		switch_to_blog( $site['blog_id'] );
		
		// check for upgrade
		$values[ $site['blog_id'] ] = $store->get("foo");
	}}
	acf_log( $values );
	
	$values = array();
	if( $sites ) {
	foreach( $sites as $site ) {
			
		// switch blog
		switch_to_blog( $site['blog_id'] );
		
		// check for upgrade
		$values[ $site['blog_id'] ] = get_field('logo', 'options');
	}}
	
	// Restore original blog.
	switch_to_blog( $blog_id );
	
	acf_log( $values );
}

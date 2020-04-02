<?php 

// Add test.
acf_register_test( 'acf_test_l10n', 'Test l10n' );

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
function acf_test_l10n() {
	
	// Test determine_locale()
	acf_log_test( "determine_locale()", determine_locale(), "en_AU" );
	
	// Test acf_get_locale()
	acf_log_test( "acf_get_locale()", acf_get_locale(), "en_AU" );
	
	// Test _acf_apply_language_cache_key()
	acf_log_test( "_acf_apply_language_cache_key('my-key')", _acf_apply_language_cache_key('my-key'), "my-key" );
	
	// Test _acf_apply_language_cache_key() with current language.
	acf_update_setting('current_language', 'pt_BR');
	acf_log_test( "_acf_apply_language_cache_key('my-key')", _acf_apply_language_cache_key('my-key'), "my-key:pt_BR" );
}

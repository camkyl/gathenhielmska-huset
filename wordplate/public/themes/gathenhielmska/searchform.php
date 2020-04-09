<?php

/**
 * Search form
 *
 * https://developer.wordpress.org/reference/functions/get_search_form/
 */

// to print the search form: get_search_form();

?>
<form action="/" method="get">
    <label for="search">Search in <?php echo home_url('/'); ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <!--Fix path of search icon!!-->
    <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/public/icons/search-icon.svg" />
</form>

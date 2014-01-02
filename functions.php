<?php
/*
Plugin Name: Fourteen Extended
Plugin URI:  http://wordpress.org/plugins/fourteen-extended
Description: A functionality plugin for extending the Twenty Fourteen theme.
Author:      Zulfikar Nore
Author URI:  http://www.wpstrapcode.com/
Version:     1.0.9
License:     GPL
*/

// Only run if theme or parent theme is Twenty Fourteen.
if ( get_template() != 'twentyfourteen' ) {
	return;
}

/**
 * Loads the plugin textdomain for translations.
 *
 * @since Fourteen Extended 1.0.0
 *
 * @return void
 */
function fourteenxt_extended_load_textdomain() {
	// This will load the WordPress-downloaded language pack if it exists, as languages are not bundled with the plugin.
	load_plugin_textdomain( 'fourteenxt' );
}
add_action( 'plugins_loaded', 'fourteenxt_extended_load_textdomain' );

// Customizer Moved to inc folder - since v1.0.9
require_once('inc/fourteenxt-customizer.php'); // Include Extended Customizer

/**
 * Extend the default WordPress body classes and run them according to our settings.
 *
 * Adds body classes Index views Full-width content layout.
 * Single views Full-width content layout.
 * Fully centred site
 *
 * @since Fourteen Extended 1.0.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function fourteenxt_body_classes( $classes ) {
global $content_width;
	
	if (get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
    if (is_home() ) : 
        $classes[] = 'full-width';
	endif;
    }
	
	if (get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
	if (is_singular() && !is_page() ) : 
        $classes[] = 'full-width';
   	endif;
	}
	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes' );

function fourteenxt_blog_feed_cat( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display posts in ascending order on the blog feed/archive
        $query->set( 'category_name', get_theme_mod( 'fourteenxt_feed_cat' ));
        return;
    }
}
add_action( 'pre_get_posts', 'fourteenxt_blog_feed_cat', 1 );

/**
 * Loads the fitvids plugin.
 *
 * @since Fourteen Extended 1.0.9
 */

// add FitVids to site
if ( get_theme_mod( 'fourteenxt_fitvids_enable' ) != 0 ) {

function fourteenxt_fitvids_scripts() {
   	// add fitvids
	wp_register_script( 'fourteenxt_fitvids',plugin_dir_url( __FILE__ ).'js/jquery.fitvids.js','extended-fitvids', array( 'jquery' ), true );
    wp_enqueue_script( 'fourteenxt_fitvids' );
	
} // end fitvids_scripts
add_action('wp_enqueue_scripts','fourteenxt_fitvids_scripts', 20);

// selector script
function fourteenxt_fitthem() { ?>
   	<script type="text/javascript">
   	jQuery(document).ready(function() {
   		jQuery('<?php echo get_theme_mod('fourteenxt_fitvids_selector'); ?>').fitVids({ customSelector: '<?php echo stripslashes(get_theme_mod('fourteenxt_fitvids_custom_selector')); ?>'});
   	});
   	</script>
<?php } // End selector script
add_action( 'wp_footer', 'fourteenxt_fitthem', 210 );
} // End FitVids enable

// Styles Moved to inc folder - since v1.0.9
require_once('inc/fourteenxt-styles.php'); // Include Extended Styles
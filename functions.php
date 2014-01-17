<?php
/*
Plugin Name: Fourteen Extended
Plugin URI:  http://wpdefault.com/fourteen-extended/
Description: A functionality plugin for extending the Twenty Fourteen theme.
Author:      Zulfikar Nore
Author URI:  http://www.wpstrapcode.com/
Version:     1.1.6
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
 * Add filter to the_content.
 *
 * @since Fourteen Extended 1.1.2
 */
if ( get_theme_mod( 'fourteenxt_home_excerpts' ) != 0 ) {
function fourteenxt_excerpts($content = false) {

// If is the home page, an archive, or search results
	if(is_home() ) :
		global $post;
		$content = $post->post_excerpt;

	// If an excerpt is set in the Optional Excerpt box
		if($content) :
		$content = apply_filters('the_excerpt', $content);

	// If no excerpt is set
		else :
			$content = $post->post_content;
			if (get_theme_mod( 'fourteenxt_excerpt_length' )) :
			$excerpt_length = get_theme_mod( 'fourteenxt_excerpt_length' );
			else : 
			$excerpt_length = 30;
			endif;
			$words = explode(' ', $content, $excerpt_length + 1);
			$more = ( fourteenxt_read_more() );
			if(count($words) > $excerpt_length) :
				array_pop($words);
				array_push($words, $more);
				$content = implode(' ', $words);
			endif;
			
			// If post format is video use first video as excerpt
            $postcustom = get_post_custom_keys();
            if ($postcustom){
                $i = 1;
                foreach ($postcustom as $key){
                    if (strpos($key,'oembed')){
                        foreach (get_post_custom_values($key) as $video){
                            if ($i == 1){
                            $content = $video;
                            }
                            $i++;
                        }
                    }  
                }
            }
			$content = $content;
		endif;
	endif;

// Make sure to return the content
	return $content;
}
add_filter('the_content', 'fourteenxt_excerpts');

/**
 * Returns a "Continue Reading" link for excerpts
 */
function fourteenxt_read_more() {
    return '&hellip; <a href="' . get_permalink() . '">' . __('Continue Reading &#8250;&#8250;', 'fourteenxt') . '</a><!-- end of .read-more -->';
}
//End filter to the_content
}

if ( get_theme_mod( 'fourteenxt_enable_autoslide' ) != 0 &&  get_theme_mod( 'featured_content_layout' ) == 'slider' ) {

//dequeue/enqueue scripts
function fourteenxt_featured_content_scripts() {
if ( is_front_page() ) :
wp_dequeue_script( 'twentyfourteen-script' );
wp_dequeue_script( 'twentyfourteen-slider' );

wp_enqueue_script( 'fourteenxt-script', plugin_dir_url( __FILE__ ) . 'js/functions.js', array( 'jquery', 'fourteenxt-slider' ), '' , true );

wp_enqueue_script( 'fourteenxt-slider', plugin_dir_url( __FILE__ ) . 'js/jquery.flexslider-min.js', array( 'jquery', ), '' , true );
wp_localize_script( 'fourteenxt-slider', 'featuredSliderDefaults', array(
'prevText' => __( 'Previous', 'fourteenxt' ),
'nextText' => __( 'Next', 'fourteenxt' )
) );

if ( get_theme_mod( 'fourteenxt_slider_transition' ) ==  'slide' ) :
    wp_enqueue_script( 'fourteenxt-slider-slide', plugin_dir_url( __FILE__ ) . 'js/slider-slide.js', array( 'jquery', ), '' , true );

elseif ( get_theme_mod( 'fourteenxt_slider_transition' ) == 'fade' ) :
    wp_enqueue_script( 'fourteenxt-slider-fade', plugin_dir_url( __FILE__ ) . 'js/slider-fade.js', array( 'jquery', ), '' , true );
endif;

endif;
}

add_action( 'wp_enqueue_scripts' , 'fourteenxt_featured_content_scripts' , 210 );
}


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
add_action('wp_enqueue_scripts','fourteenxt_fitvids_scripts', 210);

// selector script
function fourteenxt_fitthem() { ?>
   	<script type="text/javascript">
   	jQuery(document).ready(function() {
   		jQuery('<?php echo get_theme_mod('fourteenxt_fitvids_selector'); ?>').fitVids({ customSelector: '<?php echo stripslashes(get_theme_mod('fourteenxt_fitvids_custom_selector')); ?>'});
   	});
   	</script>
<?php } // End selector script
add_action( 'wp_footer', 'fourteenxt_fitthem', 220 );
} // End FitVids enable

// Styles Moved to inc folder - since v1.0.9
require_once('inc/fourteenxt-styles.php'); // Include Extended Styles

if ( get_theme_mod( 'fourteenxt_featured_visibility' ) != 0 ) {
	function fourteenxt_remove_pre_get_posts() {
	    remove_action( 'pre_get_posts', array( 'Featured_Content', 'pre_get_posts' ) );
    }
add_action( 'init', 'fourteenxt_remove_pre_get_posts', 31 );
}

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
 
if ( get_theme_mod( 'fourteenxt_body_class_filters' ) != 0 ) {
	function fourteenxt_remove_body_classes() {
	    remove_filter( 'body_class', 'twentyfourteen_body_classes' );
    }
    add_action( 'init', 'fourteenxt_remove_body_classes', 31 );
	
	function fourteenxt_body_classes_reset( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() || ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes_reset' );
}


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
	
	if (get_theme_mod( 'fourteenxt_fullwidth_archives' ) != 0 ) {
	if ( is_archive() ) : 
        $classes[] = 'full-width';
   	endif;
	}
	
	if (get_theme_mod( 'fourteenxt_fullwidth_searches' ) != 0 ) {
	if ( is_search() ) : 
        $classes[] = 'full-width';
   	endif;
	}
		
	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes' );

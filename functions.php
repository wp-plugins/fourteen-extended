<?php
/*
Plugin Name: Fourteen Extended
Plugin URI:  http://wordpress.org/plugins/fourteenth-extended
Description: A functionality plugin for extending the Twenty Fourteen theme.
Author:      Zulfikar Nore
Author URI:  http://www.wpstrapcode.com/
Version:     1.0.1
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
function fourteenxt_colors_load_textdomain() {
	// This will load the WordPress-downloaded language pack if it exists, as languages are not bundled with the plugin.
	load_plugin_textdomain( 'fourteenxt' );
}
add_action( 'plugins_loaded', 'fourteenxt_colors_load_textdomain' );


/**
 * Add and modify the customizer settings and controls.
 *
 * @since Fourteen Extended 1.0.0
 *
 */
function fourteenxt_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'fourteenxt_general_options' , array(
       'title'      => __('TwentyFourteen General Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set general theme options. Current options are: Center the site, Set Blog feed to full width, Set single post to full width, set content max-width and move content to below the featured image with more to come!', 'fourteenxt' )),
       'priority'   => 30,
    ) );
	
	// Lets center the site shall we
    $wp_customize->add_setting(
        'fourteenxt_center_site'
    );

    $wp_customize->add_control(
        'fourteenxt_center_site',
    array(
        'type'     => 'checkbox',
        'label'    => __('Center Align Site Layout?', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 1,
        )
    );
	
	// Primary position switch - float it to the left.
	$wp_customize->add_setting( 'fourteenxt_primary_menu_float', array(
		'default' => 'right',
	) );
	
	$wp_customize->add_control( 'fourteenxt_primary_menu_float', array(
    'label'   => __( 'Float Primary Menu to the left?', 'fourteenxt' ),
    'section' => 'fourteenxt_general_options',
	'priority' => 2,
    'type'    => 'radio',
        'choices' => array(
            'right' => __( 'Default - Right', 'fourteenxt' ),
            'left'  => __( 'Float Left', 'fourteenxt' ),
        ),
    ));
	
	// Set Blog feed to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_blog_feed'
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_blog_feed',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to hide the sidebar on the blog feed', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 3,
        )
    );
	
	// Set Blog feed to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_single_post'
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_single_post',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width single post', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_content_off_featured_image',
    array(
        'default' => '-48',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_off_featured_image',
    array(
        'label' => __('Enter 1 or more for padding to move content off featured image (numbers only!) - default is -48','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 5,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_content_width_adjustment',
    array(
        'default' => '474',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_width_adjustment',
    array(
        'label' => __('Set Content max-width (numbers only!) - maximum recommended is 874 & Default is 474','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 6,
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'fourteenxt_customize_register' );

// Run our custom output from the settings
function fourteenxt_extra_scripts() {
if ( is_home() ) : 
if ( get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
    ?>
	    <style>
	        .content-sidebar { display: none;}
			.full-width .post-thumbnail img {
	            width: 100%;
            }
	    </style>
<?php }
endif;

if ( is_singular() ) : 
if ( get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
    ?>
	    <style>
	        .content-sidebar { display: none;}
			.full-width .post-thumbnail img {
	            width: 100%;
            }
	    </style>
<?php }
endif;
}
add_action( 'wp_head', 'fourteenxt_extra_scripts' );

function fourteenxt_general_css(){

if ( get_theme_mod( 'fourteenxt_primary_menu_float' ) ) {
    $primary_menu_float = get_theme_mod( 'fourteenxt_primary_menu_float' );
	// Apply custom settings to appropriate element ?>
    <style>
	    .primary-navigation {
		    float: <?php echo $primary_menu_float; ?>;
			margin-left: 20px;
	    }
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_center_site' ) != 0 ) {
 // Apply site layout settings to appropriate element ?>
    <style>
	    .site {
            margin: 0 auto;
        }
		@media screen and (min-width: 1110px) {
	        .archive-header,
	        .comments-area,
	        .image-navigation,
	        .page-header,	        
			.page-content,
	        .post-navigation,
	        .site-content .entry-header,
	        .site-content .entry-content,
	        .site-content .entry-summary,
	        .site-content footer.entry-meta {
		        padding-left: 55px;
	        }
        }
	</style>
<?php }
 
if ( get_theme_mod( 'fourteenxt_content_off_featured_image' ) ) {
    $conten_padding_top = esc_html( get_theme_mod( 'fourteenxt_content_off_featured_image' ));
	// Apply custom settings to appropriate element ?>
    <style>
	    .site-content .has-post-thumbnail .entry-header {
		    margin-top: <?php echo $conten_padding_top; ?>px !important;
	    }
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_content_width_adjustment' ) ) {
    $conten_max_width = esc_html( get_theme_mod( 'fourteenxt_content_width_adjustment' ));
	// Apply site custom settings to appropriate element ?>
    <style>
	    .site-content .entry-header,
        .site-content .entry-content,
        .site-content .entry-summary,
        .site-content .entry-meta,
        .page-content {
	        max-width: <?php echo $conten_max_width; ?>px;
        }
	</style>
<?php }
}
add_action( 'wp_head', 'fourteenxt_general_css' );

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

	if (is_home() ) : 
    if (get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
	$classes[] = 'full-width';
	} endif;
	
	if (is_singular() ) : 
    if (get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
    $classes[] = 'full-width';
    } endif;

	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes' );
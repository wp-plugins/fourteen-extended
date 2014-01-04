<?php
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
	
	$wp_customize->add_section( 'fourteenxt_content_options' , array(
       'title'      => __('TwentyFourteen Content Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set content options. A screen refresh may be required to see some of the changes in the customizer!', 'fourteenxt' )),
       'priority'   => 31,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_fitvids_options' , array(
       'title'      => __('TwentyFourteen FitVids Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set fitvids script options. Options are: Enable script, Set selector (Default is .post) and set custom selector (optional) for other areas like .sidebar or a custom section!', 'fourteenxt' )),
       'priority'   => 32,
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
        'section'  => 'fourteenxt_content_options',
		'priority' => 1,
        )
    );
	
	// Set Single to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_single_post'
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_single_post',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width single post', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 2,
        )
    );
	
	// Set Archives to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_archives'
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_archives',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width for archives, categories and tags', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 3,
        )
    );
	
	// Set Searches to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_searches'
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_searches',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width for Search results page', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_content_off_featured_image',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_off_featured_image',
    array(
        'label' => __('Enter 1 or more for padding to move content off featured image (numbers only!) - default is -48','fourteenxt'),
        'section' => 'fourteenxt_content_options',
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
        'section' => 'fourteenxt_content_options',
		'priority' => 6,
        'type' => 'text',
    ));
	
	// Blog Feed Category Selector
    $categories = get_categories();
	$cats = array( 'All Categories' );
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('fourteenxt_feed_cat', array(
		'default'  => '',
	));
	$wp_customize->add_control( 'fourteenxt_feed_cat', array(
		'settings' => 'fourteenxt_feed_cat',
		'label'   => __('Select Blog Feed Category:', 'fourteenxt'),
		'section'  => 'fourteenxt_content_options',
		'priority' => 7,
		'type'    => 'select',
		'choices' => $cats,
	));
	
	$wp_customize->add_setting(
        'fourteenxt_home_excerpts'
    );

    $wp_customize->add_control(
        'fourteenxt_home_excerpts',
    array(
        'type'     => 'checkbox',
        'label'    => __('Switch blog feed to show excerpts?', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 8,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_excerpt_length',
    array(
        'default' => 55,
    ));
	
	$wp_customize->add_control(
    'fourteenxt_excerpt_length',
    array(
        'label' => __('Enter desired home excerpt length (numbers only!) - default is 55.','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 9,
        'type' => 'text',
    ));
	
	// Add FitVids to site
    $wp_customize->add_setting(
        'fourteenxt_fitvids_enable'
    );

    $wp_customize->add_control(
        'fourteenxt_fitvids_enable',
    array(
        'type'     => 'checkbox',
        'label'    => __('Enable FitVids?', 'fourteenxt'),
        'section'  => 'fourteenxt_fitvids_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_fitvids_selector',
    array(
        'default' => '.post',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_fitvids_selector',
    array(
        'label' => __('Enter a selector for FitVids - i.e. .post','fourteenxt'),
        'section' => 'fourteenxt_fitvids_options',
		'priority' => 2,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_fitvids_custom_selector',
    array(
        'default' => '',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_fitvids_custom_selector',
    array(
        'label' => __('Enter a custom selector for FitVids - i.e. .sidebar','fourteenxt'),
        'section' => 'fourteenxt_fitvids_options',
		'priority' => 3,
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'fourteenxt_customize_register' );
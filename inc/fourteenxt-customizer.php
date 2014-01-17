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
	
	$wp_customize->add_section( 'fourteenxt_mobile_options' , array(
       'title'      => __('TwentyFourteen Mobile Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set mobile options. Options are: Show full content on home page on mobile instead of list view. Featured content mobile layout - grid or slider. Please note that the mobile layout will only work if the device is a mobile therefore minimizing the desktop window will have no effect and will show the default layout set in the featured section.', 'fourteenxt' )),
       'priority'   => 33,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_slider_options' , array(
       'title'      => __('Featured Slider Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set slider options. Use wisely - in most cases it is best to leave the width setting as is! Only check the "Remove featured background" box if you have reduced the width setting', 'fourteenxt' )),
       'priority'   => 131,
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
	
	$wp_customize->add_setting(
    'fourteenxt_maximum_site_width',
    array(
        'default' => '1260',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_maximum_site_width',
    array(
        'label' => __('Set Overall Site max-width (numbers only!) - Default is 1260.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 2,
        'type' => 'text',
    ));
		
	// Primary position switch - float it to the left.
	$wp_customize->add_setting( 'fourteenxt_primary_menu_float', array(
		'default' => 'right',
	) );
	
	$wp_customize->add_control( 'fourteenxt_primary_menu_float', array(
    'label'   => __( 'Float Primary Menu to the left?', 'fourteenxt' ),
    'section' => 'fourteenxt_general_options',
	'priority' => 3,
    'type'    => 'radio',
        'choices' => array(
            'right' => __( 'Default - Right', 'fourteenxt' ),
            'left'  => __( 'Float Left', 'fourteenxt' ),
        ),
    ));
	
	// Lets center the site shall we
    $wp_customize->add_setting(
        'fourteenxt_hide_left_sidebar'
    );

    $wp_customize->add_control(
        'fourteenxt_hide_left_sidebar',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove Left Sidebar? - Hide left sidebar sitewide', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_overall_content_width',
    array(
        'default' => '1038',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_overall_content_width',
    array(
        'label' => __('Set Overall Content (hentry) max-width (numbers only!) - maximum recommended is 1260 & Default is 1038.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 5,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_overall_image_height',
    array(
        'default' => '572',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_overall_image_height',
    array(
        'label' => __('Set Overall Content Image max-height (numbers only!) - maximum recommended is 572.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 6,
        'type' => 'text',
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
        'fourteenxt_content_top_padding'
    );

    $wp_customize->add_control(
        'fourteenxt_content_top_padding',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to remove the white space above content', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 5,
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
		'priority' => 6,
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
        'label' => __('Set Content max-width (numbers only!) - maximum recommended is 874 & Default is 474. Set to 700 when hiding left sidebar only!','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 7,
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
		'priority' => 8,
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
		'priority' => 9,
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
		'priority' => 10,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
        'fourteenxt_sidebar_top_border'
    );

    $wp_customize->add_control(
        'fourteenxt_sidebar_top_border',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to remove widget title top border', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 11,
        )
    );
	
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
	
	// Mobile View Options
    $wp_customize->add_setting(
        'fourteenxt_body_class_filters'
    );

    $wp_customize->add_control(
        'fourteenxt_body_class_filters',
    array(
        'type'     => 'checkbox',
        'label'    => __('Turn home page List View off? i.e show full content!', 'fourteenxt'),
        'section'  => 'fourteenxt_mobile_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting( 
	    'fourteenxt_layout_mobile', 
	    array( 
	        'default' => 'grid' 
	    )
	);

    $wp_customize->add_control( 
        'fourteenxt_layout_mobile', array(
            'label' => __( 'Featured Content layout for mobile devices', 'fourteenxt'),
            'section' => 'fourteenxt_mobile_options',
			'priority' => 2,
            'settings' => 'fourteenxt_layout_mobile',
            'type' => 'select',
            'choices' => array(
                'grid' => 'Grid',
                'slider' => 'Slider',
            ),
        ) 
	);
	
	// Add option to Featured tab to show featured content in blog feed
	$wp_customize->add_setting(
        'fourteenxt_featured_visibility'
    );

    $wp_customize->add_control(
        'fourteenxt_featured_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Featured Posts in blog feed?', 'fourteenxt'),
        'section'  => 'featured_content',
		'priority' => 31,
        )
    );
	
	// Begin Slider Options
	$wp_customize->add_setting(
        'fourteenxt_enable_autoslide'
    );

    $wp_customize->add_control(
        'fourteenxt_enable_autoslide',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to set Slider to Auto Fade/Slide', 'fourteenxt'),
        'section'  => 'fourteenxt_slider_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting( 'fourteenxt_slider_transition', array(
		'default' => 'slide',
	) );

	
	$wp_customize->add_control( 'fourteenxt_slider_transition', array(
    'label'   => __( 'Slider Transition', 'fourteenxt' ),
    'section' => 'fourteenxt_slider_options',
	'priority' => 2,
    'type'    => 'radio',
        'choices' => array(
            'slide' => __( 'Slide', 'fourteenxt' ),
            'fade' => __( 'Fade', 'fourteenxt' ),
        ),
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_slider_width',
    array(
        'default' => '1600',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_slider_width',
    array(
        'label' => __('Set Slider max-width (numbers only!) - Default is 1600.','fourteenxt'),
        'section' => 'fourteenxt_slider_options',
		'priority' => 3,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_slider_height',
    array(
        'default' => '500',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_slider_height',
    array(
        'label' => __('Set Slider max-height (numbers only!) - Default is 500!','fourteenxt'),
        'section' => 'fourteenxt_slider_options',
		'priority' => 4,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_slider_topmargin',
    array(
        'default' => '0',
    ));
	
	$wp_customize->add_control(
    'fourteenxt_slider_topmargin',
    array(
        'label' => __('Set Slider Top Margin (numbers only!) - Default is 0!','fourteenxt'),
        'section' => 'fourteenxt_slider_options',
		'priority' => 5,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
        'fourteenxt_featured_bg_visibility'
    );

    $wp_customize->add_control(
        'fourteenxt_featured_bg_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove the featured background?', 'fourteenxt'),
        'section'  => 'fourteenxt_slider_options',
		'priority' => 6,
        )
    );

}
add_action( 'customize_register', 'fourteenxt_customize_register' );


function fourteenxt_mobile_layout( $value ) {

if ( wp_is_mobile() ){
return get_theme_mod( 'fourteenxt_layout_mobile', 'grid' );
} else {
return $value;
}
}

add_filter( 'theme_mod_featured_content_layout', 'fourteenxt_mobile_layout' );


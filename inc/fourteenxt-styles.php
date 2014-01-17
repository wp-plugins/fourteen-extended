<?php // Run our custom output from the settings

function fourteenxt_general_css(){

if ( get_theme_mod( 'fourteenxt_primary_menu_float' ) ) {
    $primary_menu_float = get_theme_mod( 'fourteenxt_primary_menu_float' );
	$max_site_width     = get_theme_mod( 'fourteenxt_maximum_site_width' );
	// Apply custom settings to appropriate element ?>
    <style>
	    @media screen and (min-width: 783px) {
		    .primary-navigation {
		        float: <?php echo $primary_menu_float; ?>;
			    margin-left: 20px;
	        }
		}
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_center_site' ) != 0 ) {
 // Apply site layout settings to appropriate element ?>
    <style>
		.site {
            margin: 0 auto;
			max-width: <?php echo $max_site_width; ?>px;
			width: 100%;
        }
		.site-header {
		    max-width: <?php echo $max_site_width; ?>px;
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

if ( get_theme_mod( 'fourteenxt_content_top_padding' ) != 0 ) { ?>
    <style>
        .content-area {
	        padding-top: 0;
        }
        .content-sidebar {
	        padding-top: 0;
        }
		@media screen and (min-width: 846px) {
	        .content-area,
	        .content-sidebar {
		        padding-top: 0;
	        }
        }
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_sidebar_top_border' ) != 0 ) { ?>
    <style>
		.content-sidebar .widget .widget-title {
		    border-top: 0;
		}
	</style>
<?php }
 
if ( get_theme_mod( 'fourteenxt_content_off_featured_image' ) ) {
    $conten_padding_top = esc_html( get_theme_mod( 'fourteenxt_content_off_featured_image' ));
	// Apply custom settings to appropriate element ?>
    <style>
	    @media screen and (min-width: 594px) {
		    .site-content .has-post-thumbnail .entry-header {
		        margin-top: <?php echo $conten_padding_top; ?>px !important;
	        }
		}
		@media screen and (min-width: 846px) {
		    .site-content .has-post-thumbnail .entry-header {
		        margin-top: <?php echo $conten_padding_top; ?>px !important;
	        }
		}
		@media screen and (min-width: 1040px) {
            .site-content .has-post-thumbnail .entry-header {
		        margin-top: <?php echo $conten_padding_top; ?>px !important;
	        }
        }
	</style>
<?php }

}
add_action( 'wp_head', 'fourteenxt_general_css' );

function fourteenxt_extra_scripts() {
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
		.comments-area {
            max-width: <?php echo $conten_max_width; ?>px;
        }
		.post-navigation, .image-navigation {
            max-width: <?php echo $conten_max_width; ?>px;
        }
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
if ( is_home() ) : 
    ?>
	    <style>
	        .content-sidebar { display: none;}
			.full-width .post-thumbnail img {
	            width: 100%;
            }
	    </style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
if ( is_singular() && !is_page()) : 
    ?>
	<style>
	    .content-sidebar { display: none;}
	    .full-width .post-thumbnail img {
	        width: 100%;
        }
	</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_archives' ) != 0 ) {
if ( is_archive() ) : 
    ?>
	<style>
	    .content-sidebar { display: none;}
	    .full-width .post-thumbnail img {
	        width: 100%;
        }
	</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_searches' ) != 0 ) {
if ( is_search() ) : 
    ?>
	<style>
	    .content-sidebar { display: none;}
	    .full-width .post-thumbnail img {
	        width: 100%;
        }
	</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_hide_left_sidebar' ) != 0 ) { 
?>
    <style>
	    .site:before,
        #secondary {
		    width: 0;
		    display: none;
	    }
		.featured-content {
            padding-left: 0;
        }
		.site-content, .site-main .widecolumn {
            margin-left: 0;
        }
		@media screen and (min-width: 1008px) {
	        .search-box-wrapper {
		        padding-left: 0;
	        }
		}
		@media screen and (min-width: 1080px) {
		    .search-box-wrapper,
	        .featured-content {
		        padding-left: 0;
	        }
		}
	</style>
<?php } 

if ( get_theme_mod( 'fourteenxt_overall_content_width' ) ) { 
$overall_conten_width  = esc_html( get_theme_mod( 'fourteenxt_overall_content_width' ));
$overall_image_height  = esc_html( get_theme_mod( 'fourteenxt_overall_image_height' ));  
 ?>
    <style>
		.hentry {
            max-width: <?php echo $overall_conten_width; ?>px;
        }
		.site-content .post-thumbnail img {
		    max-width: <?php echo $overall_conten_width; ?>px;
			width: 100%;
		}
		.post-thumbnail {
            background: none;
        }
		a.post-thumbnail:hover {
           background-color: transparent;
        }
		img.size-full,
        img.size-large,
        .wp-post-image,
        .post-thumbnail img {
	        max-height: <?php echo $overall_image_height; ?>px;
	        max-width: 100%;
        }
	</style>
<?php }
if ( get_theme_mod( 'fourteenxt_slider_width' ) ) { 
$overall_slider_width  = esc_html( get_theme_mod( 'fourteenxt_slider_width' ));
$overall_slider_height = esc_html( get_theme_mod( 'fourteenxt_slider_height' ));
$slider_margin_top     = esc_html( get_theme_mod( 'fourteenxt_slider_topmargin' ));
?>
    <style>
		.slider .featured-content .hentry {
			max-height: <?php echo $overall_slider_height; ?>px;
        }
		.slider .featured-content {
	        max-width: <?php echo $overall_slider_width; ?>px;
			margin: <?php echo $slider_margin_top; ?>px auto;
        }
		.slider .featured-content .post-thumbnail img {
            max-width: <?php echo $overall_slider_width; ?>px;
			width: 100%;
        }
		.post-thumbnail {
            background: none;
        }
		a.post-thumbnail:hover {
            background-color: transparent;
        }
	</style>
<?php
if ( get_theme_mod( 'fourteenxt_featured_bg_visibility' ) != 0 ) { ?>
    <style>
		.featured-content {
            background: none;
        }
	</style>
<?php } }
}
add_action( 'wp_head', 'fourteenxt_extra_scripts' );
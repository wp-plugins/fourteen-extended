<?php // Run our custom output from the settings

function fourteenxt_general_css(){

if ( get_theme_mod( 'fourteenxt_primary_menu_float' ) ) {
    $primary_menu_float = get_theme_mod( 'fourteenxt_primary_menu_float' );
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

}
add_action( 'wp_head', 'fourteenxt_extra_scripts' );
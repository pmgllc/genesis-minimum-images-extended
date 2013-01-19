<?php

/** Load everything */
add_action( 'genesis_meta', 'load_gmie_banner_image' );

function load_gmie_banner_image() {

	/** Remove default minimum image if it exists */
	$custom_image_id = genesis_get_custom_field( '_gmie_image_id' );
        if ( $custom_image_id ) {
		remove_action( 'genesis_after_header', 'minimum_featured_image' );
		
		/** Add the new featured & custom image sections */
		add_action( 'genesis_after_header', 'gmie_banner_image' );
	}
	
	/** Make sure page title loads after the banner if it's enabled */
	if ( function_exists('minimum_page_title') ) {
		remove_action( 'genesis_after_header', 'minimum_page_title' );
		add_action( 'genesis_after_header', 'minimum_page_title' );
	}
}

/** Include the featured image */
function gmie_banner_image() {
	if ( is_home() ) {
		echo '<div id="featured-image"><img src="'. get_stylesheet_directory_uri() . '/images/sample.jpg" /></div>';
	}
	
	elseif ( is_singular( array( 'post', 'page' ) ) ) {
	$custom_image_id = genesis_get_custom_field( '_gmie_image_id' );
	$custom_image = wp_get_attachment_image_src( $custom_image_id, 'full' );
	$image_alt = get_post_meta($custom_image_id, '_wp_attachment_image_alt', true);
		if ( $custom_image ) {
		echo '<img id="featured-image" src="' . esc_url( $custom_image[0] ).'"';
		if ( $image_alt ) { 
			echo ' alt="' . esc_attr( $image_alt ).'"';
			}
		echo ' />';
		}
	}
}

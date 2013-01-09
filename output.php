<?php

/** Load everything */
add_action( 'genesis_meta', 'load_gmie_banner_image' );

function load_gmie_banner_image() {

	/** Remove default minimum image if it exists */
	if ( function_exists('minimum_featured_image') ) {
		remove_action( 'genesis_after_header', 'minimum_featured_image' );
	}

	/** Add the new featured & custom image sections */
	add_action( 'genesis_after_header', 'gmie_banner_image' );
}

/** Include the featured image */
function gmie_banner_image() {
	if ( is_home() ) {
		echo '<div id="featured-image"><img src="'. get_stylesheet_directory_uri() . '/images/sample.jpg" /></div>';
	}
	
	elseif ( is_singular( array( 'post', 'page' ) ) ) {
	$custom_image_id = genesis_get_custom_field( '_gmie_image_id' );
	if( empty( $custom_image_id ) )
		return;
		
	$custom_image = wp_get_attachment_image_src( $custom_image_id, apply_filters( 'gmie_image_size', 'full' ) );
		if ( isset( $custom_image[0] ) && !empty( $custom_image[0] ) ) {
		echo '<img class="featured-image" src="' . esc_html( $custom_image[0] ) . '" alt="' . get_the_title( $custom_image_id ) . '" />';
		}
	}
}

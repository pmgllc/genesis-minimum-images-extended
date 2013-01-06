<?php

/** Load everything */
add_action( 'genesis_meta', 'load_gmie_featured_image' );

function load_gmie_featured_image() {

	/** Remove default minimum image if it exists */
	if ( function_exists('minimum_featured_image') ) {
		remove_action( 'genesis_after_header', 'minimum_featured_image' );
	}

	/** Add the new featured & custom image sections */
	add_action( 'genesis_after_header', 'gmie_featured_image' );
	add_action( 'genesis_post_content', 'gmie_custom_image', 5 );
}

/** Include the featured image */
function gmie_featured_image() {
	if ( is_home() ) {
		echo '<div id="featured-image"><img src="'. get_stylesheet_directory_uri() . '/images/sample.jpg" /></div>';
	}
	
	elseif ( is_singular( array( 'post', 'page' ) ) ) {
		gmie_display_featured();
	}
}

/** Include the custom image on posts & pages */
function gmie_custom_image() {
	if ( is_singular( array( 'post', 'page' ) ) ) {
		gmie_display_custom();
	}
}

/** Display the featured image if it exists */
function gmie_display_featured() {
	if ( has_post_thumbnail() ) {
		echo '<div id="featured-image">' . get_the_post_thumbnail($post->ID, 'header') . '</div>';
	}
}

/** Display the custom image if it exists */
function gmie_display_custom() {
	$custom_image = genesis_get_custom_field( '_gmie_image' );
	
	if ( $custom_image ) {
		echo '<img class="custom-image alignright" src="' . esc_html( $custom_image ) . '" />';
	}

	else {
		echo the_post_thumbnail( 'gmie-custom', array('class' => 'custom-image alignright') );
	}
}

<?php

/** Add the featured image section */
remove_action( 'genesis_after_header', 'minimum_featured_image' );
add_action( 'genesis_after_header', 'gmie_featured_image' );
function gmie_featured_image() {

  if ( is_home() ) {
		echo '<div id="featured-image"><img src="'. get_stylesheet_directory_uri() . '/images/sample.jpg" /></div>';
	}
	
	elseif ( is_singular( array( 'post', 'page' ) ) ) {
	
		gmie_image();
	}
	
	elseif ( has_post_thumbnail() ) {
			echo '<div id="featured-image">';
			echo get_the_post_thumbnail($thumbnail->ID, 'header');
			echo '</div>';
		}
	}

function gmie_image() {
	$image = genesis_get_custom_field( '_gmie_image' );
	
	if ( ! $image ) {
		$image = has_post_thumbnail() ? get_the_post_thumbnail($thumbnail->ID, 'header') : '';
	}
		
	else {
		echo '<div id="featured-image"><img src="' . esc_html( $image ) . '" /></div>';
	}
}

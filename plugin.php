<?php

/*
  Plugin Name: Genesis Minimum Images Extended
  Plugin URI: http://www.petersenmediagroup.com
  Version: 0.1.0
  Author: Jesse Petersen
  Author URI: http://www.petersenmediagroup.com
  Description: Adds a custom meta box for setting a seperate image in the mimumum child theme.. Requires Genesis 1.8+
  Author: Nick_theGeek
  Author URI: http://DesignsByNicktheGeek.com
 */

/*
 * To Do:
 *      Create and setup screen shots
 */

/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
		wp_die( __( "Sorry, you are not allowed to access this page directly.", 'gmie' ) );
}

define( 'GMIE_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'GMIE_SETTINGS_FIELD', 'gmie-settings' );

register_activation_hook( __FILE__, 'gmie_activation_check' );

/**
 * Checks for minimum Genesis Theme version before allowing plugin to activate
 *
 * @author Nathan Rice
 * @uses gmie_truncate()
 * @since 0.1
 * @version 0.2
 */
function gmie_activation_check() {

	$latest = '1.8';

	$theme_info = get_theme_data( TEMPLATEPATH . '/style.css' );

	if ( basename( TEMPLATEPATH ) != 'genesis' ) {
		deactivate_plugins( plugin_basename( __FILE__ ) ); // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have installed %1$sGenesis%2$s', 'gmie' ), '<a href="http://designsbynickthegeek.com/go/genesis">', '</a>' ) );
	}

	$version = gmie_truncate( $theme_info['Version'], 3 );

	if ( version_compare( $version, $latest, '<' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) ); // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can\'t activate without %1$sGenesis %2$s%3$s or greater', 'gmie' ), '<a href="http://designsbynickthegeek.com/go/genesis">', $latest, '</a>' ) );
	}
}

/**
 *
 * Used to cutoff a string to a set length if it exceeds the specified length
 *
 * @author Nick Croft
 * @since 0.1
 * @version 0.2
 * @param string $str Any string that might need to be shortened
 * @param string $length Any whole integer
 * @return string
 */
function gmie_truncate( $str, $length=10 ) {

	if ( strlen( $str ) > $length ) {
		return substr( $str, 0, $length );
	} 

	else {
		$res = $str;
	}

	return $res;
}

add_action( 'genesis_init', 'gmie_init', 15 );

/** Loads required files when needed */
function gmie_init() {

	/** Load textdomain for translation */
	load_plugin_textdomain( 'gmie', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	
	if ( is_admin () ) {
		require_once(GMIE_PLUGIN_DIR . '/admin.php');

		if ( ! class_exists( 'cmb_Meta_Box' ) ) {
			require_once(GMIE_PLUGIN_DIR . '/classes/init.php');
		}
	}
	
	else {
		require_once(GMIE_PLUGIN_DIR . '/output.php');
	}
}

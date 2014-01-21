<?php
/*
	Plugin Name: Squared
	Demo: http://squared.ahansson.com
	Description: Squared is an interactive grid system that supports up to 15 images or icons with your custom text. It is awesome!
	Version: 2.2
	Author: Aleksander Hansson
	Author URI: http://ahansson.com
	v3: true
*/

class ah_Squared_Plugin {

	function __construct() {
		add_action( 'init', array( &$this, 'ah_updater_init' ) );
	}

	/**
	 * Load and Activate Plugin Updater Class.
	 * @since 0.1.0
	 */
	function ah_updater_init() {

		/* Load Plugin Updater */
		require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/plugin-updater.php' );

		/* Updater Config */
		$config = array(
			'base'      => plugin_basename( __FILE__ ), //required
			'repo_uri'  => 'http://shop.ahansson.com',  //required
			'repo_slug' => 'squared',  //required
		);

		/* Load Updater Class */
		new AH_Squared_Plugin_Updater( $config );
	}

}

new ah_Squared_Plugin;
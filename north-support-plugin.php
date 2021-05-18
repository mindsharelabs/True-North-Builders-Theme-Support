<?php
/*
Plugin Name: True North Theme Support Plugin
Plugin URI: https://mind.sh/are
Description: Provides a library of additional template tags, 3rd-party libraries, Gutenberg BLocks, and functions for WordPress themes and additional features for WordPress CMS websites.
Author: Mindshare Labs, Inc
Version: 1.0.0
Author: Mindshare Labs, Inc
Author URI: https://mind.sh/are
Network: false
*/

class leepPlugin {
  protected static $instance = NULL;

  public function __construct() {
    if ( !defined( 'NORTH_PLUGIN_FILE' ) ) {
    	define( 'NORTH_PLUGIN_FILE', __FILE__ );
    }
    //Define all the constants
    $this->define( 'NORTH_ABSPATH', dirname( NORTH_PLUGIN_FILE ) . '/' );
    $this->define( 'NORTH_URL', plugin_dir_url( __FILE__ ));
    $this->define( 'NORTH_PLUGIN_VERSION', '0.1.0');
    $this->define( 'NORTH_PREPEND', 'north_');
		//TODO: Change this to options
    $this->define( 'GOOGLE_MAPS_API_KEY', 'AIzaSyC0Wo2IFDzXPY18ERmsgXjKljUl1wh9Dl8');

    $this->includes();

	}
  public static function get_instance() {
    if ( null === self::$instance ) {
  		self::$instance = new self;
  	}
  	return self::$instance;
  }
  private function define( $name, $value ) {
    if ( ! defined( $name ) ) {
      define( $name, $value );
    }
  }
  private function includes() {
    include_once NORTH_ABSPATH . 'inc/utilities.php';

		//Required Plugins
		require_once 'inc/plugin-activation.class.php';
		require_once 'inc/require-plugins.php';
    //General

    include_once NORTH_ABSPATH . 'inc/blocks.php';
    include_once NORTH_ABSPATH . 'inc/scripts-and-styles.php';
    include_once NORTH_ABSPATH . 'inc/ajax.php';

  }


}//end of class


new leepPlugin();





/**
 * Deactivation hook.
 */
function north_deactivate() {

}
register_deactivation_hook( __FILE__, 'north_deactivate' );

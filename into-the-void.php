<?php
/**
 * Plugin Name: Into The Void
 * Description: A personal status update feed for WordPress.
 * Author: Jeremy Ward
 * Author URI: https://jmichaelward.com
 *
 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @since  2019-03-10
 */

$autoload = plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

if ( is_readable( $autoload ) ) {
	require_once $autoload;
}

$plugin = new \JMichaelWard\IntoTheVoid\IntoTheVoid();
$plugin->run();
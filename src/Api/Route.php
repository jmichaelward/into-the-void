<?php
/**
 * Abstract Route class.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Api;

use WebDevStudios\OopsWP\Utility\Registerable;

/**
 * Class Route
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api
 * @since   2019-03-10
 */
abstract class Route extends \WP_REST_Controller implements Registerable {
	/**
	 * Namespace for all routes.
	 *
	 * @var string
	 * @since 2019-03-10
	 */
	protected $namespace = 'the-void/v';

	/**
	 * Version of the API.
	 *
	 * @var string
	 * @since 2019-03-10
	 */
	protected $version = '1';

	/**
	 * Get the namespaced version of this route.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return string
	 */
	protected function get_namespaced_version() {
		return $this->namespace . $this->version;
	}

	/**
	 * Register this route.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	public function register() {
		$this->register_routes();
	}
}

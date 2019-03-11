<?php
/**
 * This class is responsible for registering the plugin's API service.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Api;

use JMichaelWard\IntoTheVoid\Api\Route\Shout;
use WebDevStudios\OopsWP\Structure\Service;

/**
 * Class RouteRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api
 * @since   2019-03-10
 */
class RouteRegistrar extends Service {
	/**
	 * API route classes.
	 *
	 * @var array
	 * @since 2019-03-10
	 */
	private $routes = [
		Shout::class,
	];

	/**
	 * Register this service with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Register the API routes provided by this service.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	public function register_routes() {
		foreach ( $this->routes as $route_class ) {
			$this->register_route( new $route_class() );
		}
	}

	/**
	 * Register a standalone route.
	 *
	 * @param Route $route Concrete instance of a Route object.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	private function register_route( Route $route ) {
		$route->register();
	}
}

<?php
/**
 * The main plugin class.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid;

use JMichaelWard\IntoTheVoid\Api\RouteRegistrar;
use JMichaelWard\IntoTheVoid\Content\ContentRegistrar;
use WebDevStudios\OopsWP\Structure\ServiceRegistrar;

/**
 * Class IntoTheVoid
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid
 * @since   2019-03-10
 */
class IntoTheVoid extends ServiceRegistrar {
	/**
	 * This plugin's services.
	 *
	 * @var array
	 * @since 2019-03-10
	 */
	protected $services = [
		ContentRegistrar::class,
		RouteRegistrar::class,
	];
}
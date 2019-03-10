<?php
/**
 * The main plugin class.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid;

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
	protected $services = [
		ContentRegistrar::class,
	];
}
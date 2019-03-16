<?php
/**
 * Content registration service.
 *
 * This class handles registration of WordPress content objects.
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Content
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Content;

use WebDevStudios\OopsWP\Structure\Content\ContentType;
use WebDevStudios\OopsWP\Structure\Service;

/**
 * Class ContentRegistrar
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Content
 * @since   2019-03-10
 */
class ContentRegistrar extends Service {
	/**
	 * Content types to register with WordPress.
	 *
	 * @var array
	 * @since 2019-03-16
	 */
	protected $content_types = [
		Shout::class,
	];

	/**
	 * Register service hooks with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-16
	 */
	public function register_hooks() {
		add_action( 'init', [ $this, 'register_content_types' ] );
	}

	/**
	 * Register content types with WordPress.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-16
	 */
	public function register_content_types() {
		foreach ( $this->content_types as $content_type_class ) {
			$this->register_content_type( new $content_type_class() );
		}
	}

	/**
	 * Register a ContentType object with WordPress.
	 *
	 * @param ContentType $content_type Instantiated ContentType.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 */
	private function register_content_type( ContentType $content_type ) {
		$content_type->register();
	}
}

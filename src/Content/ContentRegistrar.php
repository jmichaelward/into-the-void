<?php
/**
 *
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
	protected $content_types = [
		Shout::class,
	];

	public function register_hooks() {
		add_action( 'init', [ $this, 'register_content_types' ] );
	}

	public function register_content_types() {
		foreach( $this->content_types as $content_type_class ) {
			$this->register_content_type( new $content_type_class() );
		}
	}

	/**
	 * @param ContentType $content_type
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	private function register_content_type( ContentType $content_type ) {
		$content_type->register();
	}
}

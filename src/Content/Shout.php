<?php
/**
 * Register the void-shout post type.
 *
 * @author  Jeremy Ward <jeremy@jmichaelward.com>
 * @package JMichaelWard\IntoTheVoid\Content
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Content;

use WebDevStudios\OopsWP\Structure\Content\PostType;
use JMichaelWard\IntoTheVoid\Api\Route\Shout as ShoutRoute;

/**
 * Class Update
 *
 * @author  Jeremy Ward <jeremy@jmichaelward.com>
 * @package JMichaelWard\IntoTheVoid\Shout
 * @since   2019-03-10
 */
class Shout extends PostType {
	/**
	 * Post type slug.
	 *
	 * @var string
	 * @since 2019-03-10
	 */
	protected $slug = 'void-shout';

	/**
	 * Get arguments for this post type.
	 *
	 * @author Jeremy Ward <jeremy@jmichaelward.com>
	 * @since  2019-03-10
	 * @return array
	 */
	protected function get_args(): array {
		return [
			'public'                => false,
			'supports'              => [ 'editor', 'author' ],
			'show_ui'               => false,
			'show_in_rest'          => false,
			'exclude_from_search'   => true,
			'delete_with_user'      => true,
			'rest_base'             => 'shout',
			'rest_controller_class' => ShoutRoute::class,
		];
	}

	/**
	 * @author Jeremy Ward <jeremy@jmichaelward.com>
	 * @since  2019-03-10
	 * @return array
	 */
	protected function get_labels(): array {
		return [
			'name'               => _x( 'Shouts', 'post type general name', 'into-the-void' ),
			'singular_name'      => _x( 'Shout', 'post type singular name', 'into-the-void' ),
			'menu_name'          => _x( 'Shouts', 'admin menu', 'into-the-void' ),
			'name_admin_bar'     => _x( 'Shout', 'add new on admin bar', 'into-the-void' ),
			'add_new'            => _x( 'Add New', 'void update', 'into-the-void' ),
			'add_new_item'       => __( 'Add New Shout', 'into-the-void' ),
			'new_item'           => __( 'New Shout', 'into-the-void' ),
			'edit_item'          => __( 'Edit Shout', 'into-the-void' ),
			'view_item'          => __( 'View Shout', 'into-the-void' ),
			'all_items'          => __( 'All Shouts', 'into-the-void' ),
			'search_items'       => __( 'Search Shouts', 'into-the-void' ),
			'parent_item_colon'  => __( 'Parent Shouts:', 'into-the-void' ),
			'not_found'          => __( 'No shouts found.', 'into-the-void' ),
			'not_found_in_trash' => __( 'No shouts found in Trash.', 'into-the-void' ),
		];
	}
}

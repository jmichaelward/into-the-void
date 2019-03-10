<?php
/**
 *
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Update
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Content;

use WebDevStudios\OopsWP\Structure\Content\PostType;

/**
 * Class Update
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Update
 * @since   2019-03-10
 */
class Update extends PostType {
	/**
	 * Post type slug.
	 *
	 * @var string
	 * @since 2019-03-10
	 */
	protected $slug = 'void-updates';

	/**
	 * Get arguments for this post type.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return array
	 */
	protected function get_args(): array {
		return [
			'public'       => false,
			'supports'     => [ 'editor' ],
			'show_ui'      => false,
			'show_in_rest' => false,
		];
	}

	/**
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return array
	 */
	protected function get_labels(): array {
		return [
			'name'               => _x( 'Void Updates', 'post type general name', 'into-the-void' ),
			'singular_name'      => _x( 'Void Update', 'post type singular name', 'into-the-void' ),
			'menu_name'          => _x( 'Void Updates', 'admin menu', 'into-the-void' ),
			'name_admin_bar'     => _x( 'Void Update', 'add new on admin bar', 'into-the-void' ),
			'add_new'            => _x( 'Add New', 'void update', 'into-the-void' ),
			'add_new_item'       => __( 'Add New Void Update', 'into-the-void' ),
			'new_item'           => __( 'New Void Update', 'into-the-void' ),
			'edit_item'          => __( 'Edit Void Update', 'into-the-void' ),
			'view_item'          => __( 'View Void Update', 'into-the-void' ),
			'all_items'          => __( 'All Void Updates', 'into-the-void' ),
			'search_items'       => __( 'Search Void Updates', 'into-the-void' ),
			'parent_item_colon'  => __( 'Parent Void Updates:', 'into-the-void' ),
			'not_found'          => __( 'No void updates found.', 'into-the-void' ),
			'not_found_in_trash' => __( 'No void updates found in Trash.', 'into-the-void' ),
		];
	}
}

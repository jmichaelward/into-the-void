<?php
/**
 *
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api\Route
 * @since   2019-03-10
 */

namespace JMichaelWard\IntoTheVoid\Api\Route;

use JMichaelWard\IntoTheVoid\Api\Route;
use WP_REST_Server;

/**
 * Class Void
 *
 * @author  Jeremy Ward <jeremy.ward@webdevstudios.com>
 * @package JMichaelWard\IntoTheVoid\Api\Route
 * @since   2019-03-10
 */
class Shout extends Route {
	/**
	 * The shout endpoint.
	 *
	 * @var string
	 * @since 2019-03-10
	 */
	protected $rest_base = 'shout';

	/**
	 * Register endpoints for this route.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return void
	 */
	public function register_routes() {
		register_rest_route(
			$this->get_namespaced_version(),
			$this->rest_base,
			[
				[
					'methods'  => WP_REST_Server::READABLE,
					'callback' => [ $this, 'get_items' ],
				],
				[
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => [ $this, 'create_item' ],
					'permission_callback' => [ $this, 'create_item_permissions_check' ],
					'args'                => [
						'token'   => [
							'type'                => 'string',
							'validation_callback' => 'sanitize_title',
						],
						'content' => [
							'required'            => true,
							'validation_callback' => [ $this, 'validate_content' ],
						],
					],
				],
			]
		);
	}

	/**
	 * Create a shout.
	 *
	 * @param \WP_REST_Request $request The WordPress request object.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return \WP_Error|\WP_REST_Response
	 */
	public function create_item( $request ) {
		$id = wp_insert_post( [
			'post_type'    => 'void-shout',
			'post_content' => $request->get_param( 'content' ),
			'post_status'  => 'publish',
		] );

		if ( $id ) {
			return new \WP_REST_Response( 'Shout created.' );
		}

		return new \WP_Error( 'Could not create shout. Try again later.' );
	}

	/**
	 * @param \WP_REST_Request $request
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return bool|\WP_Error
	 */
	public function create_item_permissions_check( $request ) {
		return true;
	}

	/**
	 * @param \WP_REST_Request $request
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return \WP_Error|\WP_REST_Response
	 */
	public function get_items( $request ) {
		$query = new \WP_Query( [
			'post_type' => 'void-shout',
		] );

		if ( ! $query->have_posts() ) {
			return new \WP_REST_Response( 'No shouts found.', 200 );
		}

		return array_map( [ $this, 'format_post_for_response' ], $query->get_posts() );
	}

	/**
	 * Format a WP_Post into the structure we want to return with the request.
	 *
	 * @param \WP_Post $post A WordPress post object.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return array
	 */
	private function format_post_for_response( \WP_Post $post ) : array {
		return [
			'id'     => $post->ID, // @TODO Perhaps implement UUID instead of giving directly WordPress post IDs.
			'date'   => $post->post_date_gmt,
			'status' => $post->post_content,
		];
	}

	/**
	 * Determine whether submitted content is valid.
	 *
	 * @param string $content The content submitted via the API.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return bool
	 */
	public function validate_content( string $content ) {
		return ! empty( $content );
	}

	/**
	 * Strip content of all markup.
	 *
	 * @param string $content The submitted content.
	 *
	 * @author Jeremy Ward <jeremy.ward@webdevstudios.com>
	 * @since  2019-03-10
	 * @return mixed
	 */
	public function sanitize_content( string $content ) : string {
		return filter_var( $content, FILTER_SANITIZE_STRING );
	}
}

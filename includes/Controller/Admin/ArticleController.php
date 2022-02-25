<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Controller
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace CTP\Controller\Admin;

/**
 * ArticleController
 */
class ArticleController {

	/**
	 * The __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'ctp_before_article_list', array( $this, 'store' ), 10, 1 );
	}

	/**
	 * Store
	 *
	 * @return void
	 */
	public function store() {
		$nonce = ( isset( $_GET['_wpnonce'] ) ) ? sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $nonce, 'ctp-57-nonce' ) && isset( $_POST['article_id'] ) ) {
			$size = count( $_POST['article_id'] );
			for ( $i = 0; $i < $size; $i++ ) {
				if ( isset( $_POST['article_price'][ $i ] ) && ( '' !== $_POST['article_price'][ $i ] ) ) {
					$aticle_id           = ( isset( $_POST['article_id'][ $i ] ) ) ? sanitize_key( $_POST['article_id'][ $i ] ) : '';
					$article_name        = ( isset( $_POST['article_name'][ $i ] ) ) ? sanitize_key( $_POST['article_name'][ $i ] ) : '';
					$article_description = ( isset( $_POST['article_description'][ $i ] ) ) ? sanitize_key( $_POST['article_description'][ $i ] ) : '';
					$article_price       = ( isset( $_POST['article_price'][ $i ] ) ) ? sanitize_key( $_POST['article_price'][ $i ] ) : '';

					$this->create_product( $aticle_id, $article_name, $article_description, $article_price );
				}
			}
		}
	}

	/**
	 * Create_product
	 *
	 * @param  mixed $post_article_id
	 * @param  mixed $name
	 * @param  mixed $description
	 * @param  mixed $price
	 * @return void
	 */
	private function create_product( $post_article_id, $name, $description, $price ) {
		if ( get_post_meta( $post_article_id, '_article_product_id', true ) ) {
			$post_id = get_post_meta( $post_article_id, '_article_product_id', true );
		} else {
			$post_id = wp_insert_post(
				array(
					'post_title'  => $name,
					'post_type'   => 'product',
					'post_status' => 'publish',
				)
			);
		}
		$product = wc_get_product( $post_id );
		$product->set_name( $name );
		$product->set_status( 'publish' );
		$product->set_catalog_visibility( 'visible' );
		$product->set_price( $price );
		$product->set_regular_price( $price );
		$product->set_description( $description );
		$product->save();
		update_post_meta( $post_article_id, '_article_product_price', $price );
		update_post_meta( $post_article_id, '_article_product_id', $post_id );
		update_post_meta( $post_id, '_product_article_id', $post_article_id );
	}
}

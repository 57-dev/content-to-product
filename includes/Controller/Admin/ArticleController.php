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
		add_action( 'ctp_before_article_list', array( $this, 'store' ) );
		add_filter( 'woocommerce_checkout_fields', array( $this, 'remove_somw_checkout_fields' ) );
		add_action( 'wp_loaded', array( $this, 'checking' ) );
		add_action( 'woocommerce_thankyou', array( $this, 'thank_you_page_action' ) );
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

					if( is_numeric( $_POST['article_price'][ $i ] )  ){

						$aticle_id           = ( isset( $_POST['article_id'][ $i ] ) ) ? sanitize_text_field( $_POST['article_id'][ $i ] ) : '';
						$article_name        = ( isset( $_POST['article_name'][ $i ] ) ) ? sanitize_text_field( $_POST['article_name'][ $i ] ) : '';
						$article_description = ( isset( $_POST['article_description'][ $i ] ) ) ? sanitize_text_field( $_POST['article_description'][ $i ] ) : '';
						$article_price       = ( isset( $_POST['article_price'][ $i ] ) ) ? sanitize_text_field( $_POST['article_price'][ $i ] ) : '';
	
						$this->create_product( $aticle_id, $article_name, $article_description, $article_price );
	
						$_SESSION['success'] = 'Saved with success!';

					}else{
					
						$_SESSION['error'] = "Invalid price in the list.";
	
						break;
					
					}

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




	/**
	 * Checking
	 *
	 * @return void
	 */
	public function checking() {
		$nonce = ( isset( $_GET['_wpnonce'] ) ) ? sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $nonce, 'ctp-57-nonce' ) && isset( $_POST['email_access'] ) ) {

			if( !is_email( $_POST['email_access'] ) ){
				$_SESSION['email_access_error'] = "Invalid address.";
			}else{
				$email                          = ( isset( $_POST['email_access'] ) ) ? sanitize_email( wp_unslash( $_POST['email_access'] ) ) : '';
				$_SESSION['email_access']       = $email;
				$_SESSION['email_access_error'] = "Sorry! this address don't have access to this article. ";
			}

		}
		$uri      = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : array();
		$link     = isset( $_SERVER['REQUEST_URI'] ) ? explode( '/', $uri ) : array();
		$size     = count( $link );
		$the_slug = '' === $link[ $size - 1 ] ? $link[ $size - 2 ] : $link[ $size - 1 ];
		if ( '' !== $the_slug ) {
			$args     = array(
				'name'        => $the_slug,
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => 1,
			);
			$my_posts = get_posts( $args );

			if ( $my_posts && '' !== get_post_meta( $my_posts[0]->ID, '_article_product_price', true ) && get_post_meta( $my_posts[0]->ID, '_article_product_price', true ) > 0 ) :
				$product_id = get_post_meta( $my_posts[0]->ID, '_article_product_id', true );
				$this->add_to_checkout( $product_id );
				update_post_meta( $product_id, '_product_article_id', $my_posts[0]->ID );
				update_post_meta( $product_id, '_product_article_url', get_permalink( $my_posts[0]->ID ) );
				if ( ! isset( $_SESSION['email_access'] ) || '' === $_SESSION['email_access'] || '' === get_post_meta( $product_id, $_SESSION['email_access'], true ) ) {
					include CTP_PLUGIN_TEMPLATE_DIR . '/visitor/modal.php';
					die;
				}
			endif;
		}
	}


	/**
	 * Add_to_checkout
	 *
	 * @param  mixed $product_id
	 * @return void
	 */
	private function add_to_checkout( $product_id ) {
		$cart = WC()->cart;
		$cart->empty_cart();
		$cart->add_to_cart( $product_id );
	}



	/**
	 * Remove_somw_checkout_fields
	 *
	 * @param  mixed $fields
	 * @return array
	 */
	public function remove_somw_checkout_fields( $fields ) {
		$fields['billing']['billing_first_name'] = isset( $_SESSION['email_access'] ) ? sanitize_email( $_SESSION['email_access'] ) : '';
		unset( $fields['billing']['billing_company'] );
		unset( $fields['billing']['name'] );
		unset( $fields['billing']['billing_postcode'] );
		unset( $fields['billing']['billing_phone'] );
		unset( $fields['billing']['billing_state'] );
		unset( $fields['billing']['billing_city'] );
		unset( $fields['billing']['billing_address_2'] );
		unset( $fields['billing']['billing_address_1'] );
		unset( $fields['billing']['billing_country'] );
		unset( $fields['billing']['billing_last_name'] );
		unset( $fields['billing']['billing_first_name'] );

		return $fields;
	}

	/**
	 * Thank_you_page_action
	 *
	 * @param  mixed $order_id
	 * @return void
	 */
	public function thank_you_page_action( $order_id ) {
		$order                    = ( wc_get_order( $order_id ) );
		$order_data               = $order->get_data();
		$_SESSION['email_access'] = $order_data['billing']['email'];
		if( isset( $_SESSION['email_access'] ) && is_email($_SESSION['email_access'] ) ){
			include CTP_DIR . '/templates/visitor/thankyou.php';
		}
	}

}

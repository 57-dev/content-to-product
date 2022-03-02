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
 * MessageController
 */
class MessageController {

	/**
	 * The __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'ctp_before_help_form', array( $this, 'send' ) );
	}

	/**
	 * Send
	 *
	 * @return void
	 */
	public function send() {
		$nonce = ( isset( $_GET['_wpnonce'] ) ) ? sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $nonce, 'ctp-57-nonce' ) && isset( $_POST['email'] ) && isset( $_POST['message'] ) ) {

			if(!is_email($_POST['email'])){
				$_SESSION['error'] = "Invalid address.";
			}else{
				$email   = ( isset( $_POST['email'] ) ) ? sanitize_email( $_POST['email'] ) : '';
				$message = ( isset( $_POST['message'] ) ) ? sanitize_textarea_field( $_POST['message'] ) : '';
				ctp_mail( $email, $message );
				$_SESSION['success'] = 'Thank you for your message ' . $email;
			}
		}
	}

}

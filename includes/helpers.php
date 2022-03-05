<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   none
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

/**
 * Ctp_mail
 *
 * @param  mixed $email
 * @param  mixed $message
 * @return void
 */
function ctp_mail( $email, $message ) {
	$to      = 'support@57-house.org';
	$subject = 'Content to product support for : ' . $email;
	$body    = 'Message : ' . $message;
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	wp_mail( $to, $subject, $body, $headers );
}
/**
 * Alert
 *
 * @since 3.0.0
 *
 * @return string
 */
function ctp_alert() : string {
	$alert = '';

	if ( isset( $_SESSION['success'] ) ) {
		
		$alert = '<div class="alert alert-success rounded-0">' . sanitize_text_field( $_SESSION['success'] ) . '</div>';

		unset( $_SESSION['success'] );

	}elseif ( isset( $_SESSION['error'] ) ) {
		
		$alert = '<div class="alert alert-danger rounded-0">' . sanitize_text_field( $_SESSION['error'] ) . '</div>';

		unset( $_SESSION['error'] );
	}

	return apply_filters( 'ctp_alert', $alert );
}


/**
 * Ctp_allow_html
 *
 * @return array
 */
function ctp_allow_html() {
	return array(
		'div' => array(
			'class' => array(),
		),
	);
}

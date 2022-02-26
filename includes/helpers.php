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
 * Alert
 *
 * @since 3.0.0
 *
 * @return string
 */
function ctp_alert() : string {
	$alert = '';

	if ( isset( $_SESSION['success'] ) ) {
		$alert = '<div class="alert alert-success rounded-0">' . $_SESSION['success'] . '</div>';

		unset( $_SESSION['success'] );
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

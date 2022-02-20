<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Api
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace CTP\Api\Callbacks;

/**
 * MenuCallbacks
 */
class MenuCallbacks {

	/**
	 * The Load Dashboard Template function
	 *
	 * @since 1.0
	 * @since 3.0.0 Moved to Menu class
	 *
	 * @return void
	 */
	public function dashboard() {
		include CTP_DIR . '/templates/admin/body.php';
	}
	/**
	 * The ctp_general_options_group function
	 *
	 * @param  mixed $input
	 */
	public function ctp_general_options_group( $input ) {
		return $input;
	}

}

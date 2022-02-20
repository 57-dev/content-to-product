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
 * SettingCallbacks
 */
class SettingCallbacks {

	/**
	 * The ctp_options_group function
	 *
	 * @param  mixed $input
	 */
	public function ctp_options_group( $input ) {
		return $input;
	}

	/**
	 * The ctp_header_section function
	 *
	 * @return string
	 */
	public function ctp_header_section() :string {
		return '<div class="content__title">
				<span class="color-primary"><i class="fa fa-cog"></i> Currency settings Option</span>
			</div>
			<div class="divider"></div>';
	}

}

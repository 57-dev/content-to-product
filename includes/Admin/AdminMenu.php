<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Admin
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace CTP\Admin;

use CTP\Admin\Callbacks\AdminMenuCallback;
use CTP\Api\Menu;

/**
 * AdminMenu
 */
class AdminMenu extends Menu {

	/**
	 * Pages
	 *
	 * @var array
	 */
	protected $pages = array(
		array(
			'page_title' => 'CTP',
			'menu_title' => 'CTP',
			'menu_slug'  => 'ctp',
			'callback'   => 'dashboard',
		),
	);

	/**
	 * Sub_pages
	 *
	 * @var array
	 */
	protected $sub_pages = array(

		array(
			'parent_slug' => 'ctp',
			'page_title'  => 'CTP Dashboard',
			'menu_title'  => 'Dashboard',
			'menu_slug'   => 'ctp-dashboard',
			'callback'    => 'dashboard',
		),

	);

	/**
	 * Get_callback_class
	 *
	 * @return AdminMenuCallback
	 */
	public function get_callback_class() {
		return new AdminMenuCallback();
	}
}

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

namespace CTP\Api;

use CTP\Api\Callbacks\MenuCallbacks;

/**
 * Menu
 */
class Menu {

	/**
	 * Class constructor
	 *
	 * @since 3.0.0
	 *
	 * @return void
	 */

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
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ctp_add_admin_menu' ) );
	}

	/**
	 * The ctp_add_admin_menu function
	 *
	 * @return void
	 */
	public function ctp_add_admin_menu() {
		foreach ( $this->pages as $page ) {
			add_menu_page( $page['page_title'], $page['menu_title'], $this->get_capability(), $page['menu_slug'], array( $this->get_callback_class(), $page['callback'] ), $this->get_icon_url(), $this->get_position() );
		}

		foreach ( $this->sub_pages as $page ) {
			add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $this->get_capability(), $page['menu_slug'], array( $this->get_callback_class(), $page['callback'] ) );
		}

		remove_submenu_page( $this->pages[0]['menu_slug'], $this->pages[0]['menu_slug'] );
	}

	/**
	 * Get the value of callback_class
	 *
	 * @return MenuCallbacks
	 */
	public function get_callback_class() {
		return new MenuCallbacks();
	}

	/**
	 * Get the value of capability
	 */
	public function get_capability() {
		return apply_filters( 'ctp_menu_capability', 'manage_options' );
	}

	/**
	 * Get the value of icon_url
	 */
	public function get_icon_url() {
		return '';
	}

	/**
	 * Get the value of position
	 */
	public function get_position() {
		return apply_filters( 'ctp_menu_position', '5' );
	}
}

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

use CTP\Api\Callbacks\SettingCallbacks;

/**
 * Settings
 */
class Settings {

	/**
	 * Settings_fields
	 *
	 * @var mixed
	 */
	protected $settings_fields;

	/**
	 * Option_group
	 *
	 * @var mixed
	 */
	protected $option_group;

	/**
	 * Option_name
	 *
	 * @var mixed
	 */
	protected $option_name;

	/**
	 * Option_callback
	 *
	 * @var mixed
	 */
	protected $option_callback;

	/**
	 * Page
	 *
	 * @var mixed
	 */
	protected $page;

	/**
	 * Section_id
	 *
	 * @var mixed
	 */
	protected $section_id;

	/**
	 * Section_title
	 *
	 * @var string
	 */
	protected $section_title = '';

	/**
	 * Section_callback
	 *
	 * @var mixed
	 */
	protected $section_callback;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings_fields' ) );
	}

	/**
	 * Register_settings_fields
	 *
	 * @return void
	 */
	public function register_settings_fields() {
		register_setting( $this->option_group, $this->option_name, ( isset( $this->option_callback ) ? array( $this->get_callback_class(), $this->option_callback ) : '' ) );

		// add settings section.
		add_settings_section( $this->section_id, $this->section_title, ( isset( $this->section_callback ) ? array( $this->get_callback_class(), $this->section_callback ) : '' ), $this->page );

		// add settings field.
		foreach ( $this->settings_fields as $field ) {
			add_settings_field( $field['id'], '', ( isset( $field['callback'] ) ? array( $this->get_callback_class(), $field['callback'] ) : '' ), $this->page, $this->section_id, ( isset( $field['args'] ) ? $field['args'] : '' ) );
		}
	}

	/**
	 * Get_callback_class
	 *
	 * @return SettingCallbacks
	 */
	public function get_callback_class(): SettingCallbacks {
		return new SettingCallbacks();
	}

}

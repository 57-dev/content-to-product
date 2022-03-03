<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Base
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace CTP\Base;

/**
 * Enqueue
 *
 * This class manage script injections
 */
class Enqueue {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_script' ) );
		}
	}

	/**
	 * RnqueueAdminScript
	 *
	 * @return void
	 *
	 * This method will content all scripts and styles injection in admin dashboard
	 *
	 * Injection style code exemple : wp_enqueue_style('nameOfTheLink', 'url link with http or https' )
	 *
	 * Injection style code exemple : wp_enqueue_script('nameOfTheScript', 'url script with http or https' )
	 */
	public function enqueue_admin_script() {
		// enqueue all our scripts.
		wp_enqueue_style( 'mypluginstyle', CTP_PLUGIN_ASSETS . '/css/style.css', array(), '1.1.0', false );

		wp_enqueue_script( 'mypluginscript', CTP_PLUGIN_ASSETS . '/js/script.js', array(), '1.0.1', false );

		wp_enqueue_style( 'faicon', CTP_PLUGIN_ASSETS . '/font-awesome/css/all.min.css', array(), '1.0.9', false );

		wp_enqueue_style( 'bootstrapstyle', CTP_PLUGIN_ASSETS . '/css/bootstrap.min.css', array(), '1.0.2', false );
	}

}

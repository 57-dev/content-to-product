<?php
/**
 * Plugin Name: Content To Product
 * Plugin URI: http://57-house.org/public/datamboa
 * Description: CTP(Content To Product) is a woocommerce plugin that allows owners of websites designed with the WordPress cms to sell the articles they publish.
 * Version: 1.0.0
 * Author: 57-house
 * Author URI: http://57-house.org
 * Copyright (c) 2021 Gajelabs (njiegnamnjuhdonald@gmail.com: your email). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * your website
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 *
 * @package CTP
 */

/** Checking if we are in WordPress */
defined( 'ABSPATH' ) || die;

/** Check if woocommerce is installed */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'ctp_active_plugins', get_option( 'active_plugins' ) ), true ) ) {
	return;
}
/**Add lines to check another plugin existance here! */

/**
 * CTP class
 *
 * @class ctp The class that holds the entire ctp plugin
 */
final class CTP {


	/**
	 * Plugin version
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Instance of self
	 *
	 * @var ctp
	 */
	private static $instance = null;

	/**
	 * __construct
	 *
	 * @return void
	 */
	private function __construct() {
		require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

		$this->define_constants();

		add_action( 'woocommerce_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes the ctp() class
	 *
	 * Checks for an existing ctp() instance
	 * and if it doesn't find one, creates it.
	 */
	public static function init() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Define all constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'CTP_PLUGIN_ASSETS', plugins_url( 'assets', __FILE__ ) );
		define( 'CTP_PLUGIN_TEMPLATE_DIR', __DIR__ . '/templates' );
		define( 'CTP_PLUGIN_INCLUDES', __DIR__ . '/includes' );

		define( 'CTP_PLUGIN_VERSION', $this->version );
		define( 'CTP_FILE', __FILE__ );
		define( 'CTP_DIR', __DIR__ );

		// give a way to turn off loading styles and scripts from parent theme.
		define( 'CTP_LOAD_STYLE', true );
		define( 'CTP_LOAD_SCRIPTS', true );
	}

	/**
	 * Load the plugin after WP User Frontend is loaded
	 *
	 * @return void
	 */
	public function init_plugin() {
		$this->init_hooks();

		/**Api to get if your plugin is loaded */
		do_action( 'ctp_plugin_name_loaded' );
	}

	/**
	 * Initialize the actions
	 *
	 * @return void
	 */
	public function init_hooks() {
		// initialize the classes.
		add_action( 'init', array( $this, 'init_classes' ), 4 );
	}

	/**
	 * Init all the classes
	 *
	 * @return void
	 */
	public function init_classes() {
		new CTP\Base\Enqueue();
		new CTP\Controller\Admin\ArticleController();
		new CTP\Controller\Admin\MessageController();
		if ( is_admin() ) {
			new \CTP\Admin\AdminMenu();
		}
	}
}

/**
 * Load CTP Plugin when all plugins loaded
 *
 * @return CTP
 */
function ctp_plugin_name() {
	if ( ! isset( $_SESSION ) ) {
		session_start();
	}
	return CTP::init();
}

// Lets Go....
ctp_plugin_name();

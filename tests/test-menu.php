<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminMenu;
use Scd\Admin\Callbacks\AdminMenuCallback;
use Scd\Api\Menu;
use Scd\Api\Callbacks\MenuCallbacks;

/**
 * Sample test case.
 */
class MenuTest extends WP_UnitTestCase
{

	/**
	 * A single example test.
	 */
	public function test_menu_api_model()
	{

		$menu = new Menu();

		$this->assertIsObject($menu);

		$this->assertEmpty($menu->scd_add_admin_menu());

		$this->assertIsObject($menu->get_callback_class());

		$this->assertIsString($menu->get_capability());

		$this->assertStringContainsString('svg', $menu->get_icon_url());

		$this->assertIsString($menu->get_position());
	}


	/**
	 * A single example test.
	 */
	public function test_menu_api_callback()
	{
		$menu = new MenuCallbacks();

		$this->assertIsObject($menu);

		$this->assertEquals('testing', $menu->scd_general_options_group('testing'));
	}



	/**
	 * A single example test.
	 */
	public function test_admi_menu_api_model()
	{
		$admin_menu = new AdminMenu();

		$admin_menu_callback = new AdminMenuCallback();

		$this->assertIsObject($admin_menu);

		$this->assertIsObject($admin_menu->get_callback_class());

		$this->assertEquals($admin_menu_callback, $admin_menu->get_callback_class());
	}
}

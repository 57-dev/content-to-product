<?php
/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Api\Menu;
/**
 * Sample test case.
 */
class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {
		$menu = new Menu();
        $this->assertIsObject($menu);
	}
}

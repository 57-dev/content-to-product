<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminCurrencySettings;
use Scd\Admin\AdminGeneralSettings;
use Scd\Admin\AdminMenu;
use Scd\Admin\AdminSubscriptionSettings;
use Scd\Admin\Callbacks\AdminCurrencySettingCallbacks;
use Scd\Admin\Callbacks\AdminGeneralSettingCallbacks;
use Scd\Admin\Callbacks\AdminMenuCallback;
use Scd\Admin\Callbacks\AdminSubscriptionSettingCallbacks;
use Scd\Api\Menu;
use Scd\Api\Callbacks\MenuCallbacks;
use Scd\Api\Callbacks\SettingCallbacks;
use Scd\Api\Settings;

/**
 * Sample test case.
 */
class SettingsTest extends WP_UnitTestCase
{

    /**
     * A single example test.
     */
    public function test_setting_api_model()
    {
        $setting_model = new Settings();

        $setting_callbacks = new SettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals($setting_callbacks, $setting_model->get_callback_class());
    }

    /**
     * A single example test.
     */
    public function test_general_setting_model()
    {
        $setting_model = new AdminGeneralSettings();

        $setting_callbacks = new AdminGeneralSettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals($setting_callbacks, $setting_model->get_callback_class());
    }



    /**
     * A single example test.
     */
    public function test_suscription_setting_model()
    {
        $setting_model = new AdminSubscriptionSettings();

        $setting_callbacks = new AdminSubscriptionSettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals($setting_callbacks, $setting_model->get_callback_class());
    }



    /**
     * A single example test.
     */
    public function test_setting_api_callbacks()
    {
        $setting_model = new SettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

        $this->assertStringContainsString('content__title', $setting_model->scd_header_section());
    }

}

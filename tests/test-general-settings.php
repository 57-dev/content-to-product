<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminGeneralSettings;
use Scd\Admin\Callbacks\AdminGeneralSettingCallbacks;

/**
 * Sample test case.
 */
class GeneralSettingsTest extends WP_UnitTestCase
{

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
    public function test_general_setting_callbacks()
    {
        $setting_model = new AdminGeneralSettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

    }
    
}

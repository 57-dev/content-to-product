<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminSubscriptionSettings;
use Scd\Admin\Callbacks\AdminSubscriptionSettingCallbacks;

/**
 * Sample test case.
 */
class SubscriptionSettingsTest extends WP_UnitTestCase
{

    /**
     * A single example test.
     */
    public function test_subscription_setting_model()
    {
        $setting_model = new AdminSubscriptionSettings();

        $setting_callbacks = new AdminSubscriptionSettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals($setting_callbacks, $setting_model->get_callback_class());
    }



    /**
     * A single example test.
     */
    public function test_subscription_setting_callbacks()
    {
        $setting_model = new AdminSubscriptionSettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

    }
    
}

<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminCurrencySettings;
use Scd\Admin\Callbacks\AdminCurrencySettingCallbacks;

/**
 * Sample test case.
 */
class CurrencySettingsTest extends WP_UnitTestCase
{

    /**
     * A single example test.
     */
    public function test_currency_setting_model()
    {
        $setting_model = new AdminCurrencySettings();

        $setting_callbacks = new AdminCurrencySettingCallbacks();

        $this->assertIsObject($setting_model);

        $this->assertEquals($setting_callbacks, $setting_model->get_callback_class());
    }



    /**
     * A single example test.
     */
    public function test_currency_setting_callbacks()
    {
        $setting_model = new AdminCurrencySettingCallbacks();

        $this->assertIsObject($setting_model);

        $args = array(
            'option_name'    => 'currency_options',
            'label_for'      => 'select_currency_based_on_user_location',
            'label_for_name' => 'Select currency based on user location',
        );

        $this->assertEquals('testing', $setting_model->scd_options_group('testing'));

    }

}

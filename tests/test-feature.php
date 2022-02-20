<?php

/**
 * Class SampleTest
 *
 * @package Gajeplugin
 */

use Scd\Admin\AdminCurrencySettings;
use Scd\Admin\Callbacks\AdminCurrencySettingCallbacks;
use Scd\Api\Features\Conversion;

/**
 * Sample test case.
 */
class ConversionTest extends WP_UnitTestCase
{

    /**
     * A single example test.
     */
    public function test_currency_setting_model()
    {

        $setting_model = new Conversion('EUR');

        $this->assertIsObject($setting_model);

        $this->assertIsString('options',$setting_model->filter_woocommerce_currency('options'));

        $this->assertEquals('$', $setting_model->filter_woocommerce_currency_symbol('$', 'USD' ));

        $this->assertEquals('1&%3%4', $setting_model->filter_woocommerce_price_format('1&%3%4' ));

        $this->assertEquals('4', $setting_model->filter_wc_get_price_decimals('4' ));

        $this->assertEquals('4', $setting_model->custom_dynamic_regular_price('4', '1' ));

        $this->assertEquals('4', $setting_model->custom_dynamic_sale_price('4', '1' ));

        $this->assertEquals('4', $setting_model->custom_dynamic_sale_price('4', '1' ));

        // $this->assertIsString($setting_model->filter_woocommerce_update_order_review_fragments('4', '1', '5' ));

    }
}

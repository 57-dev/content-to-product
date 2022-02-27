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
 * HtmlComponents
 */
class HtmlComponents {

	/**
	 * Title_block
	 *
	 * @param  string $title
	 * @param  string $icon
	 */
	public static function title_block( string $title, string $icon = null ) {
		echo '<div class="content__title">
                <span class="ctp-color-primary"><i class="fa fa-bars"></i> ' . esc_html( $title ) . '</span>
            </div>
            <div class="ctp-divider"></div>';
	}

	/**
	 * Checkbox
	 *
	 * @param  array $arg
	 */
	public static function checkbox( array $arg ) {
		echo '<div class="content__body  ' . esc_attr( $arg['field_value_parent'] ?? '' ) . ' ' . esc_attr( $arg['label_for_parent'] ?? '' ) . '">
                <div class="line">
                    <div class="ctp-col-1">
                    ' . esc_attr( $arg['label_for_name'] ) . '
					<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="' . esc_html( $arg['help'] ?? '' ) . '"></i>
                    </div>
                    <div class="ctp_tooltip">
                        <span class="ctp_tooltiptext"></span>
                    </div>
                    <div class="ctp-col-2">
                        <label class="form-switch">
                            <input type="checkbox" id="' . esc_attr( $arg['label_for'] ?? '' ) . '" name="' . esc_attr( $arg['field_name'] ?? '' ) . '" ' . esc_attr( $arg['field_value'] ?? '' ) . ' value="1">
                            <i></i>
                        </label>
                    </div>
                </div>
            </div>';
	}

	/**
	 * Select
	 *
	 * @param  array $arg
	 */
	public static function select( array $arg ) {
		echo '<div class="content__body ' . esc_attr( $arg['field_value_parent'] ?? '' ) . ' ' . esc_attr( $arg['label_for_parent'] ?? '' ) . '">
                <div class="line">
                <div class="ctp-col-1">
                ' . esc_html( $arg['label_for_name'] ?? '' ) . '
				<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="' . esc_html( $arg['help'] ?? '' ) . '"></i>
                </div>
                <div class="ctp_tooltip">
                    <span class="ctp_tooltiptext">' . esc_html( $arg['help'] ?? '' ) . '</span>
                </div>
                <div class="ctp-col-2 ctp-form-control w-150" style="margin-left: 10px !important">
                    <select name="' . esc_attr( $arg['field_name'] ?? '' ) . '" class="ctp-form-control w-100">
                        ' . wp_kses( $arg['options'] ?? '', ( $arg['allowed_html'] ?? '' ) ) . '
                    </select>
                </div>
            </div>
        </div>';
	}

	/**
	 * Multiple_select
	 *
	 * @param  array $arg
	 */
	public static function multiple_select( array $arg ) {
		echo '<div class="content__body ' . esc_attr( $arg['field_value_parent'] ?? '' ) . ' ' . esc_attr( $arg['label_for_parent'] ?? '' ) . '">
				<div class="line">
					<div class="ctp-col-1">
						' . esc_html( $arg['label_for_name'] ?? '' ) . '
						<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="' . esc_html( $arg['help'] ?? '' ) . '"></i>
					</div>
                    <div class="ctp_tooltip">
                        <span class="ctp_tooltiptext">' . esc_html( $arg['help'] ?? '' ) . '.</span>
                    </div>
                    <div class="ctp-col-2 ctp-form-control" style="height:auto;">
                        <select class="ctp-multiple-select form-component w-100" style="width:100" name="' . esc_html( $arg['field_name'] ?? '' ) . '[]" multiple="multiple">
                            ' . wp_kses( $arg['options'] ?? '', ( $arg['allowed_html'] ?? '' ) ) . '
                        </select>
                    </div>
				</div>
			</div>';
	}

	/**
	 * Input
	 *
	 * @param  array $arg
	 */
	public static function input( array $arg ) {
		echo '<div class="content__body ' . esc_attr( $arg['field_value_parent'] ?? '' ) . ' ' . esc_attr( $arg['label_for_parent'] ?? '' ) . '">
				<div class="line">
					<div class="ctp-col-1">
                    ' . esc_html( $arg['label_for_name'] ?? '' ) . '
					<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="' . esc_html( $arg['help'] ?? '' ) . '"></i>

					</div>
						<div class="ctp_tooltip">
							<span class="ctp_tooltiptext">' . esc_html( $arg['help'] ?? '' ) . '.</span>
						</div>
                    <div class="ctp-col-2 ctp-form-control" style="height:auto;">
                            <input class="ctp-form-control" type="' . esc_html( $arg['input_type'] ?? '' ) . '" name="' . esc_html( $arg['field_name'] ?? '' ) . '" value="' . esc_html( $arg['field_value'] ?? '' ) . '" > 
                        </div>
				</div>
			</div>';
	}


	/**
	 * Message_component
	 *
	 * @param  array $arg
	 * @return void
	 */
	public static function message_component( array $arg ) {
		echo '<div class="ctp-divider"></div>
		<div class="content__body">
			<div class="line">
				<div class="col-sm-2">
					Enter your email :
				</div>
				<div class="ctp-form-control w-100" style="height:auto;">
					<input class="ctp-form-control w-100" type="email" placeholder="Enter an email address or we can easily chat thanks" name="' . esc_html( $arg['label_for'] ) . '" value="' . esc_html( $arg['current_user_email'] ?? '' ) . '" > 
				</div>
			</div>
			<hr>
			<div class="line">
				<div class="col-sm-2">
					Enter your Message :
				</div>
				<div class=" ctp-form-control w-100" style="height:auto;">
					<textarea class="border-0 w-100" placeholder="Tell us how can we help you thanks" rows="10" name="' . esc_html( $arg['label_for1'] ) . '" >' . esc_html( $arg['last_message'] ?? '' ) . ' </textarea> 
				</div>
			</div>
		</div>';
	}
	/**
	 * Card
	 *
	 * @param  array $arg
	 */
	public static function card( array $arg ) {
		echo '<div class="card col-sm-3 ctp-form-control" style="height: 365px;">
          <img src="' . esc_url_raw( ctp_PLUGIN_ASSETS ) . '/img/plugin.png" class="card-img-top img-thumbnail" alt="...">
          <div class="card-body p-0 ">
            <h5 class="card-title my-2"><stong>' . esc_html( $arg['name'] ) . '</strong></h5>
			' . esc_html( $arg['price'] ) . '€ / Month ( 30days free ) 
            <div style="height: 80px;overflow:auto"><small>Description : ' . esc_html( $arg['description'] ) . '</small></div>
            <div class="ctp-col-2 mt-2">
                <div class="ctp_tooltip">
                    <span class="ctp_tooltiptext">' . esc_html( $arg['help'] ) . '.</span>
                </div>
                <label class="form-switch">
                    <input class="checkbox-subscription" data-id="' . esc_html( $arg['id'] ) . '" type="checkbox" name="' . esc_html( $arg['field_name'] ) . '" ' . esc_html( $arg['field_value'] ) . ' value="1" ' . esc_html( $arg['status'] ) . '>
                    <i></i>
                </label>
            </div>
          </div>
        </div>';
	}

	/**
	 * Manual_currency_options_row
	 *
	 * @param  mixed $arg
	 * @return string
	 */
	public static function manual_currency_options_row( $arg ):string {
		return '<div>
		<hr class="ctp-my-5">
		<div class="ctp_row align-items justify-content-between">
			<div class="ctp-col-2 ctp-form-control" style="margin-left: 10px !important">
				<button class="ctp-bg-light border-0 delete-currency-option"><i class="fa fa-trash text-danger"></i></button>
			</div>
			<div class="ctp-col-2 ctp-form-control w-150" style="margin-left: 10px !important">
				<select class="ctp-form-control w-150 currency-option-select form-component" data-old_value="' . esc_html( $arg['currency'] ) . '" data-label="currency" name="' . esc_html( $arg['field_name'] ) . '[' . esc_html( $arg['currency'] ) . '][currency]">
				<option value="' . esc_html( $arg['currency'] ) . '">' . esc_html( $arg['currency'] ) . ' - ' . esc_html( get_woocommerce_currencies()[ $arg['currency'] ] ) . '</option>	
				' . wp_kses( $arg['currency_option_elect'], $arg['allowed_html'] ?? '' ) . '
				</select>
			</div>
			<div class="ctp-col-1 ctp-form-control w-150" style="margin-left: 10px !important">
				<input class="ctp-form-control w-150 form-component" value="' . esc_html( $arg['rate'] ) . '" type="text" placeholder="rate" data-label="rate" name="' . esc_html( $arg['field_name'] ) . '[' . esc_html( $arg['currency'] ) . '][rate]">
			</div>
			<div class="ctp-col-2 ctp-form-control w-150" style="margin-left: 10px !important">
				<select class="ctp-form-control w-150 form-component" data-label="increase" name="' . esc_html( $arg['field_name'] ) . '[' . esc_html( $arg['currency'] ) . '][increase]">
					<option ' . ( '0' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="0" >0%</option>
					<option ' . ( '1' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="1" >1%</option>
					<option ' . ( '2' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="2" >2%</option>
					<option ' . ( '3' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="3" >3%</option>
					<option ' . ( '4' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="4" >4%</option>
					<option ' . ( '5' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="5" >5%</option>
					<option ' . ( '6' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="6" >6%</option>
					<option ' . ( '7' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="7" >7%</option>
					<option ' . ( '8' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="8" >8%</option>
					<option ' . ( '9' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="9" >9%</option>
					<option ' . ( '10' === esc_html( $arg['increase'] ) ? 'selected' : '' ) . ' value="10" >10%</option>
				</select>
			</div>
			<div class="ctp-col-2 ctp-form-control w-150" style="margin-left: 10px !important">
				<input class="ctp-form-control w-150 form-component"  value="' . esc_html( $arg['symbol'] ) . '" placeholder="symbol" type="text" data-label="symbol" name="' . esc_html( $arg['field_name'] ) . '[' . esc_html( $arg['currency'] ) . '][symbol]">
			</div>
			<div class="ctp-col-2 ctp-form-control w-150" style="margin-left: 10px !important">
				<select class="ctp-form-control w-150 form-component" data-label="position" name="' . esc_html( $arg['field_name'] ) . '[' . esc_html( $arg['currency'] ) . '][position]">
					<option' . ( '' === esc_html( $arg['position'] ) ? 'selected' : '' ) . ' value="">Default</option>
					<option ' . ( '%1$s%2$s' === esc_html( $arg['position'] ) ? 'selected' : '' ) . ' value="%1$s%2$s">Left($79)</option>
					<option ' . ( '%2$s%1$s' === esc_html( $arg['position'] ) ? 'selected' : '' ) . ' value="%2$s%1$s">Right(79$)</option>
					<option ' . ( '%1$s&nbsp;%2$s' === esc_html( $arg['position'] ) ? 'selected' : '' ) . ' value="%1$s&nbsp;%2$s">Left space($ 79)</option>
					<option ' . ( '%2$s&nbsp;%1$s"' === esc_html( $arg['position'] ) ? 'selected' : '' ) . ' value="%2$s&nbsp;%1$s"">Right space(79 $)</option>
				</select>
			</div>
		</div>
		<hr class="ctp-my-5">
		</div>';
	}
}

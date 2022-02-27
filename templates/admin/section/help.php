<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Admin\Callbacks
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

?>
<div class="container-fluid ctp_boder">
	<?php do_action( 'ctp_before_help_form' ); ?>
	<form action="#" method="POST">
		<div class="col-md my-3">
			<?php echo wp_kses( ctp_alert(), ctp_allow_html() ); ?>
			<label for="validationTooltip01"> <strong>Email : </strong> </label>
			<input type="email" class="form-control shadow-sm rounded-0" id="validationTooltip01" name="email" value="<?php echo esc_html( get_option( 'admin_email' ) ); ?>" required>
			<small class="text-info">
				Enter an email address to which we can quickly respond
			</small>
		</div>
		<div class="col-md mb-3">
			<label for="validationTooltip01"><strong>Message : </strong></label>
			<textarea name="message" id="" class="form-control shadow-sm rounded-0" cols="30" rows="10" placeholder="Hi, Tell us how can we help you ?" required></textarea>
			<hr>
			<button class="w-100 btn btn-succes mb-3 ctp-bg-secondary ctp-shadow">Envoyer</button>
		</div>
	</form>
	<?php do_action( 'ctp_after_help_form' ); ?>
</div>

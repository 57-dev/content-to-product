<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   Scd\Admin\Callbacks
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

?>
<div id="scd_header scd_boder">
	<div class="scd_header row w-100 mx-0">
		<div class="scd_header__logo col-sm-2">
			<img class="scd-icon" src="<?php echo esc_html( CTP_PLUGIN_ASSETS ) . '/img/logo_scd.jpg'; ?>" alt="">
		</div>
		<div class="scd_header__navbar col-sm d-flex justify-content-end pl-2 container">
			<a href="https://web.facebook.com/gajelabs.scd.9" class="nav-item scd-bg-secondary scd-color-dark">
				<i class="fa fa-facebook-square" aria-hidden="true"></i>
				Facebook Community
			</a> 
			<a href="https://twitter.com/gajelabs" class="nav-item scd-bg-secondary scd-color-dark">
				<i class="fa fa-twitter-square text-info" aria-hidden="true"></i>
				Twitter Community
			</a>
			<a href="https://www.instagram.com/gajelabs/" class="nav-item scd-bg-secondary scd-color-dark">
				<i class="fa fa-instagram text-danger" aria-hidden="true"></i>
				Instagram Community
			</a>
			<a href="https://de.linkedin.com/company/gajelabs-gmbh" class="nav-item scd-bg-secondary scd-color-dark">
				<i class="fa fa-linkedin-square text-info" aria-hidden="true"></i>
				Linkedin Community
			</a>
			<a href="#" class="nav-item scd-bg-secondary scd-color-dark">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
				Documentation
			</a>
		</div>
	</div>
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-notification-bar.php'; ?>
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-title.php'; ?>
</div>
<div class="scd_body d-none">
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-side-bar.php'; ?>
	<div id="general_settings_content" class="scd_body__content scd-fall">
		<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/section/article.php'; ?>
	</div>
	<div id="help_support_content" class="scd_body__content scd-fall">
		<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/section/help.php'; ?>
	</div>
</div>

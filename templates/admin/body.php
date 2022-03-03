<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   ctp\Admin\Callbacks
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

?>
<div id="ctp_header ctp_boder">
	<div class="ctp_header row w-100 mx-0 d-flex justify-content-center">
		<div class="ctp_header__navbar col-sm d-flex justify-content-center py-2 pl-2 container mx-0">
			<a target="blank" href="https://web.facebook.com/57houseSI/" class="nav-item ctp-bg-secondary ctp-color-dark px-3" title="Facebook Community">
				<i class="fa-1x fa-brands fa-facebook text-info" aria-hidden="true"></i>
			</a> 
			<a target="blank" href="https://twitter.com/57houseofficiel" class="nav-item ctp-bg-secondary ctp-color-dark px-3" title="Twitter Community">
				<i class="fa-1x fa-brands fa-twitter text-info" aria-hidden="true"></i>

			</a>
			<a target="blank" href="https://www.linkedin.com/company/57-house" class="nav-item ctp-bg-secondary ctp-color-dark px-3" title="Linkedin Community">
				<i class="fa-1x fa-brands fa-linkedin text-info" aria-hidden="true"></i>

			</a>
			<a target="blank" href="https://blog.57-house.org/article/web-development/ctp-official-user-documentation" class="nav-item ctp-bg-secondary ctp-color-dark px-3" title="Documentation">
				<i class="fa-solid fa-newspaper" aria-hidden="true"></i>

			</a>
		</div>
	</div>
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-notification-bar.php'; ?>
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-title.php'; ?>
</div>
<div class="ctp_body d-none">
	<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/admin-side-bar.php'; ?>
	<div id="general_settings_content" class="ctp_body__content ctp-fall">
		<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/section/article.php'; ?>
	</div>
	<div id="help_support_content" class="ctp_body__content ctp-fall">
		<?php require_once esc_html( CTP_PLUGIN_TEMPLATE_DIR ) . '/admin/section/help.php'; ?>
	</div>
</div>

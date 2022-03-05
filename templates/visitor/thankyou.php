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
		<h5 class="woocommerce-column__title">You have now access to the following article with the address <strong> <?php echo esc_html( $_SESSION['email_access'] ); ?> </strong>: </h5>
		<?php foreach ( $order->get_items() as $ctp_item_key => $ctp_item ) : ?>
			<a class="ctp_post_link" href="<?php echo esc_url( get_post_meta( $ctp_item->get_product_id(), '_product_article_url', true ) ); ?>"><?php echo esc_html( $ctp_item->get_name() ); ?></a>
			<?php
			update_post_meta( $ctp_item->get_product_id(), sanitize_email( $_SESSION['email_access'] ), get_post_meta( $ctp_item->get_product_id(), '_product_article_url', true ) );
			?>
		<?php endforeach; ?>
		<h5 class="my-2">Redirection to the post in <span id="ctp_counter">5</span> seconds...</h5>
		<script>
			window.addEventListener('load',function () {
				let counter = document.querySelector('#ctp_counter');
				const interval = setInterval(() => {
					if (parseInt(counter.innerHTML) <= 0) {
						clearInterval(interval);
						document.querySelector('.ctp_post_link').click()
					}else{
						counter.innerHTML = parseInt(counter.innerHTML) - 1; 
					}
				}, 1000);
			})
		</script>

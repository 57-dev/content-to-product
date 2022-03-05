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
	<?php do_action( 'ctp_before_article_list' ); ?>
	<form action="#" method="POST">
	<input type="hidden" name="_wpnonce" value="<?php echo esc_html( $nonce ); ?>">
	<div class="mt-3"><?php echo wp_kses( ctp_alert(), ctp_allow_html() ); ?></div>
	<?php
	if ( $articles->have_posts() ) :
		while ( $articles->have_posts() ) :
			$articles->the_post();
			?>
				<div class="card-body row p-0  mx-0 w-100 justify-content-between text-dark my-3">
					<small for="" class="col-form-label mx-0 px-0"><strong>Titre : <?php echo esc_html( the_title() ); ?></strong> <a href="<?php echo esc_html( get_permalink( get_the_ID() ) ); ?>" target="blank"><i class="fa fa-external-link" aria-hidden="true"></i></a> </small>
					<div class="form-group row w-100 mb-0 mt-2 mx-0">
						<label for="" class="col-form-label mx-0 px-0"><strong>Price (<?php echo esc_html( get_woocommerce_currency_symbol() ); ?>) </strong> :</label>
						<div class="col-sm-10 px-0 w-75">
							<input type="text" class="form-control shadow-sm rounded-0" id="" placeholder="Mettez un prix pour vendre cette article." name="article_price[]" value="<?php echo esc_html( get_post_meta( get_the_ID(), '_article_product_price', true ) ?? '' ); ?>">
							<input type="hidden" class="form-control shadow-sm rounded-0" id="" name="article_id[]" value="<?php echo esc_html( get_the_ID() ); ?>">
							<input type="hidden" class="form-control shadow-sm rounded-0" id="" name="article_name[]" value="<?php echo esc_html( the_title() ); ?>">
							<input type="hidden" class="form-control shadow-sm rounded-0" id="" name="article_description[]" value="<?php echo esc_html( the_title() ); ?>">
						</div>
					</div>
					<p class="card-text px-0"><small class="text-muted"><strong><?php echo esc_html( get_the_date( 'Y-m-d' ) ); ?></strong></small></p>
				</div>
				<hr>
			<?php
		endwhile;
	endif;
	?>
		<ul class="text-dark d-flex justify-content-end w-100 m-0">
			<li class="mx-2"><strong>Page</strong> :</li>
			<?php foreach ( $page_links as $ctp_page_link ) : ?>
				<li class="mx-2">
					<?php if ( isset( $_GET['paged'] ) && $ctp_page_link->page === $_GET['paged'] ) : ?>
						<strong><?php esc_html( $ctp_page_link->page ); ?></strong>
					<?php else : ?>
						<a href="<?php esc_attr( $ctp_page_link->url ); ?>">
							<?php echo esc_html( $ctp_page_link->page ); ?>
						</a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<hr>
		<button class="w-100 btn btn-succes mb-3 ctp-bg-secondary ctp-shadow">save</button>
			</form>
			<?php do_action( 'ctp_after_article_list' ); ?>
</div>

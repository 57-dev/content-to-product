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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
</head>
<style>
	.form-control {
		display: block;
		width: 100%;
		padding: 8px 12px;
		font-family: 'Open Sans', sans-serif;
		color: #666;
		border: none;
		border-bottom: 2px solid #ccc;
		margin: 5px 0px 20px 0px;
	}

	.form-control:focus {
		border-color: #ccc;
		outline: none;
	}

	.modal-window {
		position: fixed;
		background-color: rgba(255, 255, 255, 0.25);
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 999;
		/* pointer-events: none; */
		transition: all 0.3s;
	}

	.modal-window:target {
		visibility: visible;
		opacity: 1;
		pointer-events: auto;
	}

	.modal-window>div {
		width: 400px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		padding: 2em;
		background: white;
	}

	.modal-window header {
		font-weight: bold;
	}

	.modal-window h1 {
		font-size: 150%;
		margin: 0 0 15px;
	}

	.modal-close {
		color: #aaa;
		line-height: 50px;
		font-size: 80%;
		position: absolute;
		right: 0;
		text-align: center;
		top: 0;
		width: 70px;
		text-decoration: none;
	}

	.modal-close:hover {
		color: black;
	}

	html,
	body {
		height: 100%;
	}

	html {
		font-size: 18px;
		line-height: 1.4;
	}

	body {
		font-family: apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
		font-weight: 600;
		/* background-image: linear-gradient(to right, #7f53ac 0, #657ced 100%); */
		background: gray;
		color: black;
	}

	a {
		color: inherit;
	}

	.modal-window>div {
		border-radius: 1rem;
	}

	.modal-window div:not(:last-of-type) {
		margin-bottom: 15px;
	}

	small {
		color: lightgray;
	}

	.btn {
		background-color: white;
		padding: 1em 1.5em;
		border-radius: 1rem;
		text-decoration: none;
	}

	.btn i {
		padding-right: 0.3em;
	}

	.text-danger{
		color: red;
	}
</style>

<body>
	<div id="open-modal" class="modal-window">
		<div>
			<a href="/" title="Close" class="modal-close"><span aria-hidden="true">&times;</span></a>
			<h4 class="modal-title" id="staticBackdropLabel">You must pay <strong><?php echo wp_kses( wc_price( wc_get_product( $product_id )->get_price() ), ctp_allow_html() ); ?></strong> to have full access to this article</h4>
			<form action="#" method="POST">
				<div class="modal-body">
					<?php if ( isset( $_SESSION['email_access_error'] ) ) : ?>
						<div class="text-danger">
							<?php
							echo esc_html( $_SESSION['email_access_error'] );
							unset( $_SESSION['email_access_error'] );
							?>
						</div>
					<?php endif; ?>
					<div class="form-group mx-2">
						<label for="recipient-name" class="col-form-label">Enter your email address:</label>
						<input type="email" name="email_access" required class="form-control" id="recipient-name" autofocus value="<?php echo esc_html( $_SESSION['email_access'] ?? '' ); ?>">
					</div>
				</div>

				<button type="button" onclick="location.href='<?php echo esc_html( wc_get_checkout_url() ); ?>'" class="btn btn-primary">👉 Pay</button>
				<br>
				<br>
				<button class="btn btn-primary" target="_blank">👉 Enter your email and click here if you have already paid </button>
			</form>
		</div>
	</div>
</body>



</html>

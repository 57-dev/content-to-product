<?php
/**
 * Class File Doc comment
 *
 * @category Class
 * @package   CTP\Model
 * @author    Donald
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace CTP\Model\Admin;

/**
 * Article
 */
class Article {

	/**
	 * The Load Dashboard Template function
	 *
	 * @since 1.0
	 * @since 3.0.0 Moved to Menu class
	 *
	 * @return array
	 */
	public static function get() {
		global $wp_query;
		$paged  = ( isset( $_GET['paged'] ) ) ? sanitize_key( wp_unslash( $_GET['paged'] ) ) : 1;
		$args   = array(
			'posts_per_page' => 10,
			'paged'          => $paged,
			'post_type'      => 'post',
		);
		$result = new \WP_Query( $args );
		return $result;
	}

}

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

namespace CTP\Admin\Callbacks;

use CTP\Api\Callbacks\MenuCallbacks;
use CTP\Model\Admin\Article;

/**
 * AdminMenuCallback
 */
class AdminMenuCallback extends MenuCallbacks {
	/**
	 * Dashboard
	 *
	 * @return void
	 */
	public function dashboard() {
		$articles   = Article::get();
		$page_links = $this->wpdocs_get_paginated_links( $articles );
		$nonce      = wp_create_nonce( 'ctp-57-nonce' );
		include CTP_DIR . '/templates/admin/body.php';
	}


	/**
	 * Wpdocs_get_paginated_links
	 *
	 * @param  mixed $query
	 * @return array
	 */
	private function wpdocs_get_paginated_links( $query ) {
		// When we're on page 1, 'paged' is 0, but we're counting from 1.
		// so we're using max() to get 1 instead of 0.
		$current_page = max( 1, get_query_var( 'paged', 1 ) );

		// This creates an array with all available page numbers, if there
		// is only *one* page, max_num_pages will return 0, so here we also
		// use the max() function to make sure we'll always get 1.
		$pages = range( 1, max( 1, $query->max_num_pages ) );

		// Now, map over $pages and return the page number, the url to that
		// page and a boolean indicating whether that number is the current page.
		return array_map(
			function( $page ) use ( $current_page ) {
				return (object) array(
					'isCurrent' => $page === $current_page,
					'page'      => $page,
					'url'       => get_pagenum_link( $page ),
				);
			},
			$pages
		);
	}
}

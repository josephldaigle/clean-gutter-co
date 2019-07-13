<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-06-01
 * Time: 23:13
 */

namespace CleanGutter\CMS;


use CleanGutter\CMS\Model\Menu\MenuItem;
use CleanGutter\Services\Review\CustomerReview;
use Ds\Map;

/**
 * CMS.
 *
 * Facade for the CMS module.
 *
 * @package CleanGutter\CMS
 */
class CMS
{
	/**
	 * @return Map
	 */
	public function getMenuMap()
	{
		$menuMap = new Map();
		// compile header menu
		$headerMenu = new Map([
			'home' => new MenuItem('home', 'Home'),
			'about-us' => new MenuItem('about-us', 'About Us'),
			'frequently-asked-questions' => new MenuItem('frequently-asked-questions', 'FAQ')
		]);
		$menuMap->put('header_menu', $headerMenu);

		// compile footer menu
		$footerMenu = new Map([
			'terms-of-service' => new MenuItem('terms-of-service', 'Terms of Service'),
			'privacy-policy' => new MenuItem('privacy-policy', 'Privacy Policy')
		]);
		$menuMap->put('footer_menu', $footerMenu);

		return $menuMap;
	}

	/**
	 * @return array
	 */
	public function getCustomerReviews()
	{
		$reviews = [];
		$reviews[] = new CustomerReview(5, 5, 'Claire', 'Joe cleaned my gutters the same day I called. He showed me a live video of the gutters being cleaned, so I could see the results for myself! The price was right, and the service was excellent. Will definitely use again.', 'Google', 'https://goo.gl/maps/DdmUs9bmt7w2HtPc6');
		$reviews[] = new CustomerReview(5, 5, 'Mike', 'I hired Joe after being referred by my daughter. He did a great job and was even able to schedule me before the weekend.', 'Google', 'https://goo.gl/maps/c6ecZKwXd3kx4h8t5');
		return $reviews;
	}
}
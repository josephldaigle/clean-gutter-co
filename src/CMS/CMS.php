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
			'contact-us' => new MenuItem('contact', 'Contact Us'),
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
		$reviews[] = new CustomerReview(5, 5, 'Irvine', 'This was the best gutter cleaning I had ever had done. Will use again.', 'Google', 'https://goo.gl/maps/PtwEy2SXrMGsr5HG7');
		$reviews[] = new CustomerReview(5, 5, 'Collena', 'Joe was very professional, communicative, and prompt. His work ethic was exceptional. I had just had a bad experience with a different contractor so was kind of leary of hiring another. Joe called me back within an appropriate amount of time, came and gave me a very reasonable estimate and did the work. Bada Bing Bada Boom. I would most definitely recommend him. Great job.', 'Google', 'https://goo.gl/maps/AsWe3UmvEKQcP3dX8');
		$reviews[] = new CustomerReview(5, 5, 'Claire', 'Joe cleaned my gutters the same day I called. He showed me a live video of the gutters being cleaned, so I could see the results for myself! The price was right, and the service was excellent. Will definitely use again.', 'Google', 'https://goo.gl/maps/DdmUs9bmt7w2HtPc6');
		$reviews[] = new CustomerReview(5, 5, 'Mike', 'I hired Joe after being referred by my daughter. He did a great job and was even able to schedule me before the weekend.', 'Google', 'https://goo.gl/maps/c6ecZKwXd3kx4h8t5');

		return $reviews;
	}
}
<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-26
 * Time: 14:15
 */

namespace CleanGutter\Http\Event;

use CleanGutter\CMS\Model\Menu\Menu;
use CleanGutter\CMS\Model\Menu\MenuItem;
use Ds\Map;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * HtmlRequestSubscriber.
 *
 * @package CleanGutter\Http\Event
 */
class KernelRequestSubscriber implements EventSubscriberInterface
{

	/**
	 * @inheritdoc
	 */
	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::REQUEST => [
				['handleHtmlRequest', 0]
			]
		];
	}

	/**
	 * Add page data for requests with accept html header.
	 *
	 * @param GetResponseEvent $event
	 */
	public function handleHtmlRequest(GetResponseEvent $event)
	{
		if (! $event->isMasterRequest()) {
			return;
		}

		$request = $event->getRequest();

		if (in_array('text/html', $request->getAcceptableContentTypes())) {
			// request accepts html - add template data structure to the request
			$templateDataMap = new Map();

			// compile header menu
			$headerMenu = new Menu(
				new MenuItem('home', 'Home'),
				new MenuItem('about-us', 'About Us'),
				new MenuItem('frequently-asked-questions', 'FAQ')
			);
			$templateDataMap->put('header_menu', $headerMenu);

			// compile footer menu
			$footerMenu = new Menu(
				new MenuItem('terms-of-service', 'Terms of Service'),
				new MenuItem('privacy-policy', 'Privacy Policy')
			);
			$templateDataMap->put('footer_menu', $footerMenu);

			$request->attributes->set('template_data', $templateDataMap);

			return;
		}
	}
}
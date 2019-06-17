<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-26
 * Time: 14:15
 */

namespace CleanGutter\Http\Event;


use CleanGutter\Http\Model\TemplateDataProviderInterface;
use Ds\Map;
use mysql_xdevapi\Exception;
use Psr\Log\LoggerInterface;
use SebastianBergmann\GlobalState\RuntimeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;


/**
 * HtmlRequestSubscriber.
 *
 * @package CleanGutter\Http\Event
 */
class KernelRequestSubscriber implements EventSubscriberInterface
{
	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @var CsrfTokenManager
	 */
	private $securityService;

	/**
	 * @var array
	 */
	private $templateDataProviders = [];

	/**
	 * KernelRequestSubscriber constructor.
	 *
	 * @param LoggerInterface               $logger
	 * @param CsrfTokenManager              $securityService
	 * @param TemplateDataProviderInterface ...$templateDataProviders an array of data providers
	 */
	public function __construct(LoggerInterface $logger, CsrfTokenManager $securityService, TemplateDataProviderInterface ...$templateDataProviders)
	{
		$this->logger = $logger;
		$this->securityService = $securityService;
		$this->templateDataProviders = $templateDataProviders;
	}

	/**
	 * @inheritdoc
	 */
	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::REQUEST => [
				['handleHtmlRequest', 0],
				['validateCsrfToken', 1]
			]
		];
	}

	/**
	 * Add page data for requests with accept html header.
	 *
	 * @param GetResponseEvent $event
	 *
	 * @throws RuntimeException
	 */
	public function handleHtmlRequest(GetResponseEvent $event)
	{
		if (! $event->isMasterRequest()) {
			return;
		}

		$request = $event->getRequest();

		// reject requests not having `text/html` accept header
		if (! in_array('text/html', $request->getAcceptableContentTypes())) {
			$this->logger->warning('Only requests with accept-content header `text\/html` should use ' . __CLASS__ . '.');
			return;
		}

		// initialize template data for request
		if (! $request->attributes->has('template_data')) {
			$request->attributes->set('template_data', new Map());
		}

		if (! $request->attributes->get('template_data') instanceof Map) {
			throw new RuntimeException('The value of template_data in the request is an invalid type.');
		}

		// call registered template data providers
		foreach($this->templateDataProviders as $dataProvider) {
			$dataProvider->getTemplateData($request);
		}

		return;
	}

	/**
	 * @param GetResponseEvent $event
	 */
	public function validateCsrfToken(GetResponseEvent $event)
	{
		if (! $event->isMasterRequest()) {
			return;
		}

		$request = $event->getRequest();

		dump($request);
		$id = '';
		$token = $request->request->get('token');


		// only validate for json POST requests
		if (! ($request->getMethod() === 'POST')) {
			return;
		}

		if (! 0 === strpos($request->headers->get('Content-Type'), 'application/json'))
		{
			return new JsonResponse(['message' => 'Unaccepted content type for POST request. Can only honor application/json.'], JsonResponse::HTTP_BAD_REQUEST);
		}

		if (! $this->securityService->isTokenValid(new CsrfToken($id, $token)))
		{

		}

		return;
	}
}
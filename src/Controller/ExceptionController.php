<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-08-04
 * Time: 08:33
 */

namespace CleanGutter\Controller;

use Symfony\Bundle\TwigBundle\Controller\ExceptionController as TwigExceptionController;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * ExceptionController.
 *
 * @package CleanGutter\Controller
 */
class ExceptionController extends TwigExceptionController
{

	/**
	 * @param Request                   $request
	 * @param FlattenException          $exception
	 * @param DebugLoggerInterface|null $logger
	 *
	 * @return Response
	 * @throws \InvalidArgumentException
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public function showAction(Request $request, FlattenException $exception, DebugLoggerInterface $logger = null)
	{
		$currentContent = $this->getAndCleanOutputBuffering($request->headers->get('X-Php-Ob-Level', -1));

		$showException = $request->attributes->get('showException', $this->debug); // As opposed to an additional parameter, this maintains BC

		$code = $exception->getStatusCode();

		return new Response($this->twig->render(
			(string) $this->findTemplate($request, $request->getRequestFormat(), $code, $showException),
			[
				'status_code' => $code,
				'status_text' => isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : '',
				'exception' => $exception,
				'logger' => $logger,
				'currentContent' => $currentContent,
			]
		), 200, ['Content-Type' => $request->getMimeType($request->getRequestFormat()) ?: 'text/html']);
	}
}